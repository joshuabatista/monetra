<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monetra | Sobre</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../../../../src/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="../../public_html/assets/images/monetra-only-logo.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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


<body class="">
    <div class="grid grid-cols-2 sm:grid-cols-3 p-0 sm:p-10">
        <div class="hidden sm:flex col-span-1 justify-center items-start mt-6">
            <img class=" rounded-xl animate-slide-in w-[30rem]"
                src="../../../../public_html/assets/images/monetra_margem.svg" alt="">
        </div>

        <div class="col-span-2 sm:col-span-2 flex-col flex items-start  justify-start p-4">
            <div class=" text-gray-800 animate-fade-in-right mt-2">
                <h1 class="text-3xl sm:text-3xl font-bold mb-4">Bem-vindo ao monetra</h1>
                <p class="mb-4 sm:text-xl">
                    O seu sistema web gratuito para uma gestão financeira pessoal, precisa e eficiente.
                </p>
                <h2 class="text-2xl font-semibold mb-3">O que é o monetra?</h2>
                <p class="mb-4 sm:text-xl">
                    O monetra nasceu da junção das palavras <strong>"Money"</strong> e <strong>"Metra"</strong>,
                    representando a medição precisa e a gestão eficiente do seu dinheiro. Este projeto é o meu primeiro
                    desenvolvimento solo, criado com dedicação e paixão para ajudar você a assumir o controle total das
                    suas finanças.
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
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/visao-geral-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/dashboard-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/minucioso-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/minucioso-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/visao-geral-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/pagar-receber-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                    <img src="../../../../public_html/assets/images/dashboard-desktop.png" alt="Imagem 1"
                        class="w-auto h-64 shadow-lg rounded-lg border">
                    <img src="../../../../public_html/assets/images/cartao-mobile.png" alt="Imagem 1"
                        class="w-auto h-64">
                </div>
            </div>
        </div>
    </div>

    <div id="projeto-web" class="hidden sm:flex flex-row justify-center items-center mt-[8rem]">
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

    <div id="projeto-mobile" class="grid grid-cols-2 sm:grid-cols-3 p-0 sm:p-10 mt-6">
        <div class="col-span-2 sm:col-span-2 flex-col flex items-start justify-start p-4 mt-8">
            <div class="bg-white rounded-lg p-0 sm:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">O Projeto</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    O <strong>monetra</strong> nasceu de um desejo antigo, desde quando iniciei minha jornada no
                    desenvolvimento de sistemas, em fevereiro de 2024.
                    Sempre tive vontade de criar algo voltado para finanças, pois acumulei <strong>8 anos de
                        experiência</strong> em contabilidade empresarial e pessoal.
                </p>
                <div class="mt-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-3">A Jornada do Desenvolvimento</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Esse projeto foi minha maneira de colocar em prática meus estudos em <strong>PHP, jQuery e
                            Tailwind CSS</strong>.
                        Cada linha de código escrita foi um teste de lógica, uma aplicação dos meus conhecimentos
                        contábeis e um passo rumo à evolução profissional.
                        O monetra não é apenas um sistema, mas minha <strong>base para aprendizado contínuo</strong>,
                        onde irei implementar e testar novas tecnologias e práticas de desenvolvimento.
                    </p>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700 leading-relaxed">
                        O monetra foi desenvolvido por mim, <strong>Joshua Batista</strong>, de forma solo. Mas não
                        posso deixar de mencionar amigos que, de alguma forma, contribuíram com ideias e me ajudaram com
                        boas práticas de desenvolvimento.
                        Sem eles, o caminho teria sido mais difícil:
                    </p>
                    <div class="flex flex-row justify-between text-center sm:justify-around mt-3 text-gray-700">
                        <p><strong>Jonathan Teixeira</strong></p>
                        <p><strong>Rodrigo "Miau"</strong></p>
                        <p><strong>Leonardo Campos</strong></p>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <p class="text-lg font-semibold text-gray-800" id="tutorial">O monetra é mais do que um sistema, é a
                        materialização de um sonho. 🚀</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:flex col-span-1 justify-center items-end mt-6">
            <img src="../../../../public_html/assets/images/logo-monetra-pb.svg" alt=""
                class=" rounded-xl animate-slide-in w-[30rem]">

        </div>

    </div>

    <h2 class="text-3xl sm:text-3xl font-bold text-center mt-[2rem] sm:mt-[10rem]">Tutorial</h2>
    <div class="flex mt-[1rem] justify-center">
        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="../../../../public_html/assets/images/tutorial-1-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-2-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-3-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-4-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-6-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-7-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-8-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-9-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-10-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-11-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-12-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-13-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../../../../public_html/assets/images/tutorial-14-canva.png"
                        class="absolute block w-[50rem] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
                    data-carousel-slide-to="6"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7"
                    data-carousel-slide-to="7"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8"
                    data-carousel-slide-to="8"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 9"
                    data-carousel-slide-to="9"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 10"
                    data-carousel-slide-to="10"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 11"
                    data-carousel-slide-to="11"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 12"
                    data-carousel-slide-to="12"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 13"
                    data-carousel-slide-to="13"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 14"
                    data-carousel-slide-to="14"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black dark:bg-gray-800/30 group-hover:bg-black dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black dark:bg-gray-800/30 group-hover:bg-black dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


    </div>

    <div class="flex justify-center items-center min-h-screen p-4" id="suporte">
        <form class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg" id="form-suporte">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">
                        Nome <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="nome" name="nome"
                        class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        E-mail <span class="text-red-600">*</span>
                    </label>
                    <input type="email" id="email" name="email"
                        class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="assunto" class="block text-sm font-medium text-gray-700">
                        Assunto <span class="text-red-600">*</span>
                    </label>
                    <select id="assunto" name="assunto"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Selecione</option>
                        <option value="bug">Bug</option>
                        <option value="duvida">Dúvida</option>
                        <option value="sugestao">Sugestão</option>
                        <option value="solicitacao">Solicitação</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
            </div>
            <div class="mt-6">
                <label for="message" class="block text-sm font-medium text-gray-700">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Escreva sua mensagem aqui..."></textarea>
            </div>
            <div class="mt-6 flex justify-end">
                <button class="btn-send-suporte px-6 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 transition duration-200 ">
                    Enviar
                </button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/src/modulos/publico/assets/js/publico-pagina-inicial.js"></script>

</body>

<footer class=" bg-slate-500 p-0">
        <h1>oi</h1>
</footer>

