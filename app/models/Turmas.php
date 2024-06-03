<?php
class Turmas
{
    public static function selectAll()
    {
        $con = Connection::getConn();
        $sql = "SELECT * FROM sistemaescolar.turmas";
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

    public static function insert($dadosPost)
    {
        $professor = Professores::selectByEmail();
        $nomeProfessor = $professor[0]['nome'];
        $nomeDaTurma = $dadosPost['nomeDaTurma'];

        $con = Connection::getConn();
        $sql = $con->prepare("INSERT INTO sistemaescolar.turmas (nome, professor) VALUES (:nomeDaTurma, :nomeProfessor)");
        $sql->bindParam(':nomeDaTurma', $nomeDaTurma);
        $sql->bindParam(':nomeProfessor', $nomeProfessor);
        $res = $sql->execute();

        if($res){
            $mensagem = "Turma cadastrado com sucesso";
            $urlRedirecionamento = "?pagina=home";
            echo "<script>";
            echo "alert('$mensagem');"; // Exibe o alerta
            echo "window.location.href = '$urlRedirecionamento';"; // Redireciona o usuário
            echo "</script>";
        }
    }

    public static function delete($turma)
    {
        $con = Connection::getConn();
        $sql = $con->prepare("DELETE FROM sistemaescolar.turmas WHERE nome='$turma'");
        $res = $sql->execute();

        if($res){
            $mensagem = "Turma deletada com sucesso";
            $urlRedirecionamento = "?pagina=home";
            echo "<script>";
            echo "alert('$mensagem');"; // Exibe o alerta
            echo "window.location.href = '$urlRedirecionamento';"; // Redireciona o usuário
            echo "</script>";
        }
    }
}