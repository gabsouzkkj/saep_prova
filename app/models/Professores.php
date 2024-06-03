<?php
session_start();
class Professores
{
    public static function selectAll()
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM sistemaescolar.professores";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while($row = $sql->fetchObject('Turmas')){
            $resultado[] = $row;
        }

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro no Banco de Dados :(");
        }

        return $resultado;
    }
    public static function selectByEmail()
    {
        $email = $_SESSION['email'];

        $con = Connection::getConn();
        $sql = "SELECT * FROM sistemaescolar.professores where email='$email'";
        $result = $con->query($sql);
        $rows = $result->fetchAll();
        return $rows;
    }
    public static function login($dadosPost)
    {
        $email = $dadosPost['email'];
        $senha = $dadosPost['senha'];

        $con = Connection::getConn();
        $sql = "SELECT * FROM sistemaescolar.professores where email='$email' and senha='$senha'";
        $result = $con->query($sql);
        $rows = $result->fetchAll();
        if($rows == array()){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ?pagina=login');
        }
        else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ?pagina=home');
        }
    }
}