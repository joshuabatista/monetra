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
            <div class="grid grid-cols-3 bg-white border border-gray-200 rounded-lg shadow-md containerPendentes" data-id="${item.id}" data-categoria="${item.categoria}">
                <div class=" col-span-2">
                    <div class="m-2">
                        <h1 class=" text-xl font-medium">${item.descricao}</h1>
                    </div>
                    <div class="flex flex-col m-2 gap-1">
                        <small class=" italic block text-sm font-medium text-gray-500">${item.data_formatada}</small>
                        <small class=" italic block text-sm font-medium text-gray-500">R$ ${item.valor}</small>
                    </div>
                </div>

                <div class="col-span-1 text-center justify-center content-center">
                    <div class="text-center justify-center content-center">
                        <button class="btn-pagar-receber relative inline-flex items-center justify-end p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                ${botaoTexto}
                            </span>
                        </button>
                    </div>
                </div>
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