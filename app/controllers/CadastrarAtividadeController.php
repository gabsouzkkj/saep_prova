<?php

class CadastrarAtividadeController
{
    public function index(){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ?pagina=login');
        }

        $professor = Professores::selectByEmail();
        $allTurmas = Turmas::selectAll();

        $loader = new \Twig\Loader\FilesystemLoader('app/views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('cadastrarAtividade.html');

        $parametros = array();
        $parametros['turmas'] = $allTurmas;
        $parametros['professores'] = $professor;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}