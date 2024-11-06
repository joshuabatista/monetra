

<div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="controle-tab" role="tabpanel" aria-labelledby="dashboard-tab">

<body>
    <div class=" flex justify-center items-center">
        <div class=" flex flex-col w-[26rem] rounded-lg">
            <div class="max-w-md mx-auto mt-4">
                <label for="saldoInicialLabel" class="label">Saldo inicial</label>
                <div class="form-control">
                    <input type="saldoInicial" id="saldoInicial" class="input w-[14rem] saldoInicial" />
                </div>
            </div>
            <div class="max-w-md mx-auto mt-4">
                <label for="dataSaldoLabel" class="label">Data do saldo inicial</label>
                <div class="form-control">
                    <input type="date" id="dataSaldo" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-[14rem]" />
                </div>
            </div>
    
            <div class="max-w-md mx-auto mt-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" id="switch-avançar">
                    <div
                        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Deseja fazer o controle do Cartão de Crédito?</span>
                </label>
            </div>

           
            <div class="max-w-md mx-auto mt-4 mb-4 creditCards hidden">
                <label for="options" class="label">Quantos Cartões de Crédito?</label>
                <div class="form-control">
                    <select id="options" name="options" class="options select w-[14rem]">
                        <option value="">Selecione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="max-w-md mx-auto mt-4" id="cardNamesContainer">

                </div>
            </div>
           
    
            <div class="max-w-md mx-auto mt-4 mb-4">
                <button id="btn-avancar" href="" class="relative inline-flex items-center justify-center  px-2 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-purple-500 rounded-full shadow-md group">
                    <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-purple-500 group-hover:translate-x-0 ease">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                    <span class="absolute flex items-center justify-center w-full h-full text-purple-500 transition-all duration-300 transform group-hover:translate-x-full ease">Avançar</span>
                    <span class="relative invisible">Avançar</span>
                </button>
            </div>


        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.saldoInicial').mask('000000000,00', { reverse: true });
        });
    </script>


    <script src="/src/modulos/publico/assets/js/publico-controle.js"></script>

    <?php require"../../../includes/footer.php"?>
</body>

</div>