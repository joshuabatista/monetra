$(() => {
    getSaldos()
    getSaldosDoDia()
    chartsMovimentationMonth()
    getDay()
    // chartsMovimentationDay()
})

let chart

const getSaldos = async () => {
    
    const url = 'get-saldos';

    const response = await $.getJSON(url);
    
    renderSaldos(response.data);
}

const renderSaldos = (data) => {
    $('#saldoInicial').html(`<small><i class="fa-solid fa-money-bill-1 bg-slate-500 p-2 rounded-lg"></i></small> R$ ${data.saldo_inicial}`);
    $('#entradas').html(`<small><i class="fa-solid fa-arrow-trend-up bg-green-500 p-2 rounded-lg"></i></small> R$  ${data.entradas}`);
    $('#saidas').html(`<small><i class="fa-solid fa-arrow-trend-down bg-red-500 p-2 rounded-lg"></i></small> R$  ${data.saidas}`);
    $('#saldoFinal').html(`<small><i class="fa-solid fa-money-bill-transfer bg-slate-500 p-2 rounded-lg"></i></small> R$  ${data.saldo_final}`);
}


const getSaldosDoDia = async () => {

    const url = 'get-movimentacoes-dia'

    const dataInput = $('#dataInicio').val();

    const response = await $.getJSON(url, { dataInput: dataInput })

    chartsMovimentationDay(response)   
    
}


const chartsMovimentationDay = (response) => {

    if (chart) {
        chart.destroy();
    }

    const entradas = response.entradas.map(item => parseFloat(item.valor));
    const descricoesEntradas = response.entradas.map(item => item.descricao);

    const saidas = response.saidas.map(item => parseFloat(item.valor) * -1);
    const descricoesSaidas = response.saidas.map(item => item.descricao);

    let dataTransacao = response.entradas.length > 0 ? response.entradas[0].data : (response.saidas.length > 0 ? response.saidas[0].data : null);


    const dataFormatada = dataTransacao ? `${dataTransacao.slice(8, 10)}/${dataTransacao.slice(5, 7)}/${dataTransacao.slice(0, 4)}` : 'Data indisponível';


    var options = {
        series: [{
            name: 'Entradas',
            data: entradas, // Dados de entradas (valores)
        }, {
            name: 'Saídas',
            data: saidas, // Dados de saídas (valores)
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '100%',
                endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: false
        },
        yaxis: {
            title: {
                text: 'Valor (R$)',
            },
            labels: {
                formatter: function (y) {
                    return "R$ " + Math.abs(y).toFixed(2);
                }
            }
        },
        xaxis: {
            categories: [dataFormatada],
            labels: {
                rotate: -45
            },
            scrollable: true // Permite a rolagem horizontal se houver muitas movimentações
        },
        fill: {
            colors: ['#1E90FF', '#FF6347']
        },
        tooltip: {

            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                // Determina a descrição e o valor baseado na série e no índice do ponto
                const descricao = seriesIndex === 0 ? descricoesEntradas[dataPointIndex] : descricoesSaidas[dataPointIndex];
                const valor = series[seriesIndex][dataPointIndex];

                // Retorna o HTML do tooltip com descrição e valor formatado
                return `
                    <div style="padding: 10px; font-size: 14px;">
                        <strong>${descricao}</strong><br/>
                        Valor: R$ ${Math.abs(valor).toFixed(2)}
                    </div>`;
            }
        }
    };

    chart = new ApexCharts(document.querySelector("#chartDay"), options);
    chart.render();
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

// pega o dia de hoje

const getDay = () => {
    const today = new Date();
    const dia = String(today.getDate()).padStart(2, '0'); // Pega o dia e adiciona um zero à esquerda se necessário
    const mes = String(today.getMonth() + 1).padStart(2, '0'); // Pega o mês (0-11) e adiciona um zero à esquerda
    const ano = today.getFullYear(); // Pega o ano

    const dataHoje = `${ano}-${mes}-${dia}`; // Formata como YYYY-MM-DD
    $('#dataInicio').val(dataHoje); // Define o valor do input
}

//Eventos ouvintes

$(document).on('change', '#dataInicio', getSaldosDoDia)