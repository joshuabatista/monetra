<?php
 $title = "Monetra | Inicio";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";

 $usu_id = $_SESSION['user_id'];

?>


<html lang="pt-br">

<?php require '../../../includes/header.php'; ?>


<body>
    <div class="grid grid-cols-4 gap-2">

        <div class=" col-span-3 content rounded-r-xl">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="controle"
                    data-tabs-toggle="#controle-content" role="tablist">

                    <li class="me-2" role="presentation"> <button class="inline-block p-4 border-b-2 rounded-t-lg" id="visao-tab"
                            data-tabs-target="#visao-geral" type="button" role="tab" aria-controls="visao-geral"
                            aria-selected="false">Visão Geral</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Dashboard</button>
                    </li>
                    <li class="me-2 relative" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="minucioso-tab" data-tabs-target="#minucioso" type="button" role="tab"
                            aria-controls="minucioso" aria-selected="false">
                            Controle Minucioso
                        </button>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-primary rounded-full animate-pulse bolinhaMinucioso hidden"></span>
                    </li>

                    <li class="me-2 relative" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="pagarReceber-tab" data-tabs-target="#pagarReceber" type="button" role="tab"
                            aria-controls="cartao" aria-selected="false">
                            Pagar / Receber
                        </button>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-primary rounded-full animate-pulse bolinhaPendentes hidden"></span>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="cartao-tab" data-tabs-target="#cartao" type="button" role="tab"
                            aria-controls="cartao" aria-selected="false">Cartão de Crédito</button>
                    </li>

                </ul>
            </div>
            <div id="controle-content">

                    <?php include "../pages/abas/publico-inicio-visao-geral.php" ?>
                    
                    <?php include "../pages/abas/publico-inicio-dashboard.php" ?>

                    <?php include "../pages/abas/publico-inicio-minucioso.php" ?>

                    <?php include "../pages/abas/publico-inicio-pagar-receber.php" ?>

                    <?php include "../pages/abas/publico-inicio-cartao-credito.php" ?>

            </div>
        </div>

        <div class="col-span-1 bg-white mt-4 shadow-lg justify-center items-center rounded-l-xl">

            <div class=" mt-20 btn-start justify-center hidden flex">
                <a href="controle" class="relative inline-block text-lg group">
                    <span class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
                    <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                    <span class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-primary group-hover:-rotate-180 ease"></span>
                    <span class="relative">Get Started!</span>
                    </span>
                    <span class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-primary rounded-lg group-hover:mb-0 group-hover:mr-0" data-rounded="rounded-lg"></span>
                </a>
            </div>

            <div class=" border-b border-gray-200 dark:border-gray-700 controle-init ">
                <ul class="flex flex-wrap justify-around -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#tabs-lctos" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="lctos-tabs" data-tabs-target="#lctos-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">Lançamentos</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-styled-tab" data-tabs-target="#controle-tab" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Controle</button>
                    </li>
                </ul>
            </div>

            <div id="tabs-lctos" class="controle-init ">

                <?php include "../pages/abas/publico-inicio-lancamentos.php" ?>

                <?php include "../pages/abas/publico-inicio-controle.php" ?>

            </div>




        </div>


        
    </div>



    <?php require"../../../includes/footer.php"?>
    <script src="/src/modulos/publico/assets/js/publico-visao-geral.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-controle-lancamentos.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-controle-cartao-credito.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-inicio.js"></script>



</body>

</html>