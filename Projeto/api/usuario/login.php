<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$jsn = $_GET['jsn'];//{"nome";"valor"}
$data = json_decode($jsn,true);
$nome = $data['usuario'];
$nome = $data['senha'];
$sql ="select usuid as id, usunome as nome, usulogin as login, usulogado as logado from usuarios where usulogin =? and ususenha = MD5(?);";
$prp= $pdo->prepare($sql);
$prp->execute(array($usuario,$senha));
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_decode($data);
Conexao::desconectar();