
$(document).ready(function() {
    getSaldo()
});


const showSelectCreditCards = () => {

    let button = $('#switch-avançar').is(':checked')

    if(button == true) {
        $('.creditCards').removeClass('hidden')
    } else{
        $('.creditCards').addClass('hidden')
    }
}

const validation = (event) => {

    let openingBalance = $('#saldoInicial').val()
    let cardName = $('#nameCard1').val()
    
    if(openingBalance == '' || openingBalance == null || cardName == '') {
        event.preventDefault()
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Preencha os campos corretamente!',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        
    }

}


$(document).ready(function() {
    $('#options').change(function() {
        var quantidade = $(this).val();
        var container = $('#cardNamesContainer');
        
        // Limpa todos os campos atuais
        container.empty();

        for (var i = 1; i <= quantidade; i++) {
            container.append(`
                <div class="form-control mt-2">
                    <label for="nameCard${i}" class="label">Nome do Cartão ${i}</label>
                    <input type="text" id="nameCard${i}" name="nameCard${i}" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-[14rem]" />
                </div>
            `);
        }
    });
});


const saveSaldo = () => {

    const saldo  = $('#saldoInicial').val()

    $.ajax({
        url: '/src/modulos/publico/backend/publico-salvar-saldo-inicial.php',
        method: 'POST',
        data: {saldo: saldo},
        dataType: 'json',
    })
}

const getSaldo = () => {
    const url = '/src/modulos/publico/backend/publico-get-saldo-inicial.php';

    $.getJSON(url, function(response) {

        
        if (response.status) {
            const saldo = response.data; 

            if (saldo) {
                $('#saldoInicial').val(saldo); 
                $('#saldoInicial').prop('disabled', true);
            }
        } else {
            console.error("Erro ao recuperar saldo: ", response.message);
        }
    });
}


//Eventos ouvintes
$('#switch-avançar').change(showSelectCreditCards)
$('#btn-avancar').click(validation)
$('#btn-avancar').click(saveSaldo)
