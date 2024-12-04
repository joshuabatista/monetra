const crirarNovoUsuario = () => {

    const spinner = $('.loading-cadastrar')

    spinner.removeClass('hidden')

    if (
        $('#email-criar').val() == '' ||
        $('#email-criar').val() == null ||
        $('#password-criar').val() == '' ||
        $('#password-criar').val() == null ||
        $('#password-criar-confirmar').val() == '' ||
        $('#password-criar-confirmar').val() == null ||
        $('#nome').val() == '' ||
        $('#nome').val() == null ||
        $('#sobrenome').val() == '' ||
        $('#sobrenome').val() == null
    ) {
        return Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Preencha os campos corretamente',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        }).then(() => {
            spinner.addClass('hidden')
        })
    }

    const form = $('#form-cadastrar')[0]

    const url = 'criar-usuario'

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
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    title: 'Sucesso',
                    html: 'Usuário cadastrado com sucesso!',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false,
                    timerProgressBar: true
                }).then(() => {
                    window.location.href = "inicio"
                })
            }

        }

    }).always(() => {
        spinner.addClass('hidden')
    })


}


$(document).on('click', '.btn-cadastrar', crirarNovoUsuario)