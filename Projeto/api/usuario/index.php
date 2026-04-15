<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setattribute(pdo::ATTR_ERRMODE,Pdo::ERRMODE_EXCEPTION);
/*
?jsn={"op":"i","id":0,"nome":"","login":"","senha":"","logado":true}
*/
$json = filter_input(INPUT_GET,'jsn');
$jsn = $_GET['jsn'];
$data = json_decode($jsn,true);
/*op=1 insert - op=u update - op=d delete = op=sp select com parametro*/
$op = $data['op'];
$id = $data['id'];
$nome = $data['nome'];
$login = $data['login'];
$senha = $data['senha'];
$logado = $data['logado'];

switch ($op) {
case'i':
    $sql= "insert into usuarios (usunome, usulogin, ususenha) values (?,?,MD5(?));";
    $prp= $pdo->prepare($sql);
    $prp->execute(array($nome,$login,$senha));
    break;

case'u':
    if (empty($senha)) {
    $sql = "update usuarios set usunome = ?, usulogin = ?, usulogado =?, WHERE usuid=?;";
    $prp = $pdo->prepare($sql);
    $prp->execute(array($nome,$login,$usulogado,$id));

    echo "Atualizado com sucesso";
    } else {
    $sql = "update usuarios set usunome = ?, usulogin = ?,usulogado =?, ususenha=MD5(?) WHERE usuid=?;";
    $prp = $pdo->prepare($sql);
    $prp->execute(array($nome,$login,$senha,$usulogado,$id));
    }
    break;

case'd':
    $sql= "Delet from usuarios (usunome, usulogin, ususenha) where usuid=(?);";
    $prp= $pdo->prepare($sql);
    $prp->execute(array($nome,$login,$senha));
    break;

case'l':
    $sql ="select usuid as id, usunome as nome, usulogin as login, usulogado as logado from usuarios where usulogin =? 
    and ususenha = MD5(?);";
    $prp= $pdo->prepare($sql);
    $prp->execute(array($usuario,$senha));
    $data = $prp->fetchall(PDO::FETCH_ASSOC);
    echo json_decode($data);
    break;

case'sp':
    $nome = '%'.$nome.'%';
    $sql ="select usuid as id, usunome as nome, usulogin as login, usulogado as logado from usuarios where usunome 
    like %''%;";
    $prp= $pdo->prepare($sql);
    $prp->execute([$nome]);
    $data = $prp->fetchall(PDO::FETCH_ASSOC);
    echo json_encode($data);
    break;

default;
    echo 'coloca o parametro certo seu ameba';
    break;
}
Conexao::desconectar();
?>