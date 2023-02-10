@extends('layouts.app')

@section('title', __('article.title'))

@section('content')
<div class="container">
    @auth
        <div class="row justify-content-center mb-3">
            <a href="{{ route('article_show_create') }}" class="btn btn-secondary w-25">{{ __('article.create') }}</a>
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

