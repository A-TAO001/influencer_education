@extends('layouts.app')

@section('content')
<div class="container">


  <h1 class="mb-4">授業一覧</h1>

  <a href="{{ route('curriculums.create') }}" class="btn btn-primary mb-3">授業新規登録</a>
    <div class="cur_btns">
      <!-- タブのリンクにIDを設定 -->
      <div class="cur_e">
        <a href="#小学校1年生" onclick="showClass('小学校1年生')">小学校1年生</a>
        <a href="#小学校2年生" onclick="showClass('小学校2年生')">小学校2年生</a>
        <a href="#小学校3年生" onclick="showClass('小学校3年生')">小学校3年生</a>
        <a href="#小学校4年生" onclick="showClass('小学校4年生')">小学校4年生</a>
        <a href="#小学校5年生" onclick="showClass('小学校5年生')">小学校5年生</a>
        <a href="#小学校6年生" onclick="showClass('小学校6年生')">小学校6年生</a>
      </div>
      <div class="cur_j">
        <a href="#中学校1年生" onclick="showClass('中学校1年生')">中学校1年生</a>
        <a href="#中学校2年生" onclick="showClass('中学校2年生')">中学校2年生</a>
        <a href="#中学校3年生" onclick="showClass('中学校3年生')">中学校3年生</a>
      </div>
      <div class="cur_h">
        <a href="#高校1年生" onclick="showClass('高校1年生')">高校1年生</a>
        <a href="#高校2年生" onclick="showClass('高校2年生')">高校2年生</a>
        <a href="#高校3年生" onclick="showClass('高校3年生')">高校3年生</a>
      </div>
      <!-- クラスごとのセクションを追加 -->
      <div class="curriculums mt-5" id="小学校1年生-section">
        <h2>小学校1年生</h2>
        <!-- ここに小学校1年生の授業情報を表示するコードを追加 -->
      </div>
      <!-- 他のクラスのセクションも同様に設定 -->
  </div>

  <script>
    function showClass(classId) {
      // 全てのセクションを非表示にする
      document.querySelectorAll('.curriculums').forEach(function (section) {
        section.style.display = 'none';
      });

      // 対応するクラスのセクションを表示する
      document.getElementById(classId + '-section').style.display = 'block';
    }
  </script>

  <div class="curriculums mt-5">
    <h2>授業情報</h2>
    
    

    <table class="table table-striped">
      <thead>
        <tr>
          <th>授業サムネイル</th>
          <th>授業タイトル</th>
          <th>配信スケジュール</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($curriculums as $curriculum)
          <tr>
            <td><img src="{{ asset($curriculum->thumbnail) }}" alt="授業サムネイル" width="100"></td>
            <td>{{ $curriculum->title }}</td>
            <td>{{ optional($curriculum->delivery_time)->delivery_from }}</td>
            <td>{{ optional($curriculum->delivery_time)->delivery_to }}</td>
            <td>
              <a href="{{ route('curriculums.edit', $curriculum) }}" class="btn btn-info btn-sm mx-1">授業内容編集</a>
              <a href="{{ route('delivery_times.edit', $curriculum) }}" class="btn btn-primary btn-sm mx-1">配信日時編集</a>
            </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
