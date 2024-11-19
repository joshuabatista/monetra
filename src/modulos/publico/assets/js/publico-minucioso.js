$(()=> {
    getPlano()
    // chartMinucioso()
    getMinucioso()
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
    let limite = $('#inputValor').val()

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

    response.controle_minucioso.forEach((item, index) => {
        const cardHtml = `
            <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 text-center">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">${item.descricao}</h3>
                <div id="chart-${index}" class="chart mx-auto flex justify-center"></div>
                <p class="text-sm text-gray-600">Limite: R$${item.limite.toFixed(2)}</p>
                <p class="text-sm text-gray-600">Gasto: R$${item.total_gasto.toFixed(2)} (${item.percentual_gasto.toFixed(1)}%)</p>
            </div>
        `;
        
        container.append(cardHtml);

        createChartForItem(index, item.percentual_gasto);
        $('#selectControle').val('')
        $('#inputValor').val('')
    })




};





const createChartForItem = (id, percentualGasto) => {

    $('.loadingMinucioso').removeClass('flex justify-center')
    $('.loadingMinucioso').addClass('hidden')

    if (charts[id]) {
        charts[id].destroy();
    }



    const options = {
        series: [percentualGasto, 100 - percentualGasto],
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




//Eventos

$(document).on('click', '.btn-add-minucioso', saveMinucioso)
$(document).on('change', '#filtroPeriodo', getMinucioso)