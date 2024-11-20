$(() => {
    getInfo()
    getInfoCartao()
})


const getInfo = async () => {
    const url = 'get-saldos';
    const response = await $.getJSON(url);
    hiddenButton(response.data);
}

const hiddenButton = (data) => {

    if(data.saldo_inicial === '0,00' || data.saldo_inicial === null) {

        $('#lctos-tabs').prop('disabled', true).addClass('cursor-not-allowed')
        $('#dashboard-tab').prop('disabled', true).addClass('cursor-not-allowed')
        $('#minucioso-tab').prop('disabled', true).addClass('cursor-not-allowed')
        $('#pagarReceber-tab').prop('disabled', true).addClass('cursor-not-allowed')
        $('#dashboard-styled-tab').trigger('click').focus()
        
    }

}

const getInfoCartao = async () => {

    const url = "get-cards"

    const response = await $.getJSON(url)

    hiddenTab(response.data)
}

const hiddenTab = (data) => {

    let length = data.length

    if(length === 0) {
        $('#cartao-tab').prop('disabled', true).addClass('cursor-not-allowed')
        $('.tab-cartao-inicio').prop('disabled', true).addClass('cursor-not-allowed')
    }
    

}


