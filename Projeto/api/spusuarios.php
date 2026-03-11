<?php
require '.../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$jsn = $_GET['jsn'];//{"nome";"valor"}
$data2 = json_decode($jsn,true);
$nome = $data2['nome'];
$sql ="select * from usuarios where usunome like '%$nome%';";
$prp= $pdo->prepare($sql);
$prp->execute();