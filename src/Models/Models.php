<?php
namespace ScriptingThoughts\Models;

abstract class Models {
    protected $brand = "Scripting Thoughts";
    protected $pageTitle;
    protected $message;
    protected $session;
    protected $userControl;
    protected $mail;
    protected $http;
    protected $uploadcare;
    protected $account;

    protected $errors = [];
    protected $errorList = [];

    protected function renderView(string $filePath, array $variables = []): string
    {
        ob_start();
        extract($variables, EXTR_OVERWRITE);
        include($filePath);

        return ob_get_clean();
    }

}