$(() => {
    getSaldos()
})

const getSaldos = () => {

    const url = '/src/modulos/publico/backend/publico-get-saldos.php'

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (response) {


            console.log(response);
            
        }
    })
}