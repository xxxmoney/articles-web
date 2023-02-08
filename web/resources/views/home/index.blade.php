@extends('layouts.app')

@section('content')
    <p>Hello.</p>

    {{-- Lists all articles --}}
    @foreach ($articles as $article)
        <div class="card">
            <div class="card-header">
                <h3>{{ $article->title }}</h3>
            </div>
            <div class="card-body">
                <p>{{ $article->content }}</p>
            </div>
        </div>
    @endforeach
@endsection
