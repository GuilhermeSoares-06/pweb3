<?php
require '.../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$jsn = $_GET['jsn'];//{"nome";"valor"}
$data = json_decode($jsn,true);
$nome = $data['usuario'];
$nome = $data['senha'];
$sql ="select * from usuarios where usulogin = '$usuario' and ususenha = MD5 ($senha);";
$prp= $pdo->prepare($sql);
$prp->execute();
$data2 = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data2);