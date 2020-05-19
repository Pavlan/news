<?php


namespace app\views;


use app\core\View;

class Admin extends View
{
    public function __construct($template, $data, $meta)
    {
        parent::__construct($template, $data, $meta);
        $this->display(VIEWS_DIR . '/MainTemplate/' . $this->isLoginForm($template));
    }

    private function isLoginForm($template): string
    {
        if ($template === VIEWS_DIR . '/AdminLogin/index.php' || $template === VIEWS_DIR . '/AdminLogin/validate.php') {
            return 'admin.php';
        }
        return 'adminPanel.php';
    }
}