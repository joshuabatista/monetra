$(() => {

  getSaldosEntradasSaidas()
  getSaldoInicialAno()
  getSaldoFinalAno()
  getEntradasAno()
  getSaidasAno()
  chartsEntradasSaidas()

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

var generateDayWiseTimeSeries = function (baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = baseval;
    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

    series.push([x, y]);
    baseval += 86400000;
    i++;
  }
  return series;
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


