<?php


namespace app\controllers;


use app\core\Controller;
use app\models\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->modelObject = new CategoryRepository($this->params);
    }

    public function actionIndex(): void
    {
        $this->data = $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        $this->displayPage();
    }
}