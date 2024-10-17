


<div class="" id="janeiro" role="tabpanel"
    aria-labelledby="janeiro-tab">

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
                <input type="" name="valor" id="valor"  placeholder="R$ 500,00" class="input valor">
            </div>
            <div class=" mt-5">
                <button
                    class="btn-add-mov relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
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



    <table class="table-auto w-full mt-5" id="tabelaMovimentacoes">
        <thead>
            <tr>
                <th>Data</th>
                <th>Categoria</th>
                <th>Plano de Contas</th>
                <th>Beneficiário</th>
                <th>Tipo</th>
                <th>Debito</th>
                <th>Crédito</th>
            </tr>
        </thead>
        <tbody>
            <!-- Linhas serão adicionadas aqui -->
        </tbody>
    </table>
</div>
