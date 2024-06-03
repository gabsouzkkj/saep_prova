<?php

class TurmaController
{
    public function index(){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ?pagina=login');
        }

        $atividades = Atividades::selectByTurma($_GET['turma']);
        $professor = Professores::selectByEmail();
        $allTurmas = Turmas::selectAll();

        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('turma.html');

        $parametros = array();
        $parametros['atividades'] = $atividades;
        $parametros['professores'] = $professor;
        $parametros['turmas'] = $allTurmas;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function insertAtividade(){
        Atividades::insert($_POST);
    }

    public function deleteAtividade(){
        Atividades::delete($_GET['turma']);
    }
}