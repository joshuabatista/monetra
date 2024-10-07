
const login = () => {

    const email = $('#email').val()
    const senha = $('#password').val()

    if(email == '' || email == null || senha == '' || senha == null) {
        alert('Preencha os campos corretamente')
    }

    const form = $('#login-form')

    const data = new FormData(form)

    const url = '../backend/login.php'

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
                alert('Login Realizado!')
            }
        }

    })
} 

$(document).on('click', '.btn-logar', login)