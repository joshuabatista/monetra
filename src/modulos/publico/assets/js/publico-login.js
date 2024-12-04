
const login = () => {

    const email = $('#email').val()
    const senha = $('#password').val()
    const spinner = $('.loading-logar')

    spinner.removeClass('hidden')

    if(email == '' || email == null || senha == '' || senha == null) {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Erro',
            text: 'Preencha os campos corretamente',
            confirmButtonText: 'Entendi',
            timer: 3000,
            timerProgressBar: true,
        }).then(() => {
            spinner.addClass('hidden')
        })
        return
    }

    const form = $('#form-login')[0]

    const data = new FormData(form)

    data.append('password', btoa(senha))

    const url = 'login-usu'


    $.ajax({
        type: 'POST',
        url: url,
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        data: data,
        dataType: 'json',
        success: function (response) {            

            if(response.status == true){
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Logado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = "inicio"
                })
            } else {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Opss..',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                })
            }
        }

    }).always(() => {
        spinner.addClass('hidden')
    })

} 

$(document).on('click', '.btn-logar', login)
$(document).on('keydown', function(e) {
    if (e.key === "Enter") {  
        login();  
    }
});
