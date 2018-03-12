<?php

include './back/auth.php';
include './back/ajax.php';

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class AuthorizationAjaxRequest extends AjaxRequest
{
    public $actions = array(
        "login" => "login",
        "logout" => "logout",
        "register" => "register",
    );

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("sid", "");

        $username = $this->getRequestParam("username");
        $password = $this->getRequestParam("password");
        $remember = !!$this->getRequestParam("remember-me");

        if (empty($username)) {
            $this->setFieldError("username", "Введите адрес почты");
            return;
        }

        if (empty($password)) {
            $this->setFieldError("password", "Укажите пароль");
            return;
        }

        $user = new Auth\User();
        $auth_result = $user->authorize($username, $password, $remember);

        if (!$auth_result) {
            $this->setFieldError("password", "Неверное имя пользователя и/или пароль");
            return;
        }

        $this->status = "ok";
        $this->setResponse("redirect", " ");
        $this->message = sprintf("Hello, %s! Access granted.", $username);
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $user = new Auth\User();
        $user->logout();

        $this->setResponse("redirect", " ");
        $this->status = "ok";
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $username = $this->getRequestParam("username");
        $name = $this->getRequestParam("name");
        $password = $this->getRequestParam("password");

        if (empty($username)) {
            $this->setFieldError("username", "Укажите почту");
            return;
        }

        if (empty($name)) {
            $this->setFieldError("name", "Необходимо имя для отображения");
            return;
        }

        if (empty($password)) {
            $this->setFieldError("password", "Защитите аккаунт паролем");
            return;
        }

        $user = new Auth\User();

        try {
            $new_user_id = $user->create($username, $password, $name);
        } catch (\Exception $e) {
            $this->setFieldError("username", $e->getMessage());
            return;
        }
        $user->authorize($username, $password);

        $this->message = sprintf("Hello, %s! Thank you for registration.", $username);
        $this->setResponse("redirect", " ");
        $this->status = "ok";
    }
}

$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
