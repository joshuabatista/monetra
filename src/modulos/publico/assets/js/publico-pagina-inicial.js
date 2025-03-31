
$(()=>{
    renderCarrossel()
})

const renderCarrossel = () => {
    let currentIndex = 0;
    const items = $('[data-carousel-item]');
    const totalItems = items.length;
    const intervalTime = 50000;
    let interval;

    function showSlide(index) {
        items.removeClass('block').addClass('hidden');
        items.eq(index).removeClass('hidden').addClass('block');
        $('[data-carousel-slide-to]').attr('aria-current', 'false');
        $('[data-carousel-slide-to]').eq(index).attr('aria-current', 'true');
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        showSlide(currentIndex);
    }

    function startAutoSlide() {
        interval = setInterval(nextSlide, intervalTime);
    }

    function stopAutoSlide() {
        clearInterval(interval);
    }

    $('[data-carousel-next]').click(function () {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    $('[data-carousel-prev]').click(function () {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });

    $('[data-carousel-slide-to]').click(function () {
        stopAutoSlide();
        currentIndex = $(this).index();
        showSlide(currentIndex);
        startAutoSlide();
    });

    showSlide(currentIndex);
    startAutoSlide();
} 



const sendSuporte = (event) => {
    
    event.preventDefault()

    const nome = $('#nome').val()
    const email = $('#email').val()
    const assunto = $('#assunto').val()
    const mensagem = $('#mensagem').val()

    if(nome == '' || email == '' || assunto == '' || mensagem == ''){
        return Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Preencha os campos corretamente',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }

    $('.btn-send-suporte').html(`
        <span class="" role="status" aria-hidden="true"></span>
        <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        Enviando
        `).prop('disabled', true).removeClass('bg-indigo-600 hover:bg-indigo-700 transition duration-200').addClass('bg-slate-500 hover:bg-slate-600 transition duration-200 flex text-center gap-2 items-center ')

    const form = $('#form-suporte')[0]

    const data = new FormData(form)

    const url = 'send-suporte'

    $.ajax({
    url: url,
    type: 'POST',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data: data,
    dataType: 'json',
    success: async function(response) {
        if(!response.status){
            return Swal.fire({
                position: 'top-end',
                toast: true,
                icon: 'error', 
                title: 'Ops...',
                html: response.message,
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true, 
            }).then(()=>{
                $('.btn-send-suporte').html(`
                    <span class="" role="status" aria-hidden="true"></span>
                    Enviar
                    `).prop('disabled', false).removeClass('bg-slate-500 hover:bg-slate-600 transition duration-200 flex text-center gap-2 items-center').addClass('bg-indigo-600 hover:bg-indigo-700 transition duration-200')
            })
        }
        await Swal.fire({
                position: 'top-end',
                toast: true,
                icon: 'success', 
                title: 'Sucesso',
                html: response.message,
                timer: 8000,
                showConfirmButton: false,
                timerProgressBar: true, 
            }).then(()=>{
                $('.btn-send-suporte').html(`
                    <span class="" role="status" aria-hidden="true"></span>
                    Enviar
                    `).prop('disabled', false).removeClass('bg-slate-500 hover:bg-slate-600 transition duration-200 flex text-center gap-2 items-center').addClass('bg-indigo-600 hover:bg-indigo-700 transition duration-200')
            })
    }
})
}


$(document).on('click', '.btn-send-suporte', sendSuporte)


$(document).ready(function () {
    $("#btn-projeto").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#projeto-web").offset().top
        }, 800); // 800ms para um efeito suave
    });
});

$(document).ready(function () {
    $(".btn-projeto-mobile").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#projeto-mobile").offset().top
        }, 800); // 800ms para um efeito suave
    });
});

$(document).ready(function () {
    $(".btn-tutorial").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#tutorial").offset().top
        }, 800); // 800ms para um efeito suave
    });
});

$(document).ready(function () {
    $(".btn-suporte").on("click", function () {
        $("html, body").animate({
            scrollTop: $("#suporte").offset().top
        }, 800); // 800ms para um efeito suave
    });
});
