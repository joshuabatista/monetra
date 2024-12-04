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
                                <!-- <input type="button" id="submit" class="btn-logar" value="Entrar"> -->
                                <button type="button" id="" class=" text-lg w-full h-[3rem] justify-center btn-logar text-white bg-blue-700 hover:bg-blue-800 transition-colors duration-200 font-medium rounded-lg px-5 py-2.5 text-center me-2 inline-flex items-center">
                                    <svg aria-hidden="true" role="status" class=" w-4 h-4 me-3 text-white animate-spin loading-logar hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                    Entrar
                                </button>
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


    <?php require "../pages/modal/publico-modal-esqueceu-senha.php" ?>


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