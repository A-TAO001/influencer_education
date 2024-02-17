@extends('layouts.user_common_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
  

    @if($banners->count() > 0)
    @foreach($banners as $index => $banner)
        <div class="banner" id="banner{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }}">
            <div class="banner-image">
                <img width="90%" src="{{ asset('storage/images/' . $banner->image) }}">
            </div>
        </div>
    @endforeach

    <div class="banner-buttons">
        @foreach($banners as $index => $banner)
            <button onclick="changeBanner({{ $index }})"></button>
        @endforeach
    </div>

@else
                <div class="default-banner">
                    <img width="90%" src="{{ asset('storage/images/bannergazo.png') }}" alt="bannergazo.png"> 
                </div>
        @endif

        <div class="articles-container">
            <div class="articles">お知らせ</div>

                   <div class="articles-box">
                           <table>
                                <tbody>
                                    @foreach($articles as $article)
                                         <tr class="table-row" data-id="{{ $article->id }}">
                                             <td class="table-data">{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年m月d日') }}</td>
                                             <td class="table-data article-title">
                                                <a href="{{ route('articles_show', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                             </td>
                                         </tr>
                                    @endforeach
                                </tbody>
                           </table>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection