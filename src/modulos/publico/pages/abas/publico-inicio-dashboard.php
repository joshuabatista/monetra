<div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

    <h1 class="text-2xl text-center font-semibold">Saldo anual</h1>

    <div class="">
        <div class="sparkboxes mt-4 mb-4 flex justify-around">
            <div class="col-md-4">
                <div class="box box1">
                    <div id="spark1" class=" shadow-lg"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box2">
                    <div id="spark2" class=" shadow-lg"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box3">
                    <div id="spark3" class=" shadow-lg"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box4">
                    <div id="spark4" class=" shadow-lg"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-2">
        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Entradas x Saídas</h1>
            <div id="chartsEntradasSaidas" class="shadow-lg"></div>
        </div>

        <div>
            <h1 class="text-xl text-center font-semibold mt-4 mb-2">Saldo Final Mensal</h1>
            <div id="chartsSaldoFinalMensal" class="shadow-lg"></div>
        </div>

    </div>

    <div class="grid grid-cols-2 gap-2">
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