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
