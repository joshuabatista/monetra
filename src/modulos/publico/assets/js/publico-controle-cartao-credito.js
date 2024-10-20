
//muda dinamicamente o plano de contas para Despesas ou Receitas
const changePlanoContasCard = () => {

    let selectCategoria = $('.select-categoria-cartao').val()

    if(selectCategoria) {
        $.ajax({
            url: '/src/modulos/publico/backend/publico-get-plano-contas-card.php',
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


const addMovimentationCard = () => {

        let data = $('#dataCartao').val();
        let categoria = $('#select-categoria-cartao').val();
        let planoContas = $('#selectPlanoContasCartao').val();
        let beneficiario = $('.beneficiarioCartao').val();
        let tipo = $('#tipoCartao').val();
        let valor = parseFloat($('#valorCartao').val());    
        let cartao = $('#cartao').val();
        let quantidade = parseInt($('#quantidade').val())
        let dataFormatada = formatarData(data)

        if(!dataFormatada || !categoria || !planoContas || !tipo || !valor) {
            Swal.fire({
                position: 'top-end',
                toast: true,
                icon: 'error',
                title: 'Opss!',
                text: 'Por favor, preencha todos os campos obrigatórios',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
            return;
        }

        let tipoTexto = '';
        switch(tipo) {
            case '1':
                tipoTexto = 'Pago';
                break;
            case '0':
                tipoTexto = 'A pagar';
                break;
            case '2':
                tipoTexto = 'Recebido';
                break;
            case '3':
                tipoTexto = 'A receber';
                break;
        }

        let debito = ''
        let credito = ''

        if (categoria === 'despesa') {
            debito = `<span class="debito">-R$ ${parseFloat(valor).toFixed(2)}</span>`;
        } else if (categoria === 'receita') {
            credito = `<span class="credito">R$ ${parseFloat(valor).toFixed(2)}</span>`;
        }

        let valorParcela = (valor / quantidade).toFixed(2)

        const adicionarMeses = (data, meses) => {
            let novaData = new Date(data);
            novaData.setMonth(novaData.getMonth() + meses);
            return novaData.toLocaleDateString('pt-BR'); 
        }

        for (let i = 1; i <= quantidade; i++) {
            let dataParcela = adicionarMeses(data, i - 1); 
    
            $('#tabelaCartoes tbody').append(`
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${dataParcela}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${categoria.charAt(0).toUpperCase() + categoria.slice(1)}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${planoContas}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${cartao}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${i} de ${quantidade}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${beneficiario}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${tipoTexto}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${debito ? `-R$ ${valorParcela}` : ''}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${credito ? `R$ ${valorParcela}` : ''}</td>
                </tr>
            `);
        }

        // Limpa os campos após a inserção
        $('#dataCartao').val('');
        $('#select-categoriaCartao').val('');
        $('#selectPlanoContasCartao').val('');
        $('.beneficiarioCartao').val('');
        $('#tipoCartao').val('');
        $('#valorCartao').val('');
        $('#cartao').val('');
        $('#quantidade').val('');
  
}

const changeTipoCard = () => {

    let categoria = $('#select-categoria-cartao').val()
    let tipoSelect = $('#tipoCartao')

    tipoSelect.empty()
    tipoSelect.append('<option value="">Selecione</option>')

    if(categoria === 'despesa') {
        tipoSelect.append('<option value="1">Pago</option>');
        tipoSelect.append('<option value="0">A pagar</option>');
    } else if (categoria === 'receita') {
        tipoSelect.append('<option value="2">Recebido</option>');
        tipoSelect.append('<option value="3">A receber</option>');

    }
}

//Funções auxiliares

function formatarData(data) {
    let partes = data.split("-"); 
    return `${partes[2]}/${partes[1]}/${partes[0]}`; 
}


// Eventos ouvintes

$(document).on('change', '.select-categoria-cartao', changePlanoContasCard)
$(document).on('change', '.select-categoria-cartao', changeTipoCard)
$(document).on('click', '.btn-add-card', addMovimentationCard)