<?php // index.php
 
require_once("./database/MariaDb.php");
require_once("./models/Usuario.php");
 
$mariaDb = new MariaDb();
$conexao = $mariaDb->dbConnection();
 
// $usuario = new Usuario($conexao);
// $usuario->nome = "Gabriel";
// $usuario->login = "gabriel@teste.com.br";
// $usuario->senha = "123";
// $usuario->create();
 
// $usuario2 = new Usuario($conexao);
// $usuario2->nome = "Maria";
// $usuario2->login = "maria@teste.com.br";
// $usuario2->senha = "123456";
// $usuario2->create();
 
// $usuario = new Usuario($conexao);
// $usuario->id = 1;
// $usuario->remove();
 
/*$usuario = new Usuario($conexao);
$usuario->id = 2;
$usuario->nome = "Maria Clementina";
$usuario->login = "maria@asdrubal.org";
$usuario->senha = "789456";
$usuario->update();*/
 
$lista_de_usuarios = $usuario->getAll();
 
foreach($lista_de_usuarios as $item){
    echo "nome: {$item['nome']}";
    echo PHP_EOL;
}
$usuario = new Usuario($conexao);
$usuario->getUserById(10);
 
if($usuario->id > 0){
    echo "usuário: {$usuario->nome} encontrado";
}else{
    echo "Usuário não encontrado";
}
 
echo PHP_EOL;