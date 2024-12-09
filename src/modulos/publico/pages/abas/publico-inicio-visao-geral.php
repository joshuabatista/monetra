    <div class="hidden p-4 rounded-lg mb-4" id="visao-geral" role="tabpanel" aria-labelledby="visao-tab">
        <div class="block sm:grid grid-cols-[30%_70%]">
            <div class="ml-4 flex flex-col lg:block mobile:ml-0">
                <div class="hidden lg:block">
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
                </div>
                
                
                
                <div class="flex flex-col sm:grid grid-cols-2 gap-2 mt-3 ">

                    <div class="inline-flex bg-gray-100 flex-col gap-0 sm:gap-8 p-5 rounded-xl shadow-xl border border-gray-200">
                        <div class="flex flex-col text-center justify-center">
                            <label for="" class="text-xl mt-0 font-semibold">Saldo</label>
                        </div>

                        <div class="saldos inline-flex flex-col gap-8 p-2 mb-2 mobile:!flex-row mobile:!flex mobile:!justify-center mobile:!items-center">

                        <div class="flex flex-col text-center items-center lg:!text-start lg:!items-start">
                            <label for="" class="text-xl italic text-zinc-600">
                                <p class="hidden lg:block">Saldo Inicial</p>
                                <p class="block lg:hidden text-sm">Inicial</p>
                            </label>
                            <h1 class="text-xs sm:text-lg" id="saldoInicial">
                                <small>
                                    <i class="fa-solid fa-money-bill-1 bg-slate-500 p-2 rounded-lg text-sm"></i>
                                </small>
                            </h1>
                        </div>

                            <div class="flex flex-col text-center items-center lg:!text-start lg:!items-start">
                                <label for="" class="text-sm sm:text-xl text-zinc-600 italic">
                                    Entradas
                                </label>
                                <h1 class="text-xs sm:text-lg" id="entradas">
                                    <small>
                                        <i class="fa-solid fa-arrow-trend-up bg-green-500 p-2 rounded-lg text-sm"></i>
                                    </small>
                                </h1>
                            </div>

                            <div class="flex flex-col text-center items-center lg:!text-start lg:!items-start">
                                <label for="" class="text-sm sm:text-xl text-zinc-600 italic">
                                    Saidas
                                </label>
                                <h1 class="text-xs sm:text-lg" id="saidas">
                                    <small>
                                        <i class="fa-solid fa-arrow-trend-down bg-red-500 p-2 rounded-lg text-sm"></i>
                                    </small>
                                </h1>
                            </div>

                            <div class="flex flex-col text-center items-center lg:!text-start lg:!items-start">
                                <label for="" class="text-xl text-zinc-600 italic">
                                    <p class="hidden lg:block">
                                        Saldo final
                                    </p>
                                    <p class="block lg:hidden text-sm">
                                        Final
                                    </p>
                                </label>
                                <h1 class="text-xs sm:text-lg" id="saldoFinal">
                                    <small>
                                        <i class="fa-solid fa-money-bill-transfer bg-slate-500 p-2 rounded-lg text-sm"></i>
                                    </small>
                                </h1>
                            </div>
                        </div>
                        <div role="status" class="max-w-sm animate-pulse hidden skeleton-saldos">
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                            <div class="hidden lg:block">
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
                            </div>
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                    </div>
        
                    <div class=" bg-gray-100 flex-col rounded-xl shadow-xl border border-gray-200 flex">
                        <div class="flex flex-col text-center justify-center items-center mt-4">
                            <label for="" class="text-xl mb-1 font-semibold"><p class="hidden ms:block">Mov. dia</p><p class="block sm:hidden">Movimentação do dia</p></label>
                            <input type="date" id="dataInicio" class="mt-2 w-40 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        </div>

                        <div role="status" class="max-w-sm animate-pulse hidden skeleton-saldos-dia gap-8 p-5">
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5 mt-4"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                            <div class="hidden lg:block">
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
                            </div>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="chartsMovDia">
                            <div id="chartDay"></div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="mr-0 ml-0 sm:mr-4 sm:ml-4 mt-4">
                <div>
                    <h1 class="text-xl sm:text-2xl mb-2 text-center font-semibold">Movimentação mensal</h1>
                    
                    <div id="chart"></div>

                </div>

            </div>

            
        </div>

    </div>