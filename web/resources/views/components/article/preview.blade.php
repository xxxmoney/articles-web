<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title">{{ $title }}</h3>
                <p class="card-subtitle">{{ __('article.by') }} {{ $user }}</p>
            </div>
            <div class="col d-flex align-items-start justify-content-end gap-2">
                <a href="{{ route('article_show', $id) }}" class="btn btn-secondary">{{ __('article.show_detail') }}</a>
                <a href="{{ route('article_show_upsert', $id) }}" class="btn btn-secondary">{{ __('article.edit') }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $content }}
    </div>
</div>
