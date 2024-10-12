
const showSelectCreditCards = () => {

    let button = $('#switch-avançar').is(':checked')

    if(button == true) {
        $('.creditCards').removeClass('hidden')
    } else{
        $('.creditCards').addClass('hidden')
    }
}


//Eventos ouvintes
$('#switch-avançar').change(showSelectCreditCards)
