<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/database/Database.php';

class ProfessorModel
{
    private string $nome;

    private int $idade;

    private $database;

    //Getters and setters

    public function __construct()
    {
        $this->database = new Database();
    }

    public function listarModel(): array
    {
        //array = array(1, 2, 3, 4, 5);
        //$array = ["João", "Lucas", "Maria", "Clara"];
        $dadosArray = $this->database->executeSelect("SELECT * FROM professores");

        return $dadosArray;
    }

    public function salvarModel(string $nome, int $idade)
    {
        $sql = "INSERT INTO professores(nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }

    public function buscarPeloId(int $id)
    {
        $professorArray = $this->database->executeSelect("SELECT * FROM professores WHERE id = '$id'");
        return $professorArray[0];
    }

    public function atualizarModel(int $id, string $nome, int $idade)
    {
        $sql = "UPDATE professores set nome='$nome', idade='$idade' WHERE id='$id'";
        $this->database->insert($sql);
    }

    public function excluirModel(int $id)
    {
        $sql = "DELETE FROM professores WHERE id='$id'";
        $this->database->insert($sql);
    }
}
