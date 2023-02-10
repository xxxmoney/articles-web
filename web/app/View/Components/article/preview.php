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
    public $id;

    /**
     * Article title.
     *
     * @var string
     */
    public $title;

    /**
     * Article content.
     *
     * @var string
     */
    public $content;

    /**
     * Article author - user.
     *
     * @var string
     */
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $content, $user, $maxContentSize = 350)
    {
        $this->id = $id;
        $this->title = $title;
        $this->user = $user;
        $this->content = $content;

        // Truncate content
        if (strlen($this->content) > $maxContentSize) {
            $this->content = substr($this->content, 0, $maxContentSize) . '...';
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
