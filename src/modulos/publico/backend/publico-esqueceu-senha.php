<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

$email = $_GET['email'];

if(empty($email)){
    response([
        'status'=>false,
        'message'=>'informe o email'
    ]);
}

$sql = "SELECT email FROM users";

$query = prepareAll($sql);

$emailsBanco = $query->data;

