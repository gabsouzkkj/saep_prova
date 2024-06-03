<?php
class Atividades
{
    public static function selectByTurma($turma)
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM sistemaescolar.atividades where turma='$turma'";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while($row = $sql->fetchObject('Atividades')){
            $resultado[] = $row;
        }

        return $resultado;
    }

    public static function insert($dadosPost)
    {
        $tituloDaAtividade = $dadosPost['titulo'];
        $nomeDaTurma = $dadosPost['turma'];

        $con = Connection::getConn();
        $sql = $con->prepare("INSERT INTO sistemaescolar.atividades (titulo, turma) VALUES (:tituloDaAtividade, :nomeDaTurma)");
        $sql->bindParam(':tituloDaAtividade', $tituloDaAtividade);
        $sql->bindParam(':nomeDaTurma', $nomeDaTurma);
        $res = $sql->execute();

        if($res){
            $mensagem = "Atividade cadastrada com sucesso";
            $urlRedirecionamento = "?pagina=turma&turma=$nomeDaTurma";
            echo "<script>";
            echo "alert('$mensagem');"; // Exibe o alerta
            echo "window.location.href = '$urlRedirecionamento';"; // Redireciona o usuário
            echo "</script>";
        }
    }

    // public static function delete($turma)
    // {
    //     $con = Connection::getConn();
    //     $sql = $con->prepare("DELETE FROM sistemaescolar.turmas WHERE nome='$turma'");
    //     $res = $sql->execute();

    //     if($res){
    //         $mensagem = "Turma deletada com sucesso";
    //         $urlRedirecionamento = "?pagina=home";
    //         echo "<script>";
    //         echo "alert('$mensagem');"; // Exibe o alerta
    //         echo "window.location.href = '$urlRedirecionamento';"; // Redireciona o usuário
    //         echo "</script>";
    //     }
    // }
}