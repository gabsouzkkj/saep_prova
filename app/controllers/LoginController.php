<?php

class LoginController
{
    public function index(){
        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('login.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function login(){
        Professores::login($_POST);
    }
}