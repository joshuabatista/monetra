
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
  animation: scroll 15s linear infinite;
}
</style>

<?php
    include "../../../includes/header-landing-page.php"
?>


<body class=" p-4">
    <div class="grid grid-cols-2 sm:grid-cols-3 p-0 sm:p-10">
        <div class="hidden sm:flex col-span-1 justify-center items-start mt-6">
            <img class=" rounded-xl animate-slide-in w-[30rem]" src="../../../../public_html/assets/images/monetra_margem.svg" alt="">
        </div>

        <div class="col-span-2 sm:col-span-2 flex-col flex items-start  justify-start p-4">
            <div class=" text-gray-800 animate-fade-in-right mt-2">
                <h1 class="text-3xl sm:text-3xl font-bold mb-4">Bem-vindo ao monetra</h1>
                <p class="mb-4 sm:text-xl">
                    O seu sistema web gratuito para uma gestão financeira pessoal precisa e eficiente.
                </p>
                <h2 class="text-2xl font-semibold mb-3">O que é o monetra?</h2>
                <p class="mb-4 sm:text-xl">
                    O monetra nasceu da junção das palavras <strong>"Money"</strong> e <strong>"Metra"</strong>, representando a medição precisa e a gestão eficiente do seu dinheiro. Este projeto é o meu primeiro desenvolvimento solo, criado com dedicação e paixão para ajudar você a assumir o controle total das suas finanças.
                </p>
                <ul class="list-disc mb-4 sm:text-xl">
                    <div class="block sm:grid grid-cols-1 sm:grid-cols-2">
                        <div>
                            <p class="mt-1 sm:mt-0">Gestão completa das suas finanças pessoais</p>
                            <p class="mt-1 sm:mt-0">Ferramentas de controle de gastos e receitas</p>
                        </div>
                        <div>
                            <p class="mt-1 sm:mt-0">Visualização intuitiva de relatórios</p>
                            <p class="mt-1 sm:mt-0">100% gratuito e online</p>
                        </div>
                    </div>
                </ul>
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

    <div id="projeto" class="hidden sm:flex flex-row justify-center items-center mt-[8rem]">
        <div>
            <img src="../../../../public_html/assets/images/draw-entrada.svg" class="w-[20rem]">
        </div>
        <div>
            <img src="../../../../public_html/assets/images/monetra-laptop.png" class=" w-[30rem] mt-2">
        </div>
        <div>
            <img src="../../../../public_html/assets/images/draw-saida.svg" class="w-[20rem]">
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 p-0 sm:p-10 mt-6">
        <div class="col-span-2 sm:col-span-2 flex-col flex items-start justify-start p-4 shadow-sm mt-8">
            <div class="bg-white rounded-lg p-0 sm:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">O Projeto</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    O <strong>monetra</strong> nasceu de um desejo antigo, desde quando iniciei minha jornada no desenvolvimento de sistemas, em fevereiro de 2024. 
                    Sempre tive vontade de criar algo voltado para finanças, pois acumulei <strong>8 anos de experiência</strong> em contabilidade empresarial e pessoal.
                </p>
                <div class="mt-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-3">A Jornada do Desenvolvimento</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Esse projeto foi minha maneira de colocar em prática meus estudos em <strong>PHP, jQuery e Tailwind CSS</strong>. 
                        Cada linha de código escrita foi um teste de lógica, uma aplicação dos meus conhecimentos contábeis e um passo rumo à evolução profissional.
                        O monetra não é apenas um sistema, mas minha <strong>base para aprendizado contínuo</strong>, onde irei implementar e testar novas tecnologias e práticas de desenvolvimento.
                    </p>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700 leading-relaxed">
                        O monetra foi desenvolvido por mim, <strong>Joshua Batista</strong>, de forma solo. Mas não posso deixar de mencionar amigos que, de alguma forma, contribuíram com ideias e me ajudaram com boas práticas de desenvolvimento. 
                        Sem eles, o caminho teria sido mais difícil:
                    </p>
                    <div class="flex flex-row justify-around mt-3 text-gray-700">
                        <p><strong>Jonathan Teixeira</strong></p>
                        <p><strong>Rodrigo "Miau"</strong></p>
                        <p><strong>Leonardo Campos</strong></p>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <p class="text-lg font-semibold text-gray-800">O monetra é mais do que um sistema, é a materialização de um sonho. 🚀</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:flex col-span-1 justify-center items-end mt-6">
            <img src="../../../../public_html/assets/images/logo-monetra-pb.svg" alt="" class=" rounded-xl animate-slide-in w-[30rem]">

        </div>

    </div>
    
    <script>
        $(document).ready(function () {
    $("#btn-projeto").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#projeto").offset().top
        }, 800); // 800ms para um efeito suave
    });
});
    </script>
    
</body>