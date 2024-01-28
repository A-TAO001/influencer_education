@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">授業一覧</h1>

  <a href="{{ route('curriculums.create') }}" class="btn btn-primary mb-3">授業新規登録</a>

  <div class="curriculums mt-5">
    <h2>授業情報</h2>
    
    <form method="get" action="{{ route('curriculums.filterByClass') }}" class="mb-3">
      @csrf
      <label for="class_id" class="form-label">学年選択:</label>
      <select class="form-select" id="class_id" name="class_id" onchange="this.form.submit()">
        <option value="" selected>全ての学年</option>
        @foreach($classes as $class)
          <option value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
      </select>
    </form>
    
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
            <td>{{ $curriculum->delivery_time->delivery_from }}</td>
            <td>{{ $curriculum->delivery_time->delivery_to }}</td>
            <td>
              <a href="{{ route('curriculums.show', $curriculum) }}" class="btn btn-info btn-sm mx-1">授業内容詳細</a>
              <a href="{{ route('curriculums.edit', $curriculum) }}" class="btn btn-primary btn-sm mx-1">配信日時編集</a>
            </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
