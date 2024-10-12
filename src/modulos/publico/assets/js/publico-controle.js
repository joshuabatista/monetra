(() => {
    $('#saldoInicial').mask('000.000,00')
})

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
    
    if(openingBalance == '' || openingBalance == null) {
        event.preventDefault()
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Preencha o saldo incial!',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        
    }

}



//Eventos ouvintes
$('#switch-avançar').change(showSelectCreditCards)
$('#btn-avancar').click(validation)
