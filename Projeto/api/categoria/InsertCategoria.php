<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$jsn = $_GET['jsn'];
$data = json_decode($jsn,true);
$nome = $data['nome'];
$sql= "insert into categorias (catnome) values (?);";
$prp= $pdo->prepare($sql);
$prp->execute(array($nome));
CONEXAO::desconectar();
