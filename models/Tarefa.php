<?php // models/Usuario.php
 
class Tarefa {
    private $conexao;
    private $table_name = 'tarefa';
 
    public $id_tarefa;
    public $nome;
    public $descricao;
    public $id_usuario;
 
    public function __construct($db) {
        $this->conexao = $db;
    }
 
    // Criar usuário
    public function create() {
        $query = 'INSERT INTO ' . $this->table_name . ' SET nome = :nome, descricao = :descricao, id_usuario = :id_usuario';
        $stmt = $this->conexao->prepare($query);
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->id_usuario = $this->id_usuario;
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
 
    // Ler usuários
    public function getAll() {
        $query = 'SELECT * FROM ' . $this->table_name;
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    // Obter usuário pelo ID
    public function getTarefaById($id_tarefa) {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':id_tarefa', $id_tarefa);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->id_tarefa = $row['id_tarefa'];
            $this->nome = $row['nome'];
            $this->descricao = $row['descricao'];
            $this->id_usuario = $row['id_usuario'];
            return $row;
        }
        return [];
    }
 
 
    // Atualizar usuário
    public function update() {
        $query = 'UPDATE ' . $this->table_name . ' SET nome = :nome, descricao = :descricao, id_usuario = :id_usuario WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->id_usuario = ($this->id_usuario);
        $this->id_tarefa = ($this->id_tarefa);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':id_tarefa', $this->id_tarefa);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
 
    // Deletar usuário
    public function remove() {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE id_tarefa = :id_tarefa';
        $stmt = $this->conexao->prepare($query);
 
        $this->id_tarefa = (int) $this->id_tarefa;
        $stmt->bindParam(':id_tarefa', $this->id_tarefa);
 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}