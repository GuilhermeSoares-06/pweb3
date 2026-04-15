<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$sql ="select catid as ID, catnome as NOME, catativo as ATIVO from categorias; ";
$prp= $pdo->prepare($sql);
$prp->execute(array());
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);