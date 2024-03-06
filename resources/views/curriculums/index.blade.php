@extends('layouts.app')

@section('content')

<h1 class="mb-4">授業一覧</h1>

<a href="{{ route('curriculums.create') }}" class="btn btn-primary mb-3">授業新規登録</a>

<div class="container">
    <div class="cur_btns">
        <!-- タブのリンクにIDを設定 -->
        <div class="cur_primary a">
            @foreach ($classCategories as $classCategory)
                <a href="#" onclick="filterByClass('{{ $classCategory['id'] }}')">{{ $classCategory['name'] }}</a>
            @endforeach
        </div>
    </div>

    @foreach ($classCategories as $classCategory)
        <div class="curriculums mt-5" id="{{ $classCategory['id'] }}-section">
            <h2>{{ $classCategory['name'] }}</h2>
            @foreach ($curriculums->where('classes_id', $classCategory['id']) as $curriculum)
                <div class="col-md-4 mb-4">
                    <div class="border border-primary">
                        <img src="{{ asset($curriculum->thumbnail) }}" alt="授業サムネイル" width="100">
                        <p>{{ $curriculum->title }}</p>
                        <p>{{ optional($curriculum->delivery_time)->delivery_from }}</p>
                        <p>{{ optional($curriculum->delivery_time)->delivery_to }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>
    // 各ボタンが押されたらfilterByClassメソッドを呼ぶ
    function filterByClass(classId) {
        // 全てのセクションを非表示にする
        document.querySelectorAll('.curriculums').forEach(function (section) {
            section.style.display = 'none';
        });

        // 対応するクラスのセクションを表示する
        document.getElementById(classId + '-section').style.display = 'block';
    }
</script>

@endsection