<?php


namespace app\core;


abstract class Controller
{
    public $data = [];
    public $meta = [];
    protected $controllerName;
    protected $actionName;
    protected $params;
    protected $prefix;
    protected $modelObject;

    public function __construct($params)
    {
        $this->controllerName = $params['controller'];
        $this->actionName = $params['action'];
        $this->params = $params['params'];
        $this->prefix = $params['prefix'];
        session_start();
    }

    protected function displayPage(): void
    {
        $viewName = $this->prefix ?: 'News';
        $viewName = 'app\views\\' . $viewName;
        new $viewName($this->getTemplatePath(), $this->data, $this->meta);
    }

    protected function isLogin(): bool
    {
        return isset($_SESSION['userName']);
    }

    private function getTemplatePath(): string
    {
        return VIEWS_DIR . '/' . $this->prefix . ucfirst($this->controllerName) . '/' . $this->actionName . '.php';
    }
}