<?php
 $title = "Monetra | Perfil";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";

 $usu_id = $_SESSION['user_id'];

?>


<html lang="pt-br">

<?php require '../../../includes/header.php'; ?>


<body>

    <div class="flex justify-center items-center">

        <div class="content flex flex-col p-4 rounded-lg">
            <form action="" id="form-editar">
                <div class="flex text-center justify-center">
                    <h1 class=" font-bold text-lg text-slate-700">Informações do usuário</h1>
                </div>
                <div class="area-email mt-4">
                    <label for="" class="label">E-mail</label>
                    <input type="" name="emailUsu" id="emailUsu" class="input">
                </div>
                <div class="area-nomes mt-2">
                    <label for="" class="label">Nome</label>
                    <input type="" name="nomeUsu" id="nomeUsu" class="input">
                </div>
                <div class="area-sobrenome mt-2">
                    <label for="" class="label">Sobrenome</label>
                    <input type="" name="sobrenomeUsu" id="sobrenomeUsu" class="input">
                </div>
                <!-- <div class="area-celular mt-2">
                    <label for="" class="label">Celular</label>
                    <input type="text" name="celularUsu" id="celularUsu" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div> -->
            </form>


            <div class="mt-4 text-center">
                <button class="btn-editar-info relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Salvar
                    </span>
                </button>
            </div>
        </div>
    </div>

    
    <script>
        $(document).ready(function() {
            $('#celularUsu').mask('(00)00000-0000');
        });
    </script>

    <?php require"../../../includes/footer.php"?>
    <!-- <script src="/src/modulos/publico/assets/js/publico-editar.js"></script> -->
</body>

</html>