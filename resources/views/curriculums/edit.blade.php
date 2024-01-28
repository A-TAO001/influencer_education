@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <a href="{{ route('curriculums.index') }}" class="btn btn-primary mt-1 mb-3">授業一覧画面に戻る</a>
        <div class="card">
          <div class="card-header"><h2>配信日時設定</h2></div>

          <div class="card-body">
            