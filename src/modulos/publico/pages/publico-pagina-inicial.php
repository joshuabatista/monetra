
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monetra | Sobre</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../../../../src/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="../../public_html/assets/images/monetra-only-logo.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')</style> -->
</head>

<style>
    body {
      font-family: 'Poppins', sans-serif;
    }
        @keyframes slideIn {
            from {
                transform: translateX(-200px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.8s ease-out forwards;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-right {
            animation: fadeInRight 1s ease-out forwards;
        }

        @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            /* Como duplicamos as imagens, movemos 50% da largura total para fechar o loop */
            transform: translateX(-50%);
        }
}

.animate-scroll {
  animation: scroll 5s linear infinite;
}
</style>

<?php
    include "../../../includes/header-landing-page.php"
?>


<body class=" p-4">
    <div class="grid grid-cols-2 sm:grid-cols-3">
        <div class="hidden sm:flex col-span-1 justify-center mt-6">
            <img class="  rounded-lg animate-slide-in" src="../../../../public_html/assets/images/monetra_margem.svg" alt="">
        </div>

        <div class="col-span-2 sm:col-span-2 flex-col flex items-start  justify-start p-4">
            <div class=" text-gray-800 animate-fade-in-right mt-2">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4">Bem-vindo ao monetra</h1>
                <p class="mb-4 text-xl sm:text-2xl">
                    O seu sistema web gratuito para uma gestão financeira pessoal precisa e eficiente.
                </p>
                <h2 class="text-3xl font-semibold mb-3">O que é o monetra?</h2>
                <p class="mb-4 text-sl sm:text-2xl">
                    O monetra nasceu da junção das palavras <strong>"Money"</strong> e <strong>"Metra"</strong>, representando a medição precisa e a gestão eficiente do seu dinheiro. Este projeto é o meu primeiro desenvolvimento solo, criado com dedicação e paixão para ajudar você a assumir o controle total das suas finanças.
                </p>
                <h3 class="text-3xl font-semibold mb-2">Por que usar o monetra?</h3>
                <ul class="list-disc ml-5 mb-4 text-xl sm:text-2xl">
                <p>Gestão completa das suas finanças pessoais</p>
                <p>Ferramentas de controle de gastos e receitas</p>
                <p>Visualização intuitiva de relatórios</p>
                <p>100% gratuito e online</p>
                </ul>

                <p class=" text-xl sm:text-2xl">
                Experimente e sinta a diferença no seu bolso!
                </p>
            </div>

            <div class="overflow-hidden relative w-full">
                <div class="flex animate-scroll gap-2 mt-4">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1" class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1" class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1" class="w-auto h-64">
                </div>
            </div>
        </div>
    </div>
    
</body>