
const esqueceuSenha = () => {

    const email = $('#email-recuperar').val();
    const button = $('.btn-esqueceu-senha');
    const spinner = button.find('svg');
    
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
        return; 
    }

    button.prop('disabled', true);
    spinner.removeClass('hidden');

    const url = 'esqueceu-senha';

    
    $.getJSON(url, { email: email })
        .then(response => {
            if (response.status === true) {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Foi enviado um email contendo as informações para a atualização da senha',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                }).then(() => {
                    $('.after').addClass('hidden');
                    $('.before').removeClass('hidden');
                    $('.btn-esqueceu-senha').addClass('hidden')
                    $('.btn-verification-code').removeClass('hidden')
                });

                    let timeLeft = 5 * 60; 
                    const countdownDisplay = $('.codigo'); 
    
                    const updateCountdown = () => {
                        const minutes = Math.floor(timeLeft / 60);
                        const seconds = timeLeft % 60;
                        countdownDisplay.text(`${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
                        
                        if (timeLeft <= 0) {
                            clearInterval(countdownInterval);
                        }
    
                        timeLeft--;
                    };
    
                    const countdownInterval = setInterval(updateCountdown, 1000);

            } else {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: 'Opss!',
                    text: response.message ,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
        }).always(() => {
            spinner.addClass('hidden');
            button.prop('disabled', false);
        })
};



const validaCodigo = () => {

    const n1 = $('#verification1').val()
    const n2 = $('#verification2').val()
    const n3 = $('#verification3').val()
    const n4 = $('#verification4').val()
    const n5 = $('#verification5').val()
    const n6 = $('#verification6').val()

    if(n1 === '' || n2 === '' || n3 === '' || n4 === '' || n5 === '' || n6 === '') {
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'info',
            title: 'Opss...',
            text: 'Preencha os campos corretamente',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }

    const url = 'valida-codigo'

    $.getJSON(url, {
        n1: n1,
        n2: n2,
        n3: n3,
        n4: n4,
        n5: n5,
        n6: n6,
    }).then((response) => {
        if(response.status === true) {
            Swal.fire({
                position: 'top-end',
                toast: true,
                icon: 'success',
                title: 'Sucesso!',
                text: 'Codigo validado com sucesso!',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            }).then(() => {
                window.location.href = response.redirect_url
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
    })
}

const alterarSenha = () => {

    const senha1 = $('#novaSenha1').val()
    const senha2 = $('#novaSenha2').val()

    if(senha1 === '' || senha2 === ''){
        return Swal.fire({
            position: 'top-end',
            toast: true,
            icon: 'info',
            title: 'Opss...',
            text: 'Preencha todos os campos',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        })
    }

    const form = $('#form-setar-senha')[0]
    const data = new FormData(form)
    const url = 'setar-nova-senha'
    data.append('usu_id', usu_id)

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
                            location.href = 'inicio'
                        })
                    }

                }
            });
        }
    });
    
}

$(document).on('click', '.btn-esqueceu-senha', esqueceuSenha)
$(document).on('click', '.btn-verification-code', validaCodigo)
$(document).on('click', '.btn-nova-senha', alterarSenha)

$(document).ready(function () {
    $(".grid input").on("input", function () {
        const maxLength = 1;
        const inputValue = $(this).val();

        if (inputValue.length > maxLength) {
            $(this).val(inputValue.slice(0, maxLength));
        }

        if (inputValue.length === maxLength) {
            $(this).closest("div").next("div").find("input").focus();
        }
    });

    $(".grid input").on("keydown", function (e) {
        if (e.key === "Backspace" && $(this).val() === "") {
            $(this).closest("div").prev("div").find("input").focus();
        }
    });
});

