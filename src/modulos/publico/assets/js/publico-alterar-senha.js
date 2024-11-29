
const alterarSenha = () => {
    const senhaAtual = $('#senhaAtual').val();
    const novaSenha1 = $('#novaSenha1').val();
    const novaSenha2 = $('#novaSenha2').val();

    if (senhaAtual === '' || novaSenha1 === '' || novaSenha2 === '') {
        return Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'error',
            title: 'Opss!',
            text: 'Preencha todos os campos',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }

    const form = $('#form-alterar-senha')[0];
    const data = new FormData(form); 
    const url = 'edit-password'; 

    Swal.fire({
        title: "Certeza?",
        text: "Sua senha será alterada",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST', 
                data: data, 
                contentType: false, 
                processData: false, 
                success: (response) => {
                    console.log(response.status);
                    
                    if (response.status == false) {
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
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            toast: true,
                            icon: 'success',
                            title: 'Sucesso!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                        }).then(() => {
                            location.href = response.redirect
                        })
                    }

                }
            });
        }
    });
};


$(document).on('click', '.btn-alterar-senha', alterarSenha)