<?php
 $title = "Monetra | Alterar senha";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";

 $usu_id = $_SESSION['user_id'];

?>


<html lang="pt-br">

<?php require '../../../includes/header.php'; ?>


<body>

    <div class="flex justify-center items-center">

        <div class="content flex flex-col p-4 rounded-lg">
            <form action="" id="form-alterar-senha">
                <div class="flex text-center justify-center">
                    <h1 class=" font-bold text-lg text-slate-700">Alterar senha</h1>
                </div>
                <div class="mt-4">
                    <label for="" class="label">Senha atual</label>
                    <input type="password" name="senhaAtual" id="senhaAtual" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
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
                <button class="btn-alterar-senha relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Salvar
                    </span>
                </button>
            </div>
        </div>
    </div>

    
>

    <?php require"../../../includes/footer.php"?>
    <script src="/src/modulos/publico/assets/js/publico-alterar-senha.js"></script>
</body>

</html>