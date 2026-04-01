<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$sql ="select usuid as id, usunome as nome, usulogin as login, usulogado as logado from usuarios; ";
$prp= $pdo->prepare($sql);
$prp->execute(array());
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);