$(() => {
    getSaldos()
    chartsMovimentationMonth()
    chartsMovimentationDay()
})

const getSaldos = () => {

    const url = '/src/modulos/publico/backend/publico-get-saldos.php'

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (response) {


            console.log(response);
            
        }
    })
}

const chartsMovimentationMonth = () => {
    // Definindo os dados para os 31 dias do mês
    const entradas = [100, 150, 200, 120, 90, 300, 80, 200, 150, 220, 130, 140, 90, 100, 210, 180, 120, 90, 150, 240, 300, 280, 230, 200, 190, 160, 140, 220, 250, 300, 280, 260, 290]; // Exemplo de dados de entradas
    const saidas = [80, 120, 150, 100, 70, 200, 60, 180, 130, 210, 100, 90, 80, 120, 160, 170, 110, 80, 120, 230, 250, 200, 190, 170, 160, 140, 120, 210, 240, 260, 230, 220, 200]; // Exemplo de dados de saídas

    var options = {
        series: [{
            name: 'Entradas', // Nome da série para entradas
            data: entradas // Dados de entradas
        }, {
            name: 'Saídas', // Nome da série para saídas
            data: saidas // Dados de saídas
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: Array.from({ length: 31 }, (_, i) => `${i + 1}`), // Dias de 1 a 31
        },
        yaxis: {
            title: {
                text: 'R$ (em reais)' // Título do eixo Y
            }
        },
        fill: {
            opacity: 1,
            colors: ['#008ffb', '#feb019'] // Azul para entradas e laranja para saídas
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "R$ " + val; // Formato do tooltip
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}

const chartsMovimentationDay = () => {
    // Definindo os dados para entradas e saídas em um único dia
    const entradas = [100]; // Exemplo de entrada
    const saidas = [-70]; // Exemplo de saída (número negativo para representar saídas)

    var options = {
        series: [{
            name: 'Entradas',
            data: entradas // Dados de entradas
        }, {
            name: 'Saídas',
            data: saidas // Dados de saídas
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                columnWidth: '30%',
                endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: false
        },
        yaxis: {
            title: {
                text: 'Valor (R$)', // Título do eixo Y
            },
            labels: {
                formatter: function (y) {
                    return "R$ " + Math.abs(y).toFixed(2); // Formato dos rótulos no eixo Y
                }
            }
        },
        xaxis: {
            categories: ['Dia 1'], // Nome da categoria representando um dia
        },
        fill: {
            colors: ['#1E90FF', '#FF6347'] // Azul para entradas e laranja para saídas
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "R$ " + Math.abs(val); // Formato do tooltip
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chartDay"), options);
    chart.render();
}
