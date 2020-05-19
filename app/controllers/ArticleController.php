<?php


namespace app\controllers;


use app\core\Controller;
use app\models\ArticleRepository;

class ArticleController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->modelObject = new ArticleRepository($_GET['id'] ?? '');
    }

    public function actionIndex(): void
    {
        $this->data = $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        $this->displayPage();
    }
}