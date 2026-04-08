<?php
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$jsn = filter_input(INPUT_GET,'jsn');  
$data = json_decode($jsn,true);
$nome = '%'.$data['nome'].'%';
$sql ="select catnome as NOME DA CATEGORIA from categorias where catnome like %'?'%;";
$prp= $pdo->prepare($sql);
$prp->execute([$nome]);         
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);