$(() => {
    getInfo()
})



const getInfo = async () => {
    const url = 'get-saldos';
    const response = await $.getJSON(url);
    hiddenButton(response.data);
}

const hiddenButton = (data) => {

    if(data.saldo_inicial == '' || data.saldo_inicial == null) {
        $('.btn-start').removeClass('hidden')
    }

}