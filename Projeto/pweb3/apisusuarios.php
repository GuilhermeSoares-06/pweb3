<?php
require '.../app/conexão.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$sql ="select * from usuarios";
$prp= $pdo->prepare($sql);
$prp->execute();