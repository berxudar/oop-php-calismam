<?php

namespace System\http\post;

class Request
{

    private $csrf_token;

    public function __construct()
    {


        $this->csrf_token = csrf_token();
    }

    public function input($post)
    {

        if ($this->csrf_token == $_POST["csrf_token"]) {

            return $_POST[$post];
        } else {

            echo "form have must  csrf_token";
        }
    }

}
