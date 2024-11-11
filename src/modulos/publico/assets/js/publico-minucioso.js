$(()=> {
    getPlano()
    chartMinucioso()
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
        select.append(`<option value="${item.id}">${item.descricao}</option>`)
    })

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
                    position: 'bottom'
                }
            }
        }]
    };
    
    var chart = new ApexCharts(document.querySelector("#chartMinucioso"), options);
    chart.render();
}


