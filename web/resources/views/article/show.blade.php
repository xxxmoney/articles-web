@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="container my-5">
        <p class="text-muted text-center mb-5">{{ __('article.by') }} {{ $article->user->name }}</p>
        <div class="row">
            <div class="col-md-8 mx-auto p-4 border">
                <p class="text-justify">{!! $article->content !!}</p>
              </div>
        </div>
    </div>
</div>
@endsection

