<?php


namespace app\core;


use app\exceptions\AccessException;
use app\exceptions\AppException;
use app\exceptions\DbException;

class App
{
    public static function run(): void
    {
        require_once __DIR__ . '/init.php';

        try {
            Router::routed();
        } catch (DbException $exception) {
            $exception->displayPage();
        } catch (AccessException $exception) {
            http_response_code($exception->getCode());
            $exception->displayPage();
        } catch (AppException $exception) {
            http_response_code($exception->getCode());
            $exception->displayPage();
        }
    }

}