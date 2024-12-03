<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$senha1 = $_POST['novaSenha1'];
$senha2 = $_POST['novaSenha2'];
$usu_id = $_POST['usu_id'];

if(empty($senha1) || empty($senha2)){
    response([
        'status'=>false,
        'message'=>'Preencha os campos corretamente'
    ]);
}

if(empty($usu_id)){
    response([
        'status'=>false,
        'message'=>'Erro ao alterar a senha, contate o suporte tecnico [3615]'
    ]);
}

if($senha1 != $senha2){
    response([
        'status'=>false,
        'message'=>'As senhas se diferem'
    ]);
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $senha1)) {
    response([
        'status' => false,
        'message' => 'A senha deve ter no mínimo 8 caracteres, incluindo uma letra maiúscula, uma minúscula, um número e um caractere especial.'
    ]);
}

$hashedPassword = password_hash($senha1, PASSWORD_DEFAULT);

$sql = "UPDATE users SET senha = ? WHERE id = ?";

$query = prepare($sql, [$hashedPassword, $usu_id]);

if(!empty($query->exception)){
    response([
        'status'=>false,
        'message'=>'Erro ao alterar senha, contate o suporte tecnico [34032]'
    ]);
}

response([
    'status'=>true,
    'message'=>'Senha alterada com sucesso!',
    'redirect'=>'inicio'
]);