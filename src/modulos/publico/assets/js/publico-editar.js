
$(() => {
    getInfoUser()
})

const getInfoUser = async () => {

    const url = 'info-user'

    const response = await $.getJSON(url)

    renderInfoUser(response.data)
}

const renderInfoUser = (data) => {

    $('#emailUsu').prop('disabled', true).addClass('cursor-not-allowed')

    const user = data[0]

    $('#emailUsu').val(user.email)
    $('#nomeUsu').val(user.nome)
    $('#sobrenomeUsu').val(user.sobrenome)
    $('#celularUsu').val(user.celular)

    $('.email-usuario').html(user.email)
    $('.nome-usuario').html(user.nome + ' ' + user.sobrenome)


}


const editarPerfil = () => {

    const url = 'editar-perfil'

    const form = $('#form-editar')[0]

    const data = new FormData(form)

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,

        success: function (response) {
            if (!response.status) {
                return Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Opss!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: 'Sucesso',
                html: 'Dados editados com sucesso!',
                text: response.message,
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true
            }).then(() => {
                getInfoUser()
            })
        }
    })
 }

 $(document).on('click', '.btn-editar-info', editarPerfil)