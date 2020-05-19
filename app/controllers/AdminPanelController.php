<?php


namespace app\controllers;


use app\core\Controller;
use app\exceptions\AccessException;
use app\models\AdminPanel;

class AdminPanelController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->modelObject = new AdminPanel($_SESSION['authorId'] ?? '');
    }

    public function actionIndex(): void
    {
        if (!$this->isLogin()) {
            throw new AccessException('Forbidden', 403);
        }
        $this->data = $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        $this->displayPage();
    }
}