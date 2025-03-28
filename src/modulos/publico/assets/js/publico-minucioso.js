
$(()=> {
    getPlano()
    getMinucioso()
    $('#inputValor').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true})
})

let charts = {};


const getPlano = async () => {

    const url = 'get-plano-minucioso'

    const response = await $.getJSON(url)

    renderSelect(response.data)

}

const renderSelect = (data) => {

    let select = $('#selectControle')

    select.empty()

    select.append('<option value="">Selecione</option>')

    data.forEach(item=>{
        select.append(`<option value="${item.codigo}">${item.descricao}</option>`)
    })

}

const saveMinucioso = () => {

    let planoContas = $('#selectControle').val()
    let limite = stripMoney($('#inputValor').val())

    if(planoContas === '' || limite === '') {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Por favor, preencha todos os campos obrigatórios',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        return
    } 
    
    $.ajax({
        url: 'save-minucioso',
        method: 'POST',
        data: {
            planoContas: planoContas,
            limite: limite
        },
        success: function(response) {

            if(response.status === false) {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Opss',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                return
            } else{
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Sucesso!',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                }).then(() => {
                    getMinucioso()
                })
            }
        },
    

})

}


const getMinucioso = async () => {

    $('.infoSemMov').addClass('hidden')
    $('#minuciosoContainer').empty()
    $('.loadingMinucioso').removeClass('hidden')
    $('.loadingMinucioso').addClass('flex justify-center')

    let filtro = $('#filtroPeriodo').val()

    const url = 'get-minucioso';

    const response = await $.getJSON(url, {filtro: filtro});

    showBolinhaMinucioso(response)

    const container = $('#minuciosoContainer');

    container.empty();

    if (response.controle_minucioso.length === 0) {

        $('.infoSemMov').removeClass('hidden')
        
        $('.loadingMinucioso').removeClass('flex justify-center').addClass('hidden');
        return; 
    }

    console.log(response);
    

    response.controle_minucioso.forEach((item, index) => {
        const cardHtml = `
            <div class="container-minucioso-renderize bg-white border border-gray-200 rounded-lg shadow-md p-4 text-center" data-id=${item.id}>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">${item.descricao}</h3>
                <div id="chart-${index}" class="chart mx-auto flex justify-center"></div>
                <p class="text-sm text-gray-600">Limite: R$${item.limite.toFixed(2)}</p>
                <p class="text-sm text-gray-600">Gasto: R$${item.total_gasto.toFixed(2)} (${item.percentual_gasto.toFixed(1)}%)</p>
                <div class="flex items-center justify-center text-center mt-2">
                    <div class="p-2 bg-red-200 rounded-lg w-10 text-center justify-center items-center">
                        <button class="btn-delete-minucioso"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </div>
        `;
        
        container.append(cardHtml);

        createChartForItem(index, item.percentual_gasto);
        $('#selectControle').val('')
        $('#inputValor').val('')
    })




};

const deleteMinucioso = async ({target}) => {

    const elm = $(target).closest('.container-minucioso-renderize')

    const id = elm.data('id');

    const url = 'delete-minucioso'

    const response = await $.getJSON(url, {id: id});

    if(!response){
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss',
            text: response.message,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }else {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            showConfirmButton: false,
            timer: 1000,
            text: response.message,
            timerProgressBar: true,
        }).then(() => {
            getMinucioso()
        })
    }


}



const createChartForItem = (id, percentualGasto) => {

    $('.loadingMinucioso').removeClass('flex justify-center')
    $('.loadingMinucioso').addClass('hidden')

    if (charts[id]) {
        charts[id].destroy();
    }

    const restante = parseFloat((100 - percentualGasto).toFixed(1));
    percentualGasto = parseFloat(percentualGasto.toFixed(1));

    const options = {
        series: [percentualGasto, restante],
        chart: {
            type: 'donut',
            width: 200,
            height: 200
        },
        plotOptions: {
            pie: {
                startAngle: -90,
                endAngle: 90,
                offsetY: 10,
                donut: {
                    size: '75%',
                }
            }
        },
        labels: ['Gasto (%)', 'Restante (%)'],
        colors: ['#fd7861', '#E0E0E0'],
        legend: {
            show: false
        }
    };
    
    charts[id] = new ApexCharts(document.querySelector(`#chart-${id}`), options);
    charts[id].render();
};


const showBolinhaMinucioso = (response) => {

    if(response.controle_minucioso.length > 0) {
        $('.bolinhaMinucioso').removeClass('hidden')
    }

}


$(document).ready(function () {
    const $drawer = $('#drawer-minucioso'); 
    const $body = $('body'); 

    function showDrawer() {
        $drawer.removeClass('-translate-x-full').addClass('translate-x-0');
        $body.append('<div class="drawer-backdrop-minucioso bg-gray-900/50 fixed inset-0 z-30"></div>');
    }

    function hideDrawer() {
        $drawer.removeClass('translate-x-0').addClass('-translate-x-full');
        $('.drawer-backdrop-minucioso').remove(); 
    }

    $('#drawer-trigger').on('click', function () {
        showDrawer();
    });

    $('#drawer-hide').on('click', function () {
        hideDrawer();
    });

    $(document).on('click', '.drawer-backdrop-minucioso', function () {
        hideDrawer();
    });
});


const showFiltersMinucioso = () => {

    $('.filtro-data').removeClass('hidden')
    $('.btn-show-mes').addClass('hidden')
    $('.btn-hide-mes').removeClass('hidden')

}

const hideFiltersMinucioso = () => {

    $('.filtro-data').addClass('hidden')
    $('.btn-show-mes').removeClass('hidden')
    $('.btn-hide-mes').addClass('hidden')

}



//Eventos

$(document).on('click', '.btn-add-minucioso', saveMinucioso)
$(document).on('change', '#filtroPeriodo', getMinucioso)
$(document).on('click', '.btn-show-mes', showFiltersMinucioso)
$(document).on('click', '.btn-hide-mes', hideFiltersMinucioso)
$(document).on('click', '.btn-delete-minucioso', deleteMinucioso)