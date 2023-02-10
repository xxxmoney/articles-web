<?php

namespace App\View\Components\article;

use Illuminate\View\Component;

class preview extends Component
{
    /**
     * Article id.
     *
     * @var string
     */
    public $article;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($article, $maxContentSize = 350)
    {
        $this->article = $article;

        // Truncate content
        if (strlen($this->article->content) > $maxContentSize) {
            $this->article->content = substr($this->article->content, 0, $maxContentSize) . '...';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article.preview');
    }
}
