<?php

class CadastrarTurmaController
{
    public function index(){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ?pagina=login');
        }
        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('home.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}