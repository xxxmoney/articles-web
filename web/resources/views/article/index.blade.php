@extends('layouts.app')

@section('title', __('article.title'))

@section('content')
<div class="container">
    @auth
        <div class="d-flex flex-row justify-content-center mb-3 gap-2">
            <a href="{{ route('article_show_create') }}" class="btn btn-secondary">{{ __('article.create') }}</a>
            <a href="{{ route('articles', ['filter_by_user' => true]) }}" class="btn btn-secondary">{{ __('article.show_mine') }}</a>
            <a href="{{ route('articles') }}" class="btn btn-secondary">{{ __('article.show_all') }}</a>
        </div>
    @endauth
    <div class="row justify-content-center gap-5">
        @foreach ($articles as $article)
            <div class="col-md-8">
                <x-article.preview :article="$article"/>
            </div>
        @endforeach
    </div>
</div>
@endsection

