<?php


namespace app\exceptions;


use Exception;

class DbException extends Exception
{
    public function displayPage()
    {
        echo $this->getMessage();
    }
}