
<?php
$sql = "SELECT *
        FROM plano_contas_analitico 
        ORDER BY descricao ASC";

$query = prepareAll($sql);

$plano = $query->data;

?>


<div class="" id="janeiro" role="tabpanel"aria-labelledby="janeiro-tab">

    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 m-3 border border-primary">

        <div class=" flex text-center justify-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Lançamento de movimentações</span>
        </div>
    
        <div class="grid-cols-7 flex gap-5">
            <div>
                <label for="" class="label">Data *</label>
                <input type="date" id="data"
                    class="data px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div>
                <label for="" class="label">Categoria *   
                <button class=" text-black transition transform hover:-translate-y-1  duration-300" type="button" data-drawer-target="drawer-categoria" data-drawer-show="drawer-categoria"
                    data-drawer-placement="left" aria-controls="drawer-categoria"><i class="fa-solid fa-question ml-2"></i></button> </label>
                <select name="" class="select select-categoria" id="select-categoria" name="select-categoria">
                    <option value="">Selecione</option>
                    <option value="despesa">Saída</option>
                    <option value="receita">Entrada</option>
                </select>
            </div>
            <div>
                <label for="" class="label">Plano de Contas * <button class=" text-black transition transform hover:-translate-y-1  duration-300" type="button" data-drawer-target="drawer-planoContas" data-drawer-show="drawer-planoContas"
                data-drawer-placement="left" aria-controls="drawer-planoContas"><i class="fa-solid fa-question ml-2"></i></button></label>
                <select name="" class="select w-64 selectPlanoContas" id="selectPlanoContas" name="selectPlanoContas">
                    <option value="">Selecione</option>
                    <!-- select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Beneficiário</label>
                <input type="" name="beneficiario" placeholder="Sr. José, Avó..." class="input beneficiario">
            </div>
            <div>
                <label for="" class="label">Tipo * <button class=" text-black transition transform hover:-translate-y-1  duration-300" type="button" data-drawer-target="drawer-tipo" data-drawer-show="drawer-tipo"
                data-drawer-placement="left" aria-controls="drawer-tipo"><i class="fa-solid fa-question ml-2"></i></button></label>
                <select name="tipo" id="tipo" class="select tipo">
                    <option value="">Selecione</option>
                    <!-- Select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Valor *</label>
                <input type="number" name="valor" id="valor"  placeholder="R$ 500,00" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent valor">
            </div>
            <div class=" mt-5">
                <button class="btn-add-mov relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Adicionar
                    </span>
                </button>
            </div>
    
            <!-- drawer -->
             <?php include '../pages/drawer/publico-drawer-categoria.php' ?>
    
             <?php include '../pages/drawer/publico-drawer-plano-contas.php' ?>
    
             <?php include '../pages/drawer/publico-drawer-tipo.php' ?>
            
    
        </div>
    </div>

    <div class="">
        <div class=" flex flex-row gap-3 ml-10 mb-3 mt-4">
            <small class=" text-zinc-600 font-bold">Filtros</small>
            <button class="btn-show-filters"><i class="fa-solid fa-arrow-down-wide-short"></i></button>
            <button class="btn-hide-filters hidden"><i class="fa-solid fa-arrow-up-wide-short"></i></button>
        </div>
    </div>



    <div class="hidden grid-cols-5 justify-center gap-3 filters">
        <div class="col-data-inicio ml-[40px]">
            <label for="data-inicio" class="label">Data inicio</label>
            <input type="date" id="data-inicio" name="data-inicio" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>
        <div class="col-data-termino">
            <label for="data-termino" class="label">Data termino</label>
            <input type="date" id="data-termino" name="data-termino" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>
        <div class="col-plano-contas">
            <label for="filtro-plano-contas" class="label">Plano de Contas</label>
            <select id="filtro-plano-contas" name="filtro-plano-contas" class=" w-64 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Selecione</option>
                <?php foreach($plano as $planos) {
                    echo '<option value = "'.$planos->codigo.'">'.$planos->descricao.'</option>';
                } ?>
            </select>
        </div>
        <div class="col-categoria">
            <label for="filtro-categoria" class="label">Categoria</label>
            <select id="filtro-categoria" name="filtro-categoria" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Selecione</option>
                <option value="Despesa">Despesa</option>
                <option value="Receita">Receita</option>
            </select>
        </div>
        <div class="col-tipo mr-[40px]">
            <label for="filtro-tipo" class="label">Tipo</label>
            <select id="filtro-tipo" name="filtro-tipo" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Selecione</option>
                <option value="1">Pago</option>
                <option value="4">A pagar</option>
                <option value="2">Recebido</option>
                <option value="3">A receber</option>
            </select>
        </div>
    </div>
    
    <table class="table-auto w-full mt-5" id="tabelaMovimentacoes">
        <thead class="border border-solid border-gray-300 bg-gray-50">
                <th class="px-6 py-3 text-center" scope="col">Data</th>
                <th class="px-6 py-3 text-center" scope="col">Categoria</th>
                <th class="px-6 py-3 text-center" scope="col">Plano de Contas</th>
                <th class="px-6 py-3 text-center" scope="col">Beneficiário</th>
                <th class="px-6 py-3 text-center" scope="col">Tipo</th>
                <th class="px-6 py-3 text-center" scope="col">Debito</th>
                <th class="px-6 py-3 text-center" scope="col">Crédito</th>
                <!-- <th class="px-6 py-3 text-center" scope="col">Saldo</th> -->
            </tr>
        </thead>
        
        
        <tbody>
            <!-- Linhas serão adicionadas aqui -->
        </tbody>
    </table>
    
    <div class="loading justify-center mt-5 hidden">
        <img src="/public_html/assets/images/monetra-loading.png" alt="loading" class=" w-14 animate-spin">
    </div>
   

</div>
