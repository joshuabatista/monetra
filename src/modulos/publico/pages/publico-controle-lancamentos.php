<?php

 $title = "Monetra | Lançamentos";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";

?>

<html lang="pt-br">

<?php require '../../../includes/header.php'; ?>

<body>

<div class=" flex justify-center items-center">
    <div class="content flex flex-col rounded-lg">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex justify-around flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#abas" role="tablist">
                <li class="me-2" role="presentation">
                    <button class=" inline-block p-4 border-b-2 rounded-t-lg" id="janeiro-tab" data-tabs-target="#janeiro"
                        type="button" role="tab" aria-controls="janeiro" aria-selected="false">Janeiro</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="fevereiro-tab" data-tabs-target="#fevereiro" type="button" role="tab" aria-controls="fevereiro"
                        aria-selected="false">Fevereiro</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="marco-tab" data-tabs-target="#marco" type="button" role="tab" aria-controls="marco"
                        aria-selected="false">Março</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="abril-tab" data-tabs-target="#abril" type="button" role="tab" aria-controls="abril"
                        aria-selected="false">Abril</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="maio-tab" data-tabs-target="#maio" type="button" role="tab" aria-controls="maio"
                        aria-selected="false">Maio</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="junho-tab" data-tabs-target="#junho" type="button" role="tab" aria-controls="junho"
                        aria-selected="false">Junho</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="julho-tab" data-tabs-target="#julho" type="button" role="tab" aria-controls="julho"
                        aria-selected="false">Julho</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="agosto-tab" data-tabs-target="#agosto" type="button" role="tab" aria-controls="agosto"
                        aria-selected="false">Agosto</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="setembro-tab" data-tabs-target="#setembro" type="button" role="tab" aria-controls="setembro"
                        aria-selected="false">Setembro</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="outubro-tab" data-tabs-target="#outubro" type="button" role="tab" aria-controls="outubro"
                        aria-selected="false">Outubro</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="novembro-tab" data-tabs-target="#novembro" type="button" role="tab" aria-controls="novembro"
                        aria-selected="false">Novembro</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dezembro-tab" data-tabs-target="#dezembro" type="button" role="tab" aria-controls="dezembro"
                        aria-selected="false">Dezembro</button>
                </li>
            </ul>
        </div>

        <div id="abas">
            
            <?php include '../pages/abas/publico-lancamento-janeiro.php' ?>

            <?php include '../pages/abas/publico-lancamento-fevereiro.php' ?>

            <?php include '../pages/abas/publico-lancamento-marco.php' ?>

            <?php include '../pages/abas/publico-lancamento-abril.php' ?>

            <?php include '../pages/abas/publico-lancamento-maio.php' ?>

            <?php include '../pages/abas/publico-lancamento-junho.php' ?>

            <?php include '../pages/abas/publico-lancamento-julho.php' ?>

            <?php include '../pages/abas/publico-lancamento-agosto.php' ?>

            <?php include '../pages/abas/publico-lancamento-setembro.php' ?>

            <?php include '../pages/abas/publico-lancamento-outubro.php' ?>

            <?php include '../pages/abas/publico-lancamento-novembro.php' ?>

            <?php include '../pages/abas/publico-lancamento-dezembro.php' ?>
            
        </div>
    </div>
</div>

    <script src="../assets/js/publico-controle.js"></script>
    <?php require"../../../includes/footer.php"?>
</body>

</html>