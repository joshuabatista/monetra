$(() => {
    getMovimentationCard()
    getCards()
})

var currentPage, totalPages

const getMovimentationCard = async (page = 1) => {

    $('#tabelaCartoes tbody').empty(); 

    $('.loading-card').removeClass('hidden').addClass('flex');

    let dataInicio = $('#data-inicio-card').val();
    let dataTermino = $('#data-termino-card').val();
    let cartao = $('#filtro-card').val();
    let planoContas = $('#filtro-plano-contas-card').val();
    let categoria = $('#filtro-categoria-card').val();
    let tipo = $('#filtro-tipo-card').val();

    const url = 'get-movimentation-card';

    try {
        const response = await $.getJSON(url, {
            data_inicio: dataInicio,
            data_final: dataTermino,
            cartao: cartao,
            plano_contas: planoContas,
            categoria: categoria,
            tipo: tipo,
            page: page
        });

        if (isNaN(page)) page = 1;

        $('#tabelaCartoes tbody').empty(); 

        $('.loading-card').removeClass('flex').addClass('hidden');

        if (response.status) {
            const movimentacoes = response.data;

            currentPage = Number(response.page);
            totalPages = Number(response.pages);

            $('.pagination-info-card').html(`Página <strong>${currentPage}</strong> de ${totalPages}`);

            if (movimentacoes.length === 0) {
                $('#tabelaCartoes tbody').append(`
                    <tr>
                        <td colspan="9" class="text-center py-4">Nenhum resultado encontrado</td>
                    </tr>
                `);
            } else {
                movimentacoes.forEach(movimentacao => {
                    switch(movimentacao.tipo) {
                        case 1:
                            movimentacao.tipo = 'Pago';
                            break;
                        case 4:
                            movimentacao.tipo = 'A pagar';
                            break;
                        case 2:
                            movimentacao.tipo = 'Recebido';
                            break;
                        case 3:
                            movimentacao.tipo = 'A receber';
                            break;
                    }

                    const dataFormatada = formatarData(movimentacao.data);

                    movimentacao.valor = Number(movimentacao.valor).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL',
                        minimumFractionDigits: 2
                    });

                    $('#tabelaCartoes tbody').append(`
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${dataFormatada}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.categoria}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.descricao}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.cartao}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.parcelamento}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.beneficiario}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.tipo}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.categoria === 'Despesa' ? movimentacao.valor : ''}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${movimentacao.categoria === 'Receita' ? movimentacao.valor : ''}</td>
                        </tr>
                    `);
                });
            }
        }
    } catch (error) {
        $('.loading-card').removeClass('flex').addClass('hidden');
    }

    $('.btn-add-card').html(`<span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
        Adicionar
    </span>`).prop('disabled', false).removeClass('w-4 h-10');

    $('.pagination-card').removeClass('hidden');

    $('.btn-next-card').prop('disabled', currentPage + 1 > totalPages);
    $('.btn-prev-card').prop('disabled', currentPage - 1 <= 0);
};

const nextCard = () => {

    $('#tabelaCartoes tbody').empty();

    const page = Number(currentPage) + 1

    getMovimentationCard(page)
}

const prevCard = () => {

    $('#tabelaCartoes tbody').empty();

    const page = Number(currentPage) - 1

    getMovimentationCard(page)
}


