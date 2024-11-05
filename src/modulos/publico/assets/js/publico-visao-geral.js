$(() => {
    getSaldos()
    getSaldosDoDia()
    getDay()
    getMonth()
    getMovimentationMonth()
})

let chart
let chartMonth

const getSaldos = async () => {

    $('.saldos').addClass('hidden')
    $('.animate-pulse').removeClass('hidden')

    let periodo = $('#data-inicio').val()

    const url = 'get-saldos';
    const response = await $.getJSON(url, {periodo: periodo});
    renderSaldos(response.data);
}

const renderSaldos = (data) => {
    
    const iconSaldoInicial = `<small><i class="fa-solid fa-money-bill-1 bg-slate-500 p-2 rounded-lg"></i></small>`;
    const iconEntradas = `<small><i class="fa-solid fa-arrow-trend-up bg-green-500 p-2 rounded-lg"></i></small>`;
    const iconSaidas = `<small><i class="fa-solid fa-arrow-trend-down bg-red-500 p-2 rounded-lg"></i></small>`;
    const iconSaldoFinal = `<small><i class="fa-solid fa-money-bill-transfer bg-slate-500 p-2 rounded-lg"></i></small>`;

    animateCount('#saldoInicial', 0, parseCurrency(data.saldo_inicial), 1000, iconSaldoInicial);
    animateCount('#entradas', 0, parseCurrency(data.entradas), 1000, iconEntradas);
    animateCount('#saidas', 0, parseCurrency(data.saidas), 1000, iconSaidas);
    animateCount('#saldoFinal', 0, parseCurrency(data.saldo_final), 1000, iconSaldoFinal);

    $('.saldos').removeClass('hidden')
    $('.animate-pulse').addClass('hidden')

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
            data: entradas, 
        }, {
            name: 'Saídas',
            data: saidas, 
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
                columnWidth: '50%',
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
            scrollable: true 
        },
        fill: {
            colors: ['#1E90FF', '#FF6347']
        },
        tooltip: {

            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                
                const descricao = seriesIndex === 0 ? descricoesEntradas[dataPointIndex] : descricoesSaidas[dataPointIndex];
                const valor = series[seriesIndex][dataPointIndex];

                
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

const getMovimentationMonth = async () => {

    let periodo = $('#data-inicio').val()

    const url = 'get-movimentation-month';

    const response = await $.getJSON(url, {periodo: periodo});

    chartsMovimentationMonth(response)

}

const chartsMovimentationMonth = (response) => {

    if (chartMonth) {
        chartMonth.destroy();
    }

    $('#chart').removeClass('hidden')
    
    const entradas = Array(31).fill(0);
    const saidas = Array(31).fill(0);

    
    response.somaEntradasPorDia.forEach(entry => {
        if (entry.dia >= 1 && entry.dia <= 31) {
            
            entradas[entry.dia - 1] += parseFloat(entry.somaEntrada.replace('.', '').replace(',', '.'));
        }
    });

    
    response.somaSaidasPorDia.forEach(exit => {
        if (exit.dia >= 1 && exit.dia <= 31) {
            
            saidas[exit.dia - 1] += parseFloat(exit.somaSaida.replace('.', '').replace(',', '.'));
        }
    });

    const formatarValor = (valor) => {
        return `R$ ${valor.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    };

    var options = {
        series: [{
            name: 'Entradas',
            data: entradas 
        }, {
            name: 'Saídas',
            data: saidas 
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
                text: 'R$ (em reais)'
            }
        },
        fill: {
            opacity: 1,
            colors: ['#008ffb', '#FF6347'] 
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return formatarValor(val); 
                }
            }
        }
    };

    chartMonth = new ApexCharts(document.querySelector("#chart"), options);
    chartMonth.render();
}






// pega o dia de hoje
const getDay = () => {
    const today = new Date();
    const dia = String(today.getDate()).padStart(2, '0');
    const mes = String(today.getMonth() + 1).padStart(2, '0'); 
    const ano = today.getFullYear(); 
    const dataHoje = `${ano}-${mes}-${dia}`; 
    $('#dataInicio').val(dataHoje); 
}

//pega o mes atual
const getMonth = () => {

    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); 

    $('#data-inicio').val(`${year}-${month}`);
}

// Função para converter string de moeda brasileira para número
const parseCurrency = (value) => {
    return parseFloat(value.replace(/\./g, '').replace(',', '.'));
}

const animateCount = (selector, start, end, duration, iconHTML) => {
    let current = start;

    const increment = (end - start) / (duration / 10); 

    const interval = setInterval(() => {
        current += increment;
        if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
            clearInterval(interval);
            current = end;
        }
        $(selector).html(`${iconHTML} R$ ${current.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`);
    }, 10);
};


//Eventos ouvintes

$(document).on('change', '#dataInicio', getSaldosDoDia)
$(document).on('change', '#data-inicio', getMovimentationMonth)
$(document).on('change', '#data-inicio', getSaldos)