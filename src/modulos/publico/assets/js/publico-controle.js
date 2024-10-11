
const showSelectCreditCards = () => {

    let button = $('#switch-avançar').is(':checked')

    if(button == true) {
        $('.creditCards').removeClass('d-none')
    } else{
        $('.creditCards').addClass('d-none')
    }
}
