$(() => {
    getInfoPendentes()
})


const getInfoPendentes = async () => {

    const url = 'get-pagar-receber'

    const response = await $.getJSON(url)

    renderPendentes(response)
    showBolinhaPendentes(response)
}

const renderPendentes = (response) => {

    const container = $('.containerPendentes')

    container.empty()

    let html = ''

    if(response.data.length <= 0) {
        $('.infoSemPendentes').removeClass('hidden')
    } else {
        $('.infoSemPendentes').addClass('hidden')
        response.data.forEach(item => {

            const botaoTexto = item.categoria === "Despesa" ? "Pagar" : "Receber"

            html += `
            <div class="flex items-center justify-between bg-white border border-gray-200 rounded-lg shadow-md p-4 containerPendentes" 
                data-id="${item.id}" data-categoria="${item.categoria}">

                <div class="flex flex-col flex-grow">
                    <h1 class="text-xl font-medium">${item.descricao}</h1>
                    <div class="mt-1 text-gray-500">
                        <small class="block italic text-sm font-medium">${item.data_formatada}</small>
                        <small class="block italic text-sm font-medium">R$ ${item.valor}</small>
                    </div>
                </div>

                <button class="btn-pagar-receber bg-gradient-to-br from-purple-600 to-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:opacity-80 transition-all">
                    ${botaoTexto}
                </button>

            </div>
            `
        })
    }

    container.html(html)


}

const showBolinhaPendentes = (response) => {

    if(response.data.length > 0) {
        $('.bolinhaPendentes').removeClass('hidden')
    } else {
        $('.bolinhaPendentes').addClass('hidden')
    }

}

const pagarReceber = ({target}) => {

    const elm = $(target).closest('.containerPendentes')

    const id = elm.data('id')

    const categoria = elm.data('categoria')

    const url = 'pagar-receber'

    const response = $.get(url, {id: id, categoria: categoria})

    if(response.status == false){

        return Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: response.message,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    } else {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            title: 'Sucesso!',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
        }).then(() => {
            getInfoPendentes()
            getMovimentation()
            getSaldos()
            getSaldosDoDia()
            getMovimentationMonth()
            getMinucioso()
        })
    }

}

$(document).ready(function () {
    const $drawer = $('#drawer-pagar-receber'); 
    const $body = $('body'); 

    function showDrawerPagar() {
        $drawer.removeClass('-translate-x-full').addClass('translate-x-0');
        $body.append('<div class="drawer-backdrop-pagar bg-gray-900/50 fixed inset-0 z-30"></div>');
    }

    function hideDrawerPagar() {
        $drawer.removeClass('translate-x-0').addClass('-translate-x-full');
        $('.drawer-backdrop-pagar').remove(); 
    }

    $('#drawer-trigger-pagar').on('click', function () {
        showDrawerPagar();
    });

    $('#drawer-hide-pagar').on('click', function () {
        hideDrawerPagar();
    });

    $(document).on('click', '.drawer-backdrop-pagar', function () {
        hideDrawerPagar();
    });
});

$(document).on('click', '.btn-pagar-receber', pagarReceber)