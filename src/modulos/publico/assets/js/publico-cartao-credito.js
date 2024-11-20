$(() => {
    getCartao()
})

let chartCartao = {};

const getCartao = async () => {
    $("#chartsContainerCartao").empty();
    $(".loadingCartao").removeClass("hidden").addClass("flex justify-center");

    const url = "get-saldos-cartao";

    try {
        const response = await $.getJSON(url);

        if (!response.data || response.data.length === 0) {
            $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
            return;
        }

        response.data.forEach((cartao, index) => {
            const cardHtml = `
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 text-center card-cartao" data-id="${cartao.id}">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">${cartao.cartao}</h3>
                    <div id="chartCartao-${index}" class="chart mx-auto flex justify-center"></div>
                    <p class="text-sm text-gray-600">Limite: R$${cartao.limite.toFixed(2)}</p>
                    <p class="text-sm text-gray-600">Consumido: R$${cartao.saldo_atual.toFixed(2)} (${cartao.porcentagem.toFixed(1)}%)</p>

                    <div>
                        <div class="flex flex-col justify-center gap-2 mt-4">
                            <label class="label">Pagar Cartão</label>
                            <input class="input saldoPagar" id="saldoPagar" name="saldoPagar" value="R$ ${cartao.saldo_atual}"></input>
                        </div>
                        <button class="btn-pagar-cartao mt-4 relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800"> 
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Pagar
                            </span>
                        </button>
                    </div>
                </div>
      `;

            $("#chartsContainerCartao").append(cardHtml);

            createChartForCartao(index, cartao.porcentagem);
        });

        $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
    } catch (error) {
        $(".loadingCartao").removeClass("flex justify-center").addClass("hidden");
    }
};

const createChartForCartao = (id, percentualGasto) => {

    if (chartCartao[id]) {
        chartCartao[id].destroy();
    }

    const restante = parseFloat((100 - percentualGasto).toFixed(1));
    percentualGasto = parseFloat(percentualGasto.toFixed(1));



    const options = {
        series: [percentualGasto, restante],
        chart: {
            type: "donut",
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

    chartCartao[id] = new ApexCharts(document.querySelector(`#chartCartao-${id}`), options);
    chartCartao[id].render()
};


const pagarCartao = ({ target }) => {
    
    const elm = $(target).closest('.card-cartao');
    const id = elm.data('id');
    const saldoPagar = elm.find('.saldoPagar').val();

    Swal.fire({
        title: "Certeza?",
        text: "Ao pagar, o valor será descontado de seu movimento",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.get('pagar-cartao', { id: id, saldoPagar: saldoPagar })
                .done((response) => {
                    if (response.status === false) {
                        return Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'error',
                            title: 'Opss!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }

                    Swal.fire({
                        position: 'top-end',
                        toast: true,
                        icon: 'success',
                        title: 'Sucesso!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    }).then(() => {
                        getInfoPendentes();
                        getMovimentation();
                        getSaldos();
                        getSaldosDoDia();
                        getMovimentationMonth();
                        getCartao();
                    });
                })
        }
    });
};

$(document).on('click', '.btn-pagar-cartao', pagarCartao);
