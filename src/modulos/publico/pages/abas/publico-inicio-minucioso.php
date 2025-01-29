<div class="hidden p-4 rounded-lg mb-10" id="minucioso" role="tabpanel" aria-labelledby="minucioso-tab">

    <div class="flex justify-start mt-0 mb-0 ml-4 text-zinc-500  ">
        <?php include(__DIR__ . '/../drawer/publico-drawer-minucioso.php'); ?>
    </div>


    <div class="w-full grid grid-cols-2 lg:grid-cols-6 gap-5 p-4">

        <div class=" col-span-3 ">
            <label for="" class="label">Selecione um Plano de Contas</label>
            <select name="selectControle" id="selectControle" class="input w-full">
                <option value="">Selecione</option>
            </select>
        </div>

        <div class=" col-span-3 ">
            <label for="" class="label">Defina um teto a ser gasto por mês</label>
            <input type="" name="inputValor" id="inputValor" class="input w-full" placeholder="R$ 200,00">
        </div>

        

    </div>

    <div class="col-span-1 mt-[19px] text-center lg:text-start">
        <button
            class="btn-add-minucioso relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span
                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Adicionar
            </span>
        </button>
    </div>

    <div class="flex flex-row gap-3 mt-4 ml-4">
        <small class="text-zinc-600 font-bold text-sm">Filtro </small>
        <button class="btn-show-mes"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
        <button class="btn-hide-mes hidden"><i class="fa-solid fa-arrow-up-wide-short"></i></button>
    </div>

    <div class="p-4 filtro-data hidden">
        <label for="" class="label">Selecione um período</label>
        <input type="month" id="filtroPeriodo" name="filtroPeriodo"
            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
    </div>

    <div class="">
        <div class="rounded-lg justify-between flex flex-col">
            <div class="loadingMinucioso hidden">
                <img src="/public_html/assets/images/monetra-loading.png" alt="loading" class=" w-14 animate-spin">
            </div>

            <div class="infoSemMov hidden">
                <div class="text-center italic text-gray-600">
                    <p>Não há dados disponíveis para o período selecionado.</p>
                </div>
            </div>

            <div>
                <div id="minuciosoContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                    <!-- Cada card será adicionado dinamicamente aqui -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/src/modulos/publico/assets/js/publico-minucioso.js"></script>