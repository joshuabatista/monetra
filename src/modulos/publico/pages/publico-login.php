<!DOCTYPE html>
<html lang="pt-br"


<?php

 $title = "Monetra | Login";

 require '../../../includes/head.php'; 
 require "../../../../app/functions.php";

?>

<link href="/src/modulos/publico/assets/css/main.css" rel="stylesheet">


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
                                <input type="text" placeholder="Email" id="email" name="email" >
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Senha" id="password" name="password" >
                            </div>
                            <div class="text"><a href="#">Esqueceu sua senha?</a></div>
                            <div class="button input-box">
                                <input type="button" id="submit" class="btn-logar" value="Entrar">
                            </div>
                            <div class="text sign-up-text">Não possui conta ainda? <label for="flip">Garanta seu acesso!</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title"></div>
                    <form action="#">
                        <div class="input-boxes">
                            <div class="text sign-up-text">Já possui conta? <label for="flip">Acesse agora!</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="/src/modulos/publico/assets/js/publico-login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.all.min.js"></script>
    

</body>

</html>

