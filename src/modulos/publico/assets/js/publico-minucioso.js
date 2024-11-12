$(()=> {
    getPlano()
    // chartMinucioso()
    getMinucioso()
})


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
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
        },
    

})

}


const getMinucioso = async () => {

    const url = 'get-minucioso'
    
    const response = await $.getJSON(url)

    console.log(response);
    
}


const chartMinucioso = () => {

    var options = {
        series: [44, 55, 41, 17, 15],
        chart: {
            type: 'donut',
            width: 350,  // Defina a largura desejada
            height: 350  // Defina a altura desejada
        },
        plotOptions: {
            pie: {
                startAngle: -90,
                endAngle: 90,
                offsetY: 10
            }
        },
        grid: {
            padding: {
                bottom: -80
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250  // Ajuste de largura para telas menores
                },
                legend: {
                    position: 'top'
                }
            }
        }]
    };
    
    var chart = new ApexCharts(document.querySelector("#chartMinucioso"), options);
    chart.render();
}


//Eventos

$(document).on('click', '.btn-add-minucioso', saveMinucioso)