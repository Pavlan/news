<?php


namespace app\exceptions;


use Exception;

class AccessException extends Exception
{
    public function displayPage()
    {
        echo $this->getMessage();
    }
}