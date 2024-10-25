<div class="" id="fevereiro" role="tabpanel" aria-labelledby="fevereiro-tab">

    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 m-3 border border-primary">

        <div class=" flex text-center justify-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <span class="font-medium">Lançamento de Cartão de Credito</span>
        </div>

        <div class="grid-cols-7 flex gap-5">
            <div>
                <label for="" class="label">Data *</label>
                <input type="date" id="dataCartao"
                    class="data px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div>
                <label for="" class="label">Categoria *
                    <button class=" text-black transition transform hover:-translate-y-1  duration-300" type="button"
                        data-drawer-target="drawer-categoria" data-drawer-show="drawer-categoria"
                        data-drawer-placement="left" aria-controls="drawer-categoria"><i
                            class="fa-solid fa-question ml-2"></i></button> </label>
                <select name="" class="select select-categoria-cartao" id="select-categoria-cartao" name="select-categoria-cartao">
                    <option value="">Selecione</option>
                    <option value="despesa">Saída</option>
                    <option value="receita">Entrada</option>
                </select>
            </div>
            <div>
                <label for="" class="label">Plano de Contas * <button
                        class=" text-black transition transform hover:-translate-y-1  duration-300" type="button"
                        data-drawer-target="drawer-planoContas" data-drawer-show="drawer-planoContas"
                        data-drawer-placement="left" aria-controls="drawer-planoContas"><i
                            class="fa-solid fa-question ml-2"></i></button></label>
                <select name="" class="select w-64 selectPlanoContasCartao" id="selectPlanoContasCartao" name="selectPlanoContasCartao">
                    <option value="">Selecione</option>
                    <!-- select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Beneficiário</label>
                <input type="" name="beneficiarioCartao" placeholder="Sr. José, Avó..." class="input beneficiarioCartao">
            </div>
            <div>
                <label for="" class="label">Tipo * <button
                        class=" text-black transition transform hover:-translate-y-1  duration-300" type="button"
                        data-drawer-target="drawer-tipo" data-drawer-show="drawer-tipo" data-drawer-placement="left"
                        aria-controls="drawer-tipo"><i class="fa-solid fa-question ml-2"></i></button></label>
                <select name="tipoCartao" id="tipoCartao" class="select tipoCartao">
                    <option value="">Selecione</option>
                    <!-- Select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Valor *</label>
                <input type="" name="valorCartao" id="valorCartao" placeholder="R$ 500,00" class="input valorCartao">
            </div>
            <div class=" mt-5">
                <button
                    class="btn-add-card relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
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

        <div class="grid-cols-2 flex gap-5">
            <div>
                <label for="" class="label">Cartão * </label>
                <select name="cartao" id="cartao" class="select cartao w-48 ">
                    <option value="">Selecione</option>
                    <option value="1">1</option>
                    <!-- Select dinamico no js -->
                </select>
            </div>
            <div>
                <label for="" class="label">Em quantas vezes? * </label>
                <select name="quantidade" id="quantidade" class="select quantidade w-32">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                </select>
            </div>

        </div>
    </div>



    <table class="table-auto w-full mt-5" id="tabelaCartoes">
        <thead class="border border-solid border-gray-300 bg-gray-50">
            <th class="px-6 py-3 text-center" scope="col">Data</th>
            <th class="px-6 py-3 text-center" scope="col">Categoria</th>
            <th class="px-6 py-3 text-center" scope="col">Plano de Contas</th>
            <th class="px-6 py-3 text-center" scope="col">Cartão de Crédito</th>
            <th class="px-6 py-3 text-center" scope="col">Parcelas</th>
            <th class="px-6 py-3 text-center" scope="col">Beneficiário</th>
            <th class="px-6 py-3 text-center" scope="col">Tipo</th>
            <th class="px-6 py-3 text-center" scope="col">Debito</th>
            <th class="px-6 py-3 text-center" scope="col">Crédito</th>
            </tr>
        </thead>
        <tbody>
            <!-- Linhas serão adicionadas aqui -->
        </tbody>
    </table>

</div>