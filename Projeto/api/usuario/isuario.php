<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$jsn = $_GET['jsn'];
$data = json_decode($jsn,true);
$nome = $data['nome'];
$login = $data['login'];
$senha = $data['senha'];
$sql= "insert into usuarios (usunome, usulogin, ususenha) values (?,?,MD5(?));";
$prp= $pdo->prepare($sql);
$prp->execute(array($nome,$login,$senha));
CONEXAO::desconectar();

