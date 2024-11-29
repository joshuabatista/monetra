
const esqueceuSenha = () => {

    const email = $('#email-recuperar').val()
    
    if(email === '' || email === null) {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'info',
            title: 'Opss!',
            text: 'Informe seu email',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }

    const url = 'esqueceu-senha'

    const response = $.getJSON(url, {email: email})

    if(response.status === true){
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'success',
            title: 'Sucesso!',
            text: 'Foi enviado um email contendo as informações para a atualização da senha',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    } else {
        Swal.fire({
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
}

$(document).on('click', '.btn-esqueceu-senha', esqueceuSenha)