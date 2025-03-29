
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

    if($('#nome').val() == '' || $('#email').val() == '' || $('#assunto').val() == '' || $('#mensagem').val() == ''){
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

    // $('.btn-send-nr').html(`
    //     <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    //     Enviando Nota de Reserva...
    //     `).prop('disabled', true).removeClass('btn-success').addClass('btn-outline-success')

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
                icon: 'error', 
                title: 'Ops...',
                text: response.message,
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true, 
            })
        }
        await Swal.fire({
                icon: 'success', 
                title: 'Sucesso',
                text: response.message,
                timer: 1500,
                showConfirmButton: false,
                timerProgressBar: true, 
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
