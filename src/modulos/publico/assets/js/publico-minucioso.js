$(()=> {
    getPlano()
})


const getPlano = async () => {

    const url = 'get-plano-minucioso'

    const response = await $.getJSON(url)

    renderSelect(response.data)

}

const renderSelect = (data) => {

    let select = $('#selectControle')

    select.empty()

    select.append('<option value="">Selecione</option>')

    data.forEach(item=>{
        select.append(`<option value="${item.id}">${item.descricao}</option>`)
    })
    
}