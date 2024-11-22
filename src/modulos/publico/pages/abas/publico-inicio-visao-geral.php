    <div class="hidden p-4 rounded-lg" id="visao-geral" role="tabpanel" aria-labelledby="visao-tab">
        <div class="grid grid-cols-[30%_70%]">
            <div class="ml-4">
                <div class="movimentatios">
                    <div>
                        <h1 class="mb-2 text-2xl text-center font-semibold">Periodo</h1>
                    </div>
                </div>

                <div class="filters-period flex flex-row bg-gray-100 p-5 rounded-xl shadow-xl w-full justify-center border border-gray-200"">
                    <div class="col-data-inicio">
                        <input type="month" id="data-inicio" name="data-inicio" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>
                
                
                
                <div class="grid grid-cols-2 gap-2 mt-3 ">
                    <div class=" bg-gray-100 inline-flex flex-col gap-8 p-5 rounded-xl shadow-xl border border-gray-200">
                        <div class="flex flex-col text-center justify-center">
                            <label for="" class="text-xl mt-0 font-semibold">Saldos</label>
                        </div>

                        <div class="saldos inline-flex flex-col gap-8 p-2 mb-2">
                            <div>
                                <label for="" class="text-xl italic text-zinc-600">Saldo Inicial</label>
                                <h1 class=" text-lg" id="saldoInicial"><small><i class="fa-solid fa-money-bill-1 bg-slate-500 p-2 rounded-lg"></i></small></h1>
                            </div>
                            <div>
                                <label for="" class="text-xl text-zinc-600 italic">Entradas</label>
                                <h1 class="text-lg" id="entradas"><small><i class="fa-solid fa-arrow-trend-up bg-green-500 p-2 rounded-lg"></i></small></h1>
                            </div>
                            <div>
                                <label for="" class="text-xl text-zinc-600 italic">Saidas</label>
                                <h1 class="text-lg" id="saidas"><small><i class="fa-solid fa-arrow-trend-down bg-red-500 p-2 rounded-lg"></i></small></h1>
                            </div>
                            <div>
                                <label for="" class="text-xl text-zinc-600 italic">Saldo Final</label>
                                <h1 class="text-lg" id="saldoFinal"><small><i class="fa-solid fa-money-bill-transfer bg-slate-500 p-2 rounded-lg"></i></small></h1>
                            </div>
                        </div>
                        <div role="status" class="max-w-sm animate-pulse hidden skeleton-saldos">
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gra:bg-gray-700 max-w-[300px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gra:bg-gray-700 max-w-[300px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gra:bg-gray-700 max-w-[300px] mb-2.5"></div>
                            <span class="sr-only">Loading...</span>
                        </div>
                                                
                        <!-- <div class="loading justify-center hidden flex">
                            <img src="/public_html/assets/images/monetra-loading.png" alt="loading" class=" w-14 animate-spin">
                        </div> -->
                        
                    </div>
        
                    <div class=" bg-gray-100 inline-flex flex-col rounded-xl shadow-xl border border-gray-200">
                        <div class="flex flex-col text-center justify-center items-center mt-4">
                            <label for="" class="text-xl mb-1 font-semibold">Mov. dia</label>
                            <input type="date" id="dataInicio" class="mt-2 w-40 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>
                        
                        <div id="chartDay"></div>
        
                    
                    </div>
                </div>
                
            </div>

            <div class="mr-4 ml-4 mt-4">
                <div>
                    <h1 class="mb-2 text-2xl text-center font-semibold">Movimentação mensal</h1>
                    <div id="chart"></div>

                </div>

            </div>
        </div>

    </div>