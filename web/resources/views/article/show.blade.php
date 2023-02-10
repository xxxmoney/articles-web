@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="container my-5">
        <p class="text-muted text-center mb-5">{{ __('article.by') }} {{ $article->user->name }}</p>
        <div class="row">
            <div class="col-md-8 mx-auto p-4 border">
                <p class="text-justify">{!! $article->content !!}</p>

                @auth
                    <div class="row mt-2 gap-3">
                        <a href="{{ route('article_show_edit', $article->id) }}" class="btn btn-secondary col">{{ __('article.edit') }}</a>
                        @if($article?->id != null)
                            <form action="{{ route('article_delete_post') }}" method="post" class="col m-0 p-0">
                                @csrf
                                <input type="hidden" name="id" value="{{ $article->id }}">
                                <button type="submit" class="btn btn-danger w-100">{{ __('article.delete') }}</button>
                            </form>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

