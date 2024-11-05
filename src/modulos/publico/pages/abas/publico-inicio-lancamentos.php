<div class="hidden rounded-lg dark:bg-gray-800" id="lctos-tab" role="tabpanel" aria-labelledby="profile-tab"> 



<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap justify-around -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#tabs-deb-cre" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#debito-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">Debito / Dinheiro</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-styled-tab" data-tabs-target="#credito-tab" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Crédito</button>
        </li>
        
    </ul>
</div>

<div id="tabs-deb-cre">
    
    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="debito-tab" role="tabpanel" aria-labelledby="profile-tab">
        
    <div class="flex flex-col gap-5">
            <div class="grid grid-cols-2 gap-2">

                <div>
                    <label for="" class="label">Data *</label>
                    <input type="date" id="data"
                        class="data w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>

                <div>
                    <label for="" class="label">Categoria *</label>
                    <select name="" class="w-full select select-categoria" id="select-categoria" name="select-categoria">
                        <option value="">Selecione</option>
                        <option value="despesa">Saída</option>
                        <option value="receita">Entrada</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="" class="label">Plano de Contas * 
                <select name="" class="select w-full selectPlanoContas" id="selectPlanoContas" name="selectPlanoContas">
                    <option value="">Selecione</option>
                    <!-- select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Beneficiário</label>
                <input type="" name="beneficiario" placeholder="Sr. José, Avó..." class="input beneficiario w-full">
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="" class="label">Tipo *</label>
                    <select name="tipo" id="tipo" class="select tipo w-full">
                        <option value="">Selecione</option>
                        <!-- Select dinamico no js -->
                    </select>
                </div>
                <div>
                    <label for="" class="label">Valor *</label>
                    <input type="text" name="valor" id="valor" placeholder="R$ 500,00" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent valor">
                </div>
            </div>
           

            <div class=" mt-5 flex justify-center">
                <button class="btn-add-mov relative inline-flex items-center justify-end p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0"> Adicionar </span>
                </button>
            </div>
        </div>




    </div>



    <div class="hidden p-4 rounded-lg  dark:bg-gray-800" id="credito-tab" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    
</div>


</div>