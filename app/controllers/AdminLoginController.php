<?php


namespace app\controllers;


use app\core\Controller;
use app\models\AdminLogin;

class AdminLoginController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->modelObject = new AdminLogin();
    }

    public function actionIndex(): void
    {
        if ($this->isLogin()) {
            header('Location: /admin/panel');
            exit();
        }
        $this->data = $this->data ?: $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        $this->displayPage();
    }

    public function actionValidate(): void
    {
        if (isset($_POST['name'], $_POST['password']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->data = $this->modelObject->validate($_POST['name'], $_POST['password']);
            $this->actionIndex();
        } else {
            header('Location: /admin');
            exit();
        }
    }

    public function actionLogout(): void
    {
        session_destroy();
        header('Location: /admin');
    }
}