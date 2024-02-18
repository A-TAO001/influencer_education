function changeBanner(index) {
    // すべてのバナーを非表示にする

    var banners = document.querySelectorAll('.banner');
    banners.forEach(function(banner) {
        banner.style.display = 'none';
    });

    // 選択されたバナーを表示する
    var selectedBanner = document.getElementById('banner' + index);
    if (selectedBanner) {
        selectedBanner.style.display = 'block';
    }
}



function markAsCompleted(curriculumId) {
    var url = $('[data-url="' + curriculumId + '"]').data('url');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    console.log('url:', url);
    console.log('_token:', csrfToken);
    console.log(curriculumId)

$.ajax({
    url: url,
    type: 'PUT',
    data: {
        _token: csrfToken, // CSRFトークンを含める
        'curriculums_id': curriculumId// カリキュラムIDを送信
    },
    success: function(data) {
        // 成功時の処理
        if (data.success) {
            alert('受講済みに更新されました');
            var button = $('#btn-clear-' + curriculumId); // ボタンのIDを指定して選択
            button.prop('disabled', true); // ボタンを非活性にする
            button.text('受講済み'); // ボタンのテキストを変更
        } else {
            alert('エラーが発生しました: ' + data.message); // エラーメッセージを表示
        }
    },
    error: function(xhr, status, error) {
        // エラー時の処理
        alert('エラーが発生しました');
    }
})
};

$(document).ready(function() {
    var buttons = $('[id^="btn-clear-"]');

    buttons.each(function() {
        var button = $(this);
        var curriculumId = button.data('curriculum-id');
        var deliveryFrom = button.data('delivery-from');
        var deliveryTo = button.data('delivery-to');
        var clearFlag = button.data('clear-flag');
        var alwayDeliveryFlg = button.data('alway-delivery-flg');
        var video = document.getElementById('video' + curriculumId); 

        console.log(alwayDeliveryFlg);
        console.log(curriculumId);
        console.log(button);

        // ボタンの制御
        if (alwayDeliveryFlg == 1 && clearFlag == 0) {
            button.prop('disabled', false);
            button.text('受講しました');
        } else if (clearFlag == 1 && alwayDeliveryFlg == 1 && (deliveryFrom && deliveryTo)) {
            button.prop('disabled', true);
            button.text('受講済み');
        } else if (clearFlag == 1) {
            button.prop('disabled', true);
            button.text('受講済み');
        } else {
            // 配信期間外かつalwayDeliveryFlgが0の場合のみ、ボタンを非活性化する
            var now = new Date();
            if ((deliveryFrom && deliveryTo && now < new Date(deliveryFrom)) || now > new Date(deliveryTo)) {
                button.prop('disabled', true);
                button.text('配信期間外です');
            } else {
                button.prop('disabled', false);
                button.text('受講しました');
            }
          }
        
        // 動画の制御
        if (alwayDeliveryFlg == 1) {
            video.controls = true; // alway_delivery_flgが1の場合は常に再生可能にする
        } else if (!alwayDeliveryFlg && (deliveryFrom && deliveryTo)) {
            var now = new Date();
            // 配信期間外かつalwayDeliveryFlgが0の場合のみ、動画を非活性化する
            if (now < new Date(deliveryFrom) || now > new Date(deliveryTo)) {
                video.controls = false;
            } else {
                video.controls = true;
            }
        }

        // ボタンがクリックされたときの処理
        button.on('click', function() {
            // ボタンが非活性でない場合にのみ処理を実行
            if (!button.prop('disabled')) {
                markAsCompleted(curriculumId);
            }
        });
    });
});

