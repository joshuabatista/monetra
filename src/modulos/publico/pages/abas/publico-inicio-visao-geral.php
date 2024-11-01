<div class="hidden p-4 rounded-lg" id="visao-geral" role="tabpanel" aria-labelledby="visao-tab">
    <div class="grid grid-cols-[30%_70%]">
        <div>
            <div class="movimentatios">
                <div>
                    <h1 class="mb-2 text-2xl text-center">Movimentações do periodo</h1>
                </div>
            </div>
            <div class="filters-period flex flex-row bg-gray-100 p-5 rounded-xl shadow-xl justify-between">
                <div class="col-data-inicio">
                    <label for="data-inicio" class="label">Data inicio</label>
                    <input type="date" id="data-inicio" name="data-inicio"
                        class=" px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div class="col-data-termino">
                    <label for="data-termino" class="label">Data termino</label>
                    <input type="date" id="data-termino" name="data-termino"
                        class=" px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
    
            </div>
            <br>
            
            <div class="grid grid-cols-2 gap-2">
                <div class=" bg-gray-300 inline-flex flex-col gap-4 p-5 rounded-xl shadow-xl">
                    <div class="">
                        <label for="" class="text-xl">Saldo Inicial</label>
                        <h1 class="text-xl"><small><i class="fa-solid fa-money-bill-1 bg-slate-500 p-2 rounded-lg"></i></small> R$ 3.000,00</h1>
                    </div>
                    <div class="">
                        <label for="" class="text-xl">Entradas</label>
                        <h1 class="text-xl"><small><i class="fa-solid fa-arrow-trend-up bg-green-500 p-2 rounded-lg"></i></small> R$ 3.000,00</h1>
                    </div>
                    <div class="">
                        <label for="" class="text-xl">Saidas</label>
                        <h1 class="text-xl"><small><i class="fa-solid fa-arrow-trend-down bg-red-500 p-2 rounded-lg"></i></small> R$ 3.000,00</h1>
                    </div>
                    <div class="">
                        <label for="" class="text-xl">Saldo Final</label>
                        <h1 class="text-xl"><small><i class="fa-solid fa-money-bill-transfer bg-slate-500 p-2 rounded-lg"></i></small> R$ 3.000,00</h1>
                    </div>
                </div>
    
                <div class=" bg-gray-100 inline-flex flex-col rounded-xl shadow-xl">
                    <div class="flex text-center justify-center">
                        <label for="" class="text-xl ">Mov. dia</label>
                    </div>
                    <div id="chartDay"></div>
    
                   
                </div>
            </div>
            
        </div>

        <div class="">
            <div>
                <h1 class="mb-2 text-2xl text-center">Movimentações diarias</h1>
                <div id="chart"></div>
            </div>

        </div>
    </div>

</div>