@extends('layouts.app')

@section('title', $article?->id == null ? __('article.create') : __('article.edit'))

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="{{ route('article_upsert') }}" method="post" class="d-flex flex-column gap-2">
                    @csrf
                    <div class="form-group">
                        <label for="title">{{ __('article.text_title') }}</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $article?->title ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('article.content') }}</label>
                        <textarea name="content" id="content" class="form-control">{{ old('content', $article?->content ?? '') }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $article?->id ?? '' }}">
                    <button type="submit" class="btn btn-primary">{{ __('article.save') }}</button>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
                @if($article?->id != null)
                    <form action="{{ route('article_delete_post') }}" method="post" class="mt-1">
                        @csrf
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <button type="submit" class="btn btn-danger w-100">{{ __('article.delete') }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   <!-- Includes the TinyMCE editor. -->
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
       tinymce.init({
           selector: '#content',
           height: 500,
           plugins: 'lists link image code',
           toolbar: 'undo redo | bold italic | bullist numlist | link image | code',
       });
   </script>
@endsection
