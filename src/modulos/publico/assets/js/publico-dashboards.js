$(() => {

  getSaldoInicialAno()
  getSaldoFinalAno()
  getEntradasAno()
  getSaidasAno()

})



Apex.dataLabels = {
    enabled: false
  }




var sparklineData = [1, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

var randomizeArray = function (arg) {
    var array = arg.slice();
    var currentIndex = array.length, temporaryValue, randomIndex;
  
    while (0 !== currentIndex) {
  
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
  
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
  
    return array;
  }


var colorPalette = ['#00D8B6','#008FFB',  '#FEB019', '#FF4560', '#775DD0']



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




// new ApexCharts(document.querySelector("#spark1"), spark1).render();
// new ApexCharts(document.querySelector("#spark2"), spark2).render();
// new ApexCharts(document.querySelector("#spark3"), spark3).render();
// new ApexCharts(document.querySelector("#spark4"), spark4).render();
