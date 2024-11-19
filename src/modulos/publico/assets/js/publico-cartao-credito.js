
$(() => {
    getCartao()
})



const getCartao = async () => {
  $("#chartsContainerCartao").empty();
  $(".loadingCartao").removeClass("hidden").addClass("flex justify-center");

  const url = "get-saldos-cartao";

  try {
    const response = await $.getJSON(url);

    if (!response.data || response.data.length === 0) {
      console.log("Nenhum cartão encontrado.");
      $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
      return;
    }

    response.data.forEach((cartao, index) => {
      const cardHtml = `
        <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">${cartao.cartao}</h3>
            <div id="chartCartao-${index}" class="chart mx-auto flex justify-center"></div>
            <p class="text-sm text-gray-600">Limite: R$${cartao.limite.toFixed(2)}</p>
            <p class="text-sm text-gray-600">Gasto: R$${cartao.saldo_atual.toFixed(2)} (${cartao.porcentagem.toFixed(1)}%)</p>
        </div>
      `;

      $("#chartsContainerCartao").append(cardHtml);

      createChartForCartao(index, cartao.porcentagem);
    });

    $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
  } catch (error) {
    console.error("Erro ao buscar os dados dos cartões:", error);
    $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
  }
};

const createChartForCartao = (id, percentualGasto) => {
  const options = {
    series: [percentualGasto, 100 - percentualGasto],
    chart: {
      type: "pie",
      width: 200,
      height: 200,
    },
    plotOptions: {
      pie: {
        startAngle: -90,
        endAngle: 90,
        offsetY: 10,
        donut: {
          size: "75%",
        },
      },
    },
    labels: ["Gasto (%)", "Restante (%)"],
    colors: ["#fd7861", "#E0E0E0"],
    legend: {
      show: false,
    },
  };

  const chart = new ApexCharts(document.querySelector(`#chartCartao-${id}`), options);
  chart.render();
};
