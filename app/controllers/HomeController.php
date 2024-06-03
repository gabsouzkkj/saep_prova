<?php

class HomeController
{
    public function index(){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ?pagina=login');
        }

        $allTurmas = Turmas::selectAll();
        $professor = Professores::selectByEmail();

        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('home.html');

        $parametros = array();
        $parametros['turmas'] = $allTurmas;
        $parametros['professores'] = $professor;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function logout(){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ?pagina=login');
    }

    public function insertTurma(){
        Turmas::insert($_POST);
    }

    public function deleteTurma(){
        Turmas::delete($_GET['turma']);
    }
}