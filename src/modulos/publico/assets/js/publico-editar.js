
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

    const user = data

    $('#emailUsu').val(user.email)
    $('#nomeUsu').val(user.nome)
    $('#nomeUsuInicio').html(user.nome)
    $('#sobrenomeUsu').val(user.sobrenome)
    // $('#celularUsu').val(user.celular)

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

$(document).ready(function() {

    function getSaudacao() {
        const now = new Date(); // Cria um objeto Date com a data e hora atuais
        const hora = now.getHours(); // Obtém a hora atual (de 0 a 23)

        // Verifica o período do dia e retorna a saudação correspondente
        if (hora >= 0 && hora < 12) {
            return "Bom dia"; // De 00:00 a 11:59
        } else if (hora >= 12 && hora < 18) {
            return "Boa tarde"; // De 12:00 a 17:59
        } else {
            return "Boa noite"; // De 18:00 a 23:59
        }
    }

    // Função para atualizar a saudação com o nome do usuário
    function atualizarSaudacao() {
        // Pega o nome do usuário da página
        const nome = $('#nomeUsuInicio').text();

        // Atualiza a saudação com base no horário
        const saudacao = getSaudacao();
        $('#saudacaoMensagem').text(`, ${saudacao}!`);
    }

    // Atualiza a saudação quando a página carregar
    atualizarSaudacao();

});

 $(document).on('click', '.btn-editar-info', editarPerfil)