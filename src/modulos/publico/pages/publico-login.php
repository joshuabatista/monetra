<!DOCTYPE html>
<html lang="pt-br" <?php

 $title = "Monetra | Login";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";



?> <link href="/src/modulos/publico/assets/css/main.css" rel="stylesheet">


<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="../../../../public_html/assets/images/monetra-logo-azul-royal.png" alt="">
            </div>
            <div class="back">
                <img src="../../../../public_html/assets/images/monetra-logo-azul-royal.png" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="#" id="form-login">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Email" id="email" name="email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Senha" id="password">
                            </div>
                            <div class="text cursor-pointer" data-modal-target="modal-esqueceu-senha" data-modal-toggle="modal-esqueceu-senha">Esqueceu sua senha?</div>
                            <div class="button input-box">
                                <input type="button" id="submit" class="btn-logar" value="Entrar">
                            </div>
                            <div class="text sign-up-text">Não possui conta ainda? <label for="flip">Garanta seu
                                    acesso!</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Cadastrar-se</div>
                    <form action="#" id="form-cadastrar">
                        <div class="input-boxes">
                            <div class="input-box"> <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Email" id="email-criar" name="email-criar">
                            </div>
                            <div class="input-box"><i class="fas fa-lock"></i>
                                <input type="password" placeholder="Senha" id="password-criar" name="password-criar">
                            </div>
                            <div class="input-box"><i class="fas fa-lock"></i>
                                <input type="password" placeholder="Confirme sua senha" id="password-criar-confirmar"
                                    name="password-criar-confirmar">
                            </div>
                            <div class="input-box"> <i class="fa-solid fa-user"></i>
                                <input type="text" placeholder="Nome" id="nome" name="nome">
                            </div>
                            <div class="input-box"> <i class="fa-solid fa-user"></i>
                                <input type="text" placeholder="Sobrenome" id="sobrenome" name="sobrenome">
                            </div>
                            <div class="button input-box">
                                <input type="button" id="btn-cadastrar" class="btn-cadastrar" value="Cadastrar">
                            </div>


                            <div class="text sign-up-text">Já possui conta? <label for="flip">Acesse agora!</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <!-- Main modal -->
    <div id="modal-esqueceu-senha" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Esqueci minha senha
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-esqueceu-senha">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class=" flex flex-col justify-center">
                        <label class="label">Informe seu email cadastrado</label>
                        <input type="" id="email-recuperar" name="email-recuperar" class="input mt-2">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="modal-esqueceu-senha" type="button"
                        class=" btn-esqueceu-senha text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                    <button data-modal-hide="modal-esqueceu-senha" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                </div>
            </div>
        </div>
    </div>





    <?php require"../../../includes/footer.php"?>
    <script src="/src/modulos/publico/assets/js/publico-login.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-cadastrar.js"></script>
    <script src="/src/modulos/publico/assets/js/publico-esqueceu-senha.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.all.min.js"></script>


</body>

</html>