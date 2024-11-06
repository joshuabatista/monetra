$(() => {
    getInfo()
})



const getInfo = async () => {
    const url = 'get-saldos';
    const response = await $.getJSON(url);
    hiddenButton(response.data);
}

const hiddenButton = (data) => {

    if(data.saldo_inicial === '0,00' || data.saldo_inicial === null) {

        $('#lctos-tabs').prop('disabled', true).addClass('cursor-not-allowed')
        $('#dashboard-styled-tab').trigger('click').focus()
        
    }

}


