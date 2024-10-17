

//muda dinamicamente o plano de contas para Despesas ou Receitas
const changePlanoContas = () => {

    let selectCategoria = $('.select-categoria').val()

    if(selectCategoria) {
        $.ajax({
            url: '../backend/publico-get-plano-contas.php',
            type: 'GET',
            data: {selectCategoria: selectCategoria},
            success: function(response){
                $('.selectPlanoContas').empty()
                $('.selectPlanoContas').append('<option value"">Selecione</option>')
                if(response.data || response.data.length > 0) {
                    response.data.forEach(item=>{
                        $('.selectPlanoContas').append(`<option value"${item.id}">${item.codigo} - ${item.descricao}</option>`)
                    })
                } else {
                    $('.selectPlanoContas').append('<option value="">Nenhum plano de contas encontrado</option>')
                }
            }
        })
    }
}



const addMovimentation = () => {

        let data = $('#data').val();
        let categoria = $('#select-categoria').val();
        let planoContas = $('#selectPlanoContas').val();
        let beneficiario = $('.beneficiario').val();
        let tipo = $('#tipo').val();
        let valor = $('#valor').val();

        // Valida se os campos obrigatórios estão preenchidos
        if(!data || !categoria || !planoContas || !tipo || !valor) {
            alert("Por favor, preencha todos os campos obrigatórios.");
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



        // Adiciona uma nova linha na tabela com os valores capturados
        $('#tabelaMovimentacoes tbody').append(`
            <tr>
                <td>${data}</td>
                <td>${categoria.charAt(0).toUpperCase() + categoria.slice(1)}</td>
                <td>${planoContas}</td>
                <td>${beneficiario}</td>
                <td>${tipoTexto}</td>
                <td>${debito}</td>
                <td>${credito}</td>
            </tr>
        `);

        // Limpa os campos após a inserção
        $('#data').val('');
        $('#select-categoria').val('');
        $('#selectPlanoContas').val('');
        $('.beneficiario').val('');
        $('#tipo').val('');
        $('#valor').val('');
  
}

const changeTipo = () => {

    let categoria = $('#select-categoria').val()
    let tipoSelect = $('#tipo')

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



// Eventos ouvintes

$(document).on('change', '.select-categoria', changePlanoContas)
$(document).on('change', '.select-categoria', changeTipo)
$(document).on('click', '.btn-add-mov', addMovimentation)