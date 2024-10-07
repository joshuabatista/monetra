<?php

define('BASE_URL', '/monetra/public_html/');

?>

<!DOCTYPE html>
<html lang="pt-br" class="public">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Monetra</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/monetra-only-logo-royal.png"
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="<?php echo BASE_URL; ?>assets/images/monetra-logo-azul-royal.png" alt="">
            </div>
            <div class="back">
                <img src="<?php echo BASE_URL; ?>assets/images/monetra-logo-azul-royal.png" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="#">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Senha" required>
                            </div>
                            <div class="text"><a href="#">Esqueceu sua senha?</a></div>
                            <div class="button input-box">
                                <input type="submit" value="Entrar">
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>