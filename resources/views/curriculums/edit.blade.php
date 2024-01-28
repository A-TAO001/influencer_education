@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('curriculums.index') }}" class="btn btn-primary mt-1 mb-3">授業一覧画面に戻る</a>
                <div class="card">
                    <div class="card-header"><h2>授業内容を変更する</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('curriculums.update', $curriculum) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                              <label for="thumbnail" class="form-label">授業サムネイル:</label>
                              <input id="thumbnail" type="file" name="thumbnail" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="classes_id" class="form-label">学年:</label>
                              <select class="form-select" id="classes_id" name="classes_id">
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="title" class="form-label">授業名:</label>
                              <input id="title" type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="video_url" class="form-label">授業動画URL:</label>
                              <inout id="video_url" type="url" name="video_url" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="description" class="form-label">授業概要:</label>
                              <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="alway_delivery_flg" name="alway_delivery_flg" value="1">
                              <label class="form-check-label" for="alway_delivery_flg">常時公開</label>
                            </div>
                            <button type="submit" class="btn btn-primary">変更内容で更新する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection