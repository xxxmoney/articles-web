<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title">{{ $title }}</h3>
                <p class="card-subtitle mb-2">{{ __('article.by') }} {{ $user }}</p>

                <p class="card-subtitle">{{ __('article.created_at') }}: {{ $created_at }}</p>
                <p class="card-subtitle">{{ __('article.updated_at') }}: {{ $updated_at }}</p>
            </div>
            <div class="col d-flex align-items-start justify-content-end gap-2">
                <a href="{{ route('article_show', $id) }}" class="btn btn-secondary">{{ __('article.show') }}</a>
                <a href="{{ route('article_show_edit', $id) }}" class="btn btn-secondary">{{ __('article.edit') }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $content }}
    </div>
</div>
