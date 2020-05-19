<?php


namespace app\views;


use app\core\View;

class News extends View
{
    public function __construct($template, $data, $meta)
    {
        parent::__construct($template, $data, $meta);
        $this->display(VIEWS_DIR . '/MainTemplate/news.php');
    }

    public function createArticleLink($title, $id): string
    {
        $title = strtolower(preg_replace('/[^ a-z0-9]/ui', '', $title));
        return str_replace(' ', '-', $title) . '?id=' . $id;
    }
}