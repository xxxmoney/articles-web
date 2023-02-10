@extends('layouts.app')

@section('title', __('about.title'))

@section('content')
<div class="container">
    <div class="d-flex flex-column gap-4">
        @foreach (__('about.texts') as $text)
            <p class="m-0 fs-4 mx-md-5">{{ __($text) }}</p>
        @endforeach
    </div>
</div>
@endsection
