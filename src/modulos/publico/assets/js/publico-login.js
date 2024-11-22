
const login = () => {

    const email = $('#email').val()
    const senha = $('#password').val()

    if(email == '' || email == null || senha == '' || senha == null) {
        Swal.fire({
            icon: 'error',
            title: 'Erro',
            text: 'Preencha os campos corretamente',
            confirmButtonText: 'Entendi'
        });
        return
    }

    const form = $('#form-login')[0]

    const data = new FormData(form)

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
                    timer: 3000,
                    timerProgressBar: true,
                }).then(() => {
                    window.location.href = "inicio"
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Usuário ou senha incorretos!',
                    confirmButtonText: 'Entendi'
                });
            }
        }

    })

} 

$(document).on('click', '.btn-logar', login)
$(document).on('keydown', function(e) {
    if (e.key === "Enter") {  
        login();  
    }
});
