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
      height: 500,
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
    console.error("Elemento do gráfico não encontrado");
  }
}



