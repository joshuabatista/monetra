<!-- drawer init and toggle -->
<div class="text-center">
    <button
        class="text-white  hover: focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark: dark:hover: focus:outline-none dark:focus:ring-blue-800"
        type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
        data-drawer-placement="right" aria-controls="drawer-right-example">
        <i class="fa-solid fa-bars text-3xl"></i>
    </button>
</div>

<!-- drawer component -->
<div id="drawer-right-example"
    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-right-label">
    <!-- <h5 id="drawer-right-label" class="inline-flex items-center text-center mb-4 text-base font-semibold">Menu inicial</h5> -->
    <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <div class="flex flex-col">
        <div class="saudacao flex-col text-center mt-2">
            <p class=" text-xl">Olá, <small id="nomeUsuInicio" class="text-xl font-bold"></small><small class="text-xl" id="saudacaoMensagem"></small></p>
        </div> 
        <hr class="mt-4">
        <div class="text-center">
            <div class="mt-4">
                <a href="perfil" class="text-lg font-normal mt-2">Meu Perfil</a>
            </div>
            <div class="mt-4 block lg:hidden">
                <a href="perfil" class="text-lg font-normal">Controle</a>
            </div>
            <div class="mt-4">
                <a href="alterar-senha" class="text-lg font-normal">Alterar Senha</a>
            </div>
            <hr class="mt-4">
            <div class="mt-4">
                <a href="logout" class="text-lg font-normal">Sair</a>
            </div>
        </div>

    </div>

    
</div>