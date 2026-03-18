<?php
require '.../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$nome  = $data['nome'];
$login = $data['login'];
if (empty($senha)) {
    $sql = "update usuarios 
            set usunome = ?, usulogin = ?, ususenha = MD5(?)
            WHERE usuid=?;";
    $prp = $pdo->prepare($sql);
    $prp->execute(array($nome,$senha,$login));

    echo "Atualizado com sucesso";
} else {
    echo "Senha não informada. Nenhuma alteração feita.";
}
?>