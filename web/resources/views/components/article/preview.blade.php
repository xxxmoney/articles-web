<div class="card">
    <div class="card-header">
        <div class="row py-2">
            <div class="col-8">
                <a href="{{ route('article_show', $article->id) }}" class="">
                    <h3 class="card-title mb-3">{{ $article->title }}</h3>
                </a>
                <p class="card-subtitle mb-2">{{ __('article.by') }} {{ $article->user->name }}</p>

                <p class="card-subtitle">{{ __('article.created_at') }}: {{ $article->created_at }}</p>
                <p class="card-subtitle">{{ __('article.updated_at') }}: {{ $article->updated_at }}</p>
            </div>
            <div class="col d-flex align-items-start justify-content-end gap-2">
                @if(Auth::user()?->id == $article->user->id)
                    <a href="{{ route('article_show_edit', $article->id) }}" class="btn btn-secondary">{{ __('article.edit') }}</a>
                    <form action="{{ route('article_delete_post') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <button type="submit" class="btn btn-danger">{{ __('article.delete') }}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! $article->content !!}
    </div>
</div>
