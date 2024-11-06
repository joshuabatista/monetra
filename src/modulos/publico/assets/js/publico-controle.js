
$(() => {
    getSaldo()
    getInfoCard()
})

let savedCards = []

const getInfoCard = () => {

    const url = 'get-info-card';

    $.getJSON(url, function(response) {

        savedCards = response.data || []

        showSelectCreditCards(response)
        renderCreditCardFields(response.data)

    })

}

const showSelectCreditCards = (response) => {

    if(response.data.length === 0) {

        $('#switch-avançar').prop('disabled', false);

        if ($('#switch-avançar').is(':checked')) {

            $('.creditCards').removeClass('hidden');
    
        } else {
    
            $('.creditCards').addClass('hidden');
    
        }

        return
    }
    
    if(response.data.length >= 1) {

        $('#switch-avançar').prop('checked', true);

    } else {

        $('#switch-avançar').prop('checked', false);

    }

    if ($('#switch-avançar').is(':checked')) {

        $('.creditCards').removeClass('hidden');

    } else {

        $('.creditCards').addClass('hidden');

    }
}

const renderCreditCardFields = (cards = []) => {

    
    var qtdLength = cards.length

    if(qtdLength > 0) {
        $('#options').val(qtdLength)
    }
    
    var quantidade = $('#options').val();
    var container = $('#cardNamesContainer');
    
    container.empty();

    var totalFields = Math.max(quantidade, cards.length);

    for (var i = 1; i <= totalFields; i++) {
        var cardName = savedCards[i - 1] ? savedCards[i - 1].cartao : '';

        container.append(`
            <div class="form-control mt-2">
                <label for="nameCard${i}" class="label">Nome do Cartão ${i}</label>
                <input type="text" id="nameCard${i}" name="nameCard${i}" value="${cardName}" class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-[14rem]" />
            </div>
        `);
    }
}


const validation = (event) => {

    let openingBalance = $('.saldoInicial').val()
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

const saveSaldo = () => {

    const saldo  = $('.saldoInicial').val()
    const data = $('#dataSaldo').val()

    $.ajax({
        url: 'save-saldo',
        method: 'POST',
        data: {saldo: saldo, data: data},
        dataType: 'json',
    })
}

const getSaldo = () => {
    const url = 'get-saldo-inicial';

    $.getJSON(url, function(response) {
        if (response.data && response.data.saldo) {
            const saldo = response.data.saldo;
            const data = response.data.data;

            $('.saldoInicial').val(saldo);
            $('.saldoInicial').prop('disabled', true);
            $('#dataSaldo').val(data);
            $('#dataSaldo').prop('disabled', true);
        }
    });
};


const saveCreditCard = () => {

    let cartao1 = $('#nameCard1').val()
    let cartao2 = $('#nameCard2').val()
    let cartao3 = $('#nameCard3').val()
    let cartao4 = $('#nameCard4').val()
    let cartao5 = $('#nameCard5').val()
    let switchAvancar = $('#switch-avançar').is(':checked')

    const data = {
        cartao1: cartao1,
        cartao2: cartao2,
        cartao3: cartao3,
        cartao4: cartao4,
        cartao5: cartao5,
        switchAvancar: switchAvancar
    }

    $.ajax({
        url: 'save-credit-card',
        method: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {

            if(response.status === true) {

                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Salvo com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = 'lancamentos'
                })

            } else {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Opss!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                }).then(()=> {
                    location.reload()
                })
            }
            
            
        }

        
    })
}


//Eventos ouvintes
$('#switch-avançar').change(getInfoCard )
$('#btn-avancar').click(validation)
$('#btn-avancar').click(saveSaldo)
$('#btn-avancar').click(saveCreditCard)
$('#options').change(function() {
    renderCreditCardFields();
});
