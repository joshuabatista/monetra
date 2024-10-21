
//muda dinamicamente o plano de contas para Despesas ou Receitas
const changePlanoContas = () => {

    let selectCategoria = $('.select-categoria').val()

    if(selectCategoria) {
        $.ajax({
            url: '/src/modulos/publico/backend/publico-get-plano-contas.php',
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
        let dataFormatada = formatarData(data)

        // Valida se os campos obrigatórios estão preenchidos
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



        // Adiciona uma nova linha na tabela com os valores capturados
        $('#tabelaMovimentacoes tbody').append(`
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${dataFormatada}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${categoria.charAt(0).toUpperCase() + categoria.slice(1)}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${planoContas}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${beneficiario}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${tipoTexto}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${debito}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">${credito}</td>
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

const saveMovimentation = () => {
    
    var tabelaDados = []

    $('#tabelaMovimentacoes tbody tr').each(function() {
        var linha = {
            data: $(this).find('td:eq(0)').text(),
            categoria: $(this).find('td:eq(1)').text(),
            plano_contas: $(this).find('td:eq(2)').text(),
            beneficiario: $(this).find('td:eq(3)').text(),
            tipo: $(this).find('td:eq(4)').text(),
            debito: $(this).find('td:eq(5)').text(),
            credito: $(this).find('td:eq(6)').text()
        };
        tabelaDados.push(linha);
    });

    console.log(tabelaDados);
    

    $.ajax({
        url: '/src/modulos/publico/backend/publico-salvar-movimentacao.php',
        method: 'POST',
        data: {tabela: tabelaDados},
        dataType: 'json',
    })


}

//Funções auxiliares
function formatarData(data) {
    let partes = data.split("-"); 
    return `${partes[2]}/${partes[1]}/${partes[0]}`; 
}


// Eventos ouvintes
$(document).on('change', '.select-categoria', changePlanoContas)
$(document).on('change', '.select-categoria', changeTipo)
$(document).on('click', '.btn-add-mov', addMovimentation)
$(document).on('click', '.btn-add-mov', saveMovimentation)