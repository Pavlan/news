<?php


namespace app\core;


abstract class View
{
    public $data;
    public $meta;
    protected $template;

    public function __construct($template, $data, $meta)
    {
        $this->template = $template;
        $this->data = $data;
        $this->meta = $meta;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        return ob_get_clean();
    }

    public function display($template): void
    {
        echo $this->render($template);
    }
}