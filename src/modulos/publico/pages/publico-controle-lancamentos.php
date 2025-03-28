<?php

 $title = "Monetra | Lançamentos";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";
 require "../../../../public_html/config/conexao.php";

?>

<html lang="pt-br">

<?php require '../../../includes/header.php'; ?>

<body>

<div class=" flex justify-center items-center">
    <div class="content flex flex-col w-full lg:w-0 max-w-4x1 mx-auto rounded-lg">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">

            <ul class="flex flex-wrap justify-around overflow-x-auto whitespace-nowrap text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#abas" role="tablist">
                <li class="me-2" role="presentation">
                    <button class=" inline-block p-3 sm:p-4 border-b-2 rounded-t-lg text-xs sm:text-sm" id="janeiro-tab" data-tabs-target="#janeiro"
                        type="button" role="tab" aria-controls="janeiro" aria-selected="false">Movimentações financeiras</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-3 sm:p-4 border-b-2 rounded-t-lg text-xs sm:text-sm hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="fevereiro-tab" data-tabs-target="#fevereiro" type="button" role="tab" aria-controls="fevereiro"
                        aria-selected="false">Cartão de Crédito</button>
                </li>
            </ul>
            
        </div>

        <div id="abas">
            
            <?php include '../pages/abas/publico-lancamento.php' ?>

            <?php include '../pages/abas/publico-lancamento-cartao-credito.php' ?>
        </div>
    </div>
</div>

    <script src="/src/modulos/publico/assets/js/publico-controle-lancamentos.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-controle-cartao-credito.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-pagar-receber.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-controle.js"></script>
    <?php require"../../../includes/footer.php"?>
</body>

</html>