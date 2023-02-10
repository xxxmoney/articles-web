@extends('layouts.app')

@section('title', __('article.title'))

@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('article_show_create') }}" class="btn btn-secondary">{{ __('article.create') }}</a>
    </div>
    <div class="row justify-content-center gap-5">
        @foreach ($articles as $article)
            <div class="col-md-8">
                <x-article.preview :id="$article->id" :title="$article->title" :content="$article->content" :user="$article->user->name"/>
            </div>
        @endforeach
    </div>
</div>
@endsection

