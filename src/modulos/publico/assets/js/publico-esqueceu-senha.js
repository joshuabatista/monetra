
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

                    let timeLeft = 5 * 60; // 5 minutos 
                    const countdownDisplay = $('.codigo'); 
    
                    const updateCountdown = () => {
                        const minutes = Math.floor(timeLeft / 60);
                        const seconds = timeLeft % 60;
                        countdownDisplay.text(`${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`);
                        
                        if (timeLeft <= 0) {
                            clearInterval(countdownInterval);
                            // Aqui você pode adicionar um alerta ou ação quando o tempo expirar
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

$(document).on('click', '.btn-esqueceu-senha', esqueceuSenha)