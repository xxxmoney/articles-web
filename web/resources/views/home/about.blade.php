@extends('layouts.app')

@section('title', __('about.title'))

@section('content')
<div class="container">
    <div class="d-flex flex-column gap-4">
        @foreach (__('about.texts') as $text)
            <div class="row">
                <div class="col-md-8 mx-auto p-4 border d-flex">
                    <i class="{{ __($text['icon']) }} fs-1 m-auto"></i>
                    <p class="m-0 fs-5 mx-md-5">{{ __($text['content']) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
