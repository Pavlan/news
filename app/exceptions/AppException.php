<?php


namespace app\exceptions;


use Exception;

class AppException extends Exception
{
    public function displayPage()
    {
        echo $this->getMessage();
    }
}