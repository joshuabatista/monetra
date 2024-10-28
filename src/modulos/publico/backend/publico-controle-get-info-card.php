<?php

require "../.././../../public_html/config/conexao.php";
require "../../../../app/functions.php";

session_start();

$usu_id = $_SESSION['user_id'];

$sql = "SELECT *
           FROM cartao_credito
           WHERE usu_id = $usu_id";

$query = prepareAll($sql);

$check = $query->data;

response([
    'status'=>true,
    'data'=>$check
]);