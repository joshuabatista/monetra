$(() => {
    getInfoPendentes()
})


const getInfoPendentes = async () => {

    const url = 'pagar-receber'

    const response = await $.getJSON(url)

    renderPendentes(response)
    showBolinhaPendentes(response)
}

const renderPendentes = (response) => {

    const container = $('.containerPendentes')

    container.empty()

    let html = ''

    if(response.data.length === 0) {
         html = `<p class="text-center text-gray-500 mt-5">Nenhum Pagamento / Recebimento a ser aprovado</p>`
    } else {
        response.data.forEach(item => {
            html += `
            <div class="grid grid-cols-3 bg-white border border-gray-200 rounded-lg shadow-md containerPendentes">
                <div class=" col-span-2">
                    <div class="m-2">
                        <h1 class=" text-2xl font-medium">${item.descricao}</h1>
                    </div>
                    <div class="flex flex-col m-2 gap-1">
                        <small class=" italic block text-sm font-medium text-gray-500">${item.data_formatada}</small>
                        <small class=" italic block text-sm font-medium text-gray-500">R$ ${item.valor}</small>
                    </div>
                </div>

                <div class="col-span-1 text-center mt-[30px]">
                    <button class="btn-pagar-receber relative inline-flex items-center justify-end p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Pagar 
                        </span>
                    </button>
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
    }

}