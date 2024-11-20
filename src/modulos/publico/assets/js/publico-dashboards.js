$(() => {
  
  getPorcentagem()
  getSaldosEntradasSaidas()
  getSaldoInicialAno()
  getSaldoFinalAno()
  getEntradasAno()
  getSaidasAno()
  chartsEntradasSaidas()
  chartsSaldoFinalMensal()
  getSaldosMensal()
  renderChartDonuts()

})

Apex.dataLabels = {enabled: false}

const getSaldoInicialAno = () => {
  const url = 'get-saldos-ano';

  $.getJSON(url, (response) => {
    
    const saldoInicial = response.data.saldo_inicial;

    var spark1 = {
      chart: {
        id: 'sparkline1',
        group: 'sparklines',
        type: 'area',
        height: 160,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'straight'
      },
      fill: {
        opacity: 1,
      },
      series: [{
        name: 'Saldo inicial',
        // data: [saldoInicialValor], // Passa o saldo inicial como dado
      }],
      labels: ['Inicio'], // Apenas um rótulo, não é necessário usar datas
      yaxis: {
        min: 0
      },
      xaxis: {
        categories: ['Inicio'], // Pode usar uma categoria simples
      },
      colors: ['#DCE6EC'],
      title: {
        text: `R$${saldoInicial}`,
        offsetX: 30,
        style: {
          fontSize: '24px',
          cssClass: 'apexcharts-yaxis-title'
        }
      },
      subtitle: {
        text: 'Saldo inicial',
        offsetX: 30,
        style: {
          fontSize: '14px',
          cssClass: 'apexcharts-yaxis-title'
        }
      }
    };

    new ApexCharts(document.querySelector("#spark1"), spark1).render();
  })
};

const getEntradasAno = () => {
  const url = 'get-saldos-ano';

  $.getJSON(url, (response) => {
    const entradas = response.data.entradas;
    
    const entradasMensal = Array(12).fill(0);
    response.data.entradas_mensal.forEach(item => {
      entradasMensal[item.mes - 1] = parseFloat(item.total_entradas);
    });
    // Configuração do gráfico de entradas
    var spark2 = {
      chart: {
        id: 'sparkline2',
        group: 'sparklines',
        type: 'area',
        height: 160,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'straight'
      },
      fill: {
        opacity: 1,
      },
      series: [{
        name: 'Entradas',
        data: entradasMensal
      }],
      labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      yaxis: {
        min: 0
      },
      xaxis: {
        categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      },
      colors: ['#008FFB'],
      title: {
        text: `R$${entradas}`,
        offsetX: 30,
        style: {
          fontSize: '24px',
          cssClass: 'apexcharts-yaxis-title'
        }
      },
      subtitle: {
        text: 'Entradas',
        offsetX: 30,
        style: {
          fontSize: '14px',
          cssClass: 'apexcharts-yaxis-title'
        }
      }
    };

    new ApexCharts(document.querySelector("#spark2"), spark2).render();
  });
}

const getSaidasAno = () => {
  const url = 'get-saldos-ano';

  $.getJSON(url, (response) => {
    const saidas = response.data.saidas;

    const saidasMensal = Array(12).fill(0);
    response.data.saidas_mensal.forEach(item => {
      saidasMensal[item.mes - 1] = parseFloat(item.total_saidas);
    });
    // Configuração do gráfico de saídas
    var spark3 = {
      chart: {
        id: 'sparkline3',
        group: 'sparklines',
        type: 'area',
        height: 160,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'straight'
      },
      fill: {
        opacity: 1,
      },
      series: [{
        name: 'Saídas',
        data: saidasMensal
      }],
      labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      yaxis: {
        min: 0
      },
      xaxis: {
        categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      },
      colors: ['#FF4560'],
      title: {
        text: `R$${saidas}`,
        offsetX: 30,
        style: {
          fontSize: '24px',
          cssClass: 'apexcharts-yaxis-title'
        }
      },
      subtitle: {
        text: 'Saídas',
        offsetX: 30,
        style: {
          fontSize: '14px',
          cssClass: 'apexcharts-yaxis-title'
        }
      }
    };

    new ApexCharts(document.querySelector("#spark3"), spark3).render();
  });
}

const getSaldoFinalAno = () => {

  const url = 'get-saldos-ano';

  $.getJSON(url, (response) =>  {

    const saldoFinal = response.data.saldo_final;

    var spark4 = {
      chart: {
        id: 'sparkline4',
        group: 'sparklines',
        type: 'area',
        height: 160,
        sparkline: {
          enabled: true
        },
      },
      stroke: {
        curve: 'straight'
      },
      fill: {
        opacity: 1,
      },
      series: [{
        name: 'Saldo final'
      }],
      labels: ['Fim'],
      yaxis: {
        min: 0
      },
      xaxis: {
        categories: ['Inicio'],
      },
      yaxis: {
        min: 0
      },
      colors: ['#008FFB'],
      //colors: ['#5564BE'],
      title: {
        text: `R$${saldoFinal}`,
        offsetX: 30,
        style: {
          fontSize: '24px',
          cssClass: 'apexcharts-yaxis-title'
        }
      },
      subtitle: {
        text: 'Saldo final',
        offsetX: 30,
        style: {
          fontSize: '14px',
          cssClass: 'apexcharts-yaxis-title'
        }
      }
    }

    new ApexCharts(document.querySelector("#spark4"), spark4).render();

    
  })

}

const getSaldosEntradasSaidas = async () => {

  const url = 'get-saldos-ano';

  const response = await $.getJSON(url);

  const entradasMensal = response.data.entradas_mensal.map(item => ({
    x: new Date(new Date().getFullYear(), item.mes - 1, 1),  
    y: parseFloat(item.total_entradas)
  }));

  const saidasMensal = response.data.saidas_mensal.map(item => ({
    x: new Date(new Date().getFullYear(), item.mes - 1, 1),
    y: parseFloat(item.total_saidas)
  }));

  chartsEntradasSaidas(entradasMensal, saidasMensal);

};

const chartsEntradasSaidas = (entradasMensal, saidasMensal) => {
  var options = {
    series: [
      {
        name: 'Entradas Mensais',
        data: entradasMensal
      },
      {
        name: 'Saídas Mensais',
        data: saidasMensal
      }
    ],
    chart: {
      type: 'area',
      height: 350,
      stacked: true,
    },
    colors: ['#008FFB', '#FF4560'], 
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    fill: {
      type: 'gradient',
      gradient: {
        opacityFrom: 0.6,
        opacityTo: 0.8,
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left'
    },
    xaxis: {
      type: 'datetime',
      labels: {
        format: 'MMM'  
      }
    },
    yaxis: {
      title: {
        text: 'Valores (R$)'
      },
      labels: {
        formatter: function (value) {
          return `R$${value.toFixed(2)}`;
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chartsEntradasSaidas"), options);
  chart.render();
};

const getSaldosMensal = async () => {
  const url = 'get-saldos-ano';
  
  const response = await $.getJSON(url);

  let saldoFinalMensal = Array(12).fill(0);  

  response.data.entradas_mensal.forEach(item => {

    const mes = item.mes - 1;  

    saldoFinalMensal[mes] += parseFloat(item.total_entradas);

  });

  response.data.saidas_mensal.forEach(item => {

    const mes = item.mes - 1;

    saldoFinalMensal[mes] -= parseFloat(item.total_saidas);

  });

  let saldoAcumulado = parseFloat(response.data.saldo_inicial.replace(",", "."));

  saldoFinalMensal = saldoFinalMensal.map(saldoMensal => {

    saldoAcumulado += saldoMensal;

    return saldoAcumulado;

  });

  chartsSaldoFinalMensal(saldoFinalMensal);
};

const chartsSaldoFinalMensal = (saldoFinalMensal) => {
  const options = {
    series: [{
      name: "Saldo Final",
      data: saldoFinalMensal
    }],
    chart: {
      type: 'bar',
      height: 380
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      title: {
        text: 'Meses do Ano'
      }
    },
    yaxis: {
      title: {
        text: 'Saldo Final (R$)'
      },
      labels: {
        formatter: function(value) {
          return `R$${value.toFixed(2)}`;
        }
      }
    },
    title: {

    },
    tooltip: {
      y: {
        formatter: function(val) {
          return `R$${val.toFixed(2)}`;
        }
      }
    },
    colors: ['#008FFB']
  };

  const chart = new ApexCharts(document.querySelector("#chartsSaldoFinalMensal"), options);
  chart.render();
};

const getPorcentagem = async () => {
  const url = 'get-porcentagem'; 

  const response = await $.getJSON(url);

  if (response && response.status && $.isArray(response.despesas) && !isNaN(parseFloat(response.total_despesas))) {
    const totalDespesas = parseFloat(response.total_despesas);  
    const despesas = response.despesas;

    renderChartDonuts(despesas, totalDespesas);
    renderChartsDespesas(despesas)
  } 
}

const renderChartDonuts = (despesas, totalDespesas) => {

  if (!Array.isArray(despesas) || despesas.length === 0 || isNaN(totalDespesas) || totalDespesas <= 0) {
    return;
  }

  const despesasAgrupadas = despesas.reduce((acc, despesa) => {
    if (!acc[despesa.descricao]) {
      acc[despesa.descricao] = 0;
    }
    acc[despesa.descricao] += parseFloat(despesa.valor);
    return acc;
  }, {});

  const despesasValues = Object.values(despesasAgrupadas);
  const despesasLabels = Object.keys(despesasAgrupadas);

  const porcentagens = despesasValues.map(valor => (valor / totalDespesas) * 100);

  const options = {
    series: porcentagens,
    chart: {
      type: 'donut',
    },
    labels: despesasLabels,
    tooltip: {
      y: {
        formatter: function (value) {
          return value.toFixed(2) + "%"; 
        }
      }
    },
    plotOptions: {
      pie: {
        donut: {
          labels: {
            show: true,
            name: {
              show: true,
              formatter: function () {
                return 'Total';  
              }
            },
            value: {
              show: true,
              formatter: function () {
                return "R$ " + totalDespesas.toFixed(2);  
              }
            },
            total: {
              show: true,
              label: 'Total',
              formatter: function () {
                return "R$ " + totalDespesas.toFixed(2);  
              }
            }
          }
        }
      }
    }
  };

  const chartElement = $("#chartPorcentagem")[0];
  if (chartElement) {
    var chart = new ApexCharts(chartElement, options);
    chart.render();
  } 
}

const renderChartsDespesas = (despesas) => {
  const despesasAgrupadas = despesas.reduce((acc, despesa) => {
    if (!acc[despesa.descricao]) {
      acc[despesa.descricao] = 0;
    }
    acc[despesa.descricao] += parseFloat(despesa.valor);
    return acc;
  }, {});

  const despesasLabels = Object.keys(despesasAgrupadas);
  const despesasValues = Object.values(despesasAgrupadas);

  var options = {
    series: [{
      data: despesasValues,  
    }],
    chart: {
      type: 'bar',
      height: 650,
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        horizontal: true,
        dataLabels: {
          position: 'bottom',
        },
      }
    },
    colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e', '#f48024', '#69d2e7'],
    dataLabels: {
      enabled: true,
      textAnchor: 'start',
      style: {
        colors: ['#ffff'],
      },
      formatter: function (val, opt) {
        return opt.w.globals.labels[opt.dataPointIndex] + ":  R$ " + val.toFixed(2); 
      },
      offsetX: 0,
      dropShadow: {
        enabled: true,
      }
    },
    stroke: {
      width: 1,
      colors: ['#fff']
    },
    xaxis: {
      categories: despesasLabels,  
    },
    yaxis: {
      labels: {
        show: false
      }
    },
    title: {
      // text: 'Despesas por Categoria',
      align: 'center',
      floating: true
    },
    tooltip: {
      theme: 'dark',
      y: {
        formatter: function (val) {
          return "R$ " + val.toFixed(2); 
        }
      }
    }
  };

  const chartElement = document.querySelector("#chartDespesas");
  if (chartElement) {
    const chart = new ApexCharts(chartElement, options);
    chart.render();
  } else {
    // console.error("Elemento do gráfico não encontrado");
  }
}

// ATENÇÃO!!!!!!!!!!!!!!!1 JS REFERENTE A ABA DE VISÃO GERAL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$(() => {
  getSaldos()
  getSaldosDoDia()
  getDay()
  getMonth()
  getMovimentationMonth()
})


let chartMovDay
let chartMonth

const getSaldos = async () => {

  $('.saldos').addClass('hidden')
  $('.skeleton-saldos').removeClass('hidden')

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
  $('.skeleton-saldos').addClass('hidden')

}


const getSaldosDoDia = async () => {

  const url = 'get-movimentacoes-dia'

  const dataInput = $('#dataInicio').val();

  const response = await $.getJSON(url, { dataInput: dataInput })

  chartsMovimentationDay(response)   
  
}


const chartsMovimentationDay = (response) => {

  if (chartMovDay) {
      chartMovDay.destroy();
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
                      <strong>${descricao}</strong>
                      Valor: R$ ${Math.abs(valor).toFixed(2)}
                  </div>`;
          }
      }
  };

  chartMovDay = new ApexCharts(document.querySelector("#chartDay"), options);
  chartMovDay.render();
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
  $('#filtroPeriodo').val(`${year}-${month}`);
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










