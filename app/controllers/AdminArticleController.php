<?php


namespace app\controllers;


use app\core\Controller;
use app\exceptions\AccessException;
use app\exceptions\AppException;
use app\exceptions\DbException;
use app\models\AdminArticle;

class AdminArticleController extends Controller
{
    public function __construct($params)
    {
        parent::__construct($params);
        $this->modelObject = new AdminArticle($this->params);
    }

    public function actionAdd(): void
    {
        if (!$this->isLogin()) {
            throw new AccessException('Forbidden', 403);
        }
        $this->data = $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        $this->displayPage();
    }

    public function actionInsert(): void
    {
        if (!$this->isLogin()) {
            throw new AccessException('Forbidden', 403);
        }
        if (isset($_POST['title'], $_POST['content'], $_POST['category'], $_FILES['image']) && $_SERVER['REQUEST_METHOD'] === "POST") {
            $postData['title'] = $_POST['title'];
            $postData['content'] = $_POST['content'];
            $postData['category'] = $_POST['category'];
            if ($this->modelObject->insertArticle($postData, $_FILES['image'], $_SESSION['authorId'])) {
                header('Location: /admin/panel');
                exit();
            }
            throw new DbException('Article insertion error');
        }
        header('Location: /admin/article/add');
        exit();
    }

    public function actionEdit(): void
    {
        if (!$this->isLogin()) {
            throw new AccessException('Forbidden', 403);
        }
        $this->data = $this->modelObject->getData();
        $this->meta = $this->modelObject->getMeta();
        if (!$this->isHaveAccess()) {
            throw new AccessException('Forbidden', 403);
        }
        $this->displayPage();
    }

    public function actionUpdate(): void
    {
        if (isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['id'] = $_POST['id'];
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['category'] = $_POST['category'];
            if ($this->modelObject->updateArticle($data)) {
                header('Location: /admin/panel');
                exit();
            }
            throw new DbException('Article update error');
        }
        throw new AccessException('Forbidden', 403);
    }

    public function actionDelete(): void
    {
        if ($this->modelObject->deleteArticle()) {
            header('Location: /admin/panel');
            exit();
        }
        throw new DbException('Article delete error');
    }

    private function isHaveAccess(): bool
    {
        return $this->data['article']->getAuthorId() === $_SESSION['authorId'];
    }
}