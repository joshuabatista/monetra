<div class="hidden p-4 rounded-lg mb-10" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

    <h1 class="text-2xl text-center font-semibold">Saldo anual</h1>

    
        <div class="mt-4 mb-4">
            <div class="flex flex-wrap">
            <div class="w-2/4 p-1">
                    <div class="box">
                        <div id="spark2" class="shadow-lg"></div>
                    </div>
                </div>
                <div class="w-2/4 p-1">
                    <div class="box">
                        <div id="spark3" class="shadow-lg"></div>
                    </div>
                </div>
                <div class="w-2/4 p-1">
                    <div class="box">
                        <div id="spark1" class="shadow-lg"></div>
                    </div>
                </div>
                <div class="w-2/4 p-1">
                    <div class="box">
                        <div id="spark4" class="shadow-lg"></div>
                    </div>
                </div>
                
            </div>
        </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Entradas x Saídas</h1>
            <div id="chartsEntradasSaidas" class="shadow-lg"></div>
        </div>

        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Saldo Final Mensal (Entradas - Saídas)</h1>
            <div id="chartsSaldoFinalMensal" class="shadow-lg"></div>
        </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Porcentagem de Gastos (mês atual)</h1>
            <div id="chartPorcentagem" class=" shadow-lg"></div>
        </div>

        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Despesas mensais (mês atual)</h1>
            <div id="chartDespesas" class=" shadow-lg"></div>
        </div>

    </div>

</div>


<script src="/src/modulos/publico/assets/js/publico-dashboards.js"></script>