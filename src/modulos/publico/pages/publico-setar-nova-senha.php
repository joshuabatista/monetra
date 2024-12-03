<?php
 $title = "Monetra | Alterar senha";

 session_start();

 if (isset($_SESSION['user_id'])) {
    header("Location:/inicio"); 
    exit;
}

if (!isset($_GET['token'])) {
    header("Location:/inicio"); 
    exit;   
}

require "../../../../app/functions.php";

$token = $_GET['token'];
$decryptedToken = openssl_decrypt(base64_decode($token), 'AES-128-CTR', $key, 0, '1234567891011121');

if (!$decryptedToken) {
    header("Location:/inicio"); 
    exit;  
}

$tokenData = json_decode($decryptedToken, true);

if (!$tokenData || time() > $tokenData['expiry']) {
    header("Location:/inicio"); 
    exit;  
}

$usu_id = $tokenData['usu_id'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../../../../src/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="../../public_html/assets/images/monetra-only-logo-royal.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<script>
    const usu_id = <?= $usu_id ?>
</script>

<html lang="pt-br">

<header class="bg-[#4b50d1] text-white p-4 shadow-lg">

    <div class="flex justify-center">
        <div class="logo-monetra">
            <img class=" w-48" src="../../../../public_html/assets/images/monetra-logo-azul-royal-sem-margem.png" alt="Logo-Monetra" >
        </div>
    </div>
</header>




<body class="bg-slate-200">

    <div class="flex justify-center items-center ">

        <div class="content flex flex-col p-4 rounded-lg">
            <form action="" id="form-setar-senha">
                <div class="flex text-center justify-center">
                    <h1 class=" font-bold text-lg text-slate-700">Alterar senha</h1>
                </div>
                <div class="mt-2">
                    <label for="" class="label">Nova senha</label>
                    <input type="password" name="novaSenha1" id="novaSenha1" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div class="mt-2">
                    <label for="" class="label">Digite a senha novamente</label>
                    <input type="password" name="novaSenha2" id="novaSenha2" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
            </form>


            <div class="mt-4 text-center">
                <button class="btn-nova-senha relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Salvar
                    </span>
                </button>
            </div>
        </div>
    </div>

    <?php require"../../../includes/footer.php"?>
    <script src="/src/modulos/publico/assets/js/publico-esqueceu-senha.js"></script>
</body>

</html>