const addMovimentationCard = () => {

    $('.btn-add-card').html(`<svg aria-hidden="true" role="status" class="inline w-4 h-10 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#1C64F2"/>
        </svg> Carregando...`)


    let data = $('#dataCartao').val();
    let categoria = $('#select-categoria-cartao').val();
    let planoContas = $('#selectPlanoContasCartao').val();
    let beneficiario = $('.beneficiarioCartao').val();
    let tipo = $('#tipoCartao').val();
    let valor = $('#valorCartao').val();
    let cartao = $('.cartao').val()
    let parcelamento = $('#quantidade').val()
    let dataFormatada = formatarData(data);

    if (!dataFormatada || !categoria || !planoContas || !tipo || !valor) {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Por favor, preencha todos os campos obrigatórios',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        $('.btn-add-card').html(`<span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Adicionar
        </span>`).prop('disabled', false).removeClass('w-4 h-10');
        return;
    }

    $.ajax({
        url: 'save-movimentation-card',
        method: 'POST',
        data: {
            data: dataFormatada,
            categoria: categoria,
            plano_contas: planoContas,
            beneficiario: beneficiario,
            tipo: tipo,
            valor: valor,
            cartao: cartao,
            parcelamento: parcelamento

        },
        success: function (response) {
            getMovimentationCard(); 
            getSaldosDoDia()
            getMovimentationMonth()
        }
    });

    $('#dataCartao').val('');
    $('#select-categoria-cartao').val('');
    $('#selectPlanoContasCartao').val('');
    $('.beneficiarioCartao').val('');
    $('#tipoCartao').val('');
    $('#valorCartao').val('');
    $('.cartao').val()
    $('#quantidade').val(1)
};



//Funções auxiliares
function formatarData(data) {
    let partes = data.split("-"); 
    return `${partes[2]}/${partes[1]}/${partes[0]}`; 
}


const changeTipoCartao = () => {

    let categoria = $('#select-categoria-cartao').val()
    let tipoSelect = $('#tipoCartao')

    tipoSelect.empty()
    tipoSelect.append('<option value="">Selecione</option>')

    if(categoria === 'despesa') {
        tipoSelect.append('<option value="1">Pago</option>');
        tipoSelect.append('<option value="4">A pagar</option>');
    } else if (categoria === 'receita') {
        tipoSelect.append('<option value="2">Recebido</option>');
        tipoSelect.append('<option value="3">A receber</option>');

    }
}

//muda dinamicamente o plano de contas para Despesas ou Receitas
const changePlanoContasCartao = () => {

    let selectCategoria = $('.select-categoria-cartao').val()

    if(selectCategoria) {
        $.ajax({
            url: 'get-plano',
            type: 'GET',
            data: {selectCategoria: selectCategoria},
            success: function(response){
                $('.selectPlanoContasCartao').empty()
                $('.selectPlanoContasCartao').append('<option value"">Selecione</option>')
                if(response.data || response.data.length > 0) {
                    response.data.forEach(item=>{
                        $('.selectPlanoContasCartao').append(`<option value"${item.id}">${item.codigo} - ${item.descricao}</option>`)
                    })
                } else {
                    $('.selectPlanoContasCartao').append('<option value="">Nenhum plano de contas encontrado</option>')
                }
            }
        })
    }
}

const getCards = async () => {

    const url = 'get-cards'

    const response = await $.getJSON(url)

    renderCards(response)

    disableTabCard(response)
    
}


const renderCards = (response) => {

    let select  = $('.cartao')

    select.empty()

    select.append('<option value"">Selecione</option>')
    if(response.data || response.data.length > 0) {
        response.data.forEach(cards=> {
            select.append(`<option value="${cards.id}">${cards.cartao}</option>`)
        })
    } else {
        select.append('<option value"">Nenhum cartão encontrado!</option>')
    }

}

const disableTabCard = (response) => {

    if(response.data.length === 0) {

        $('#fevereiro-tab').prop('disabled', true).addClass('cursor-not-allowed')
        // $('#dashboard-styled-tab').trigger('click').focus()
    }
}





$(document).on('click', '.btn-show-filters-card', function() {
    $('.filters-card').hide().removeClass('hidden').slideDown(); 
    $('.filters-card').addClass('grid')
    $('.btn-show-filters-card').addClass('hidden');
    $('.btn-hide-filters-card').removeClass('hidden');
});

$(document).on('click', '.btn-hide-filters-card', function() {
    $('.filters-card').addClass('grid').slideUp(function() {
        $(this).addClass('hidden'); 
    });
    $('.btn-hide-filters-card').addClass('hidden');
    $('.btn-show-filters-card').removeClass('hidden');

    $('#data-inicio-card').val('')
    $('#data-termino-card').val('')
    $('#filtro-plano-contas-card').val('')
    $('#filtro-categoria-card').val('')
    $('#filtro-tipo-card').val('')
    $('#filtro-card').val('')

});


// Eventos ouvintes
$(document).on('change', '.select-categoria-cartao', changePlanoContasCartao)
$(document).on('change', '.select-categoria-cartao', changeTipoCartao)
$(document).on('click', '.btn-add-card', addMovimentationCard)
$(document).on('change', '#data-inicio-card', () => getMovimentationCard(1))
$(document).on('change', '#data-termino-card', () => getMovimentationCard(1))
$(document).on('change', '#filtro-card', () => getMovimentationCard(1))
$(document).on('change', '#filtro-plano-contas-card', () => getMovimentationCard(1))
$(document).on('change', '#filtro-categoria-card', () => getMovimentationCard(1))
$(document).on('change', '#filtro-tipo-card', () => getMovimentationCard(1))
$(document).on('click', '.btn-hide-filters-card', () => getMovimentationCard(1))
$('.btn-prev-card').click(prevCard)
$('.btn-next-card').click(nextCard)
