function responseValidationMessage(errors, form)
{
    let contentMessage = document.createElement('div')
    contentMessage.classList.add('alert', 'alert-danger', 'alert-dismissible', 'fade', 'show', 'my-3', 'col-sm-12')
    contentMessage.setAttribute('role', 'alert')

    for (const property in errors) {
        let span = document.createElement('li')
        span.textContent = errors[property]
        span.classList.add('d-block')
        contentMessage.appendChild(span)
    }

    let button = document.createElement('button')
    button.setAttribute('type', 'button')
    button.setAttribute('data-bs-dismiss', 'alert')
    button.setAttribute('aria-label', 'Close')
    button.classList.add('btn-close')

    contentMessage.appendChild(button)

    form.insertBefore(contentMessage, form.firstChild)

    setTimeout(() => {
        form.querySelector('.alert-danger').remove()
    }, 5000);
}

function responseSuccessMessage(form){
    let button = form.querySelector('button[type="submit"]')
    button.textContent = 'Enviado'

    setTimeout(() => {
        button.textContent = 'Enviar'
    }, 10000);
}

function responseErrorMessage(form)
{
    let button = form.querySelector('button[type="submit"]')
    button.textContent = 'debe completar los datos'

    setTimeout(() => {
        button.textContent = 'Enviar'
    }, 2000);
}

// Crear el nodo nuevo
let contentDuplicate = document.querySelector('.contentDuplicate')
let btnDuplicate = document.querySelector('.btnDuplicate')
let count = 0

btnDuplicate.addEventListener('click', function(e){
    e.preventDefault()
    count = count + 1
    let d = document.querySelector('.duplicate').cloneNode(true)

    d.classList.add('mt-2')
    // Sacar los label del nuevo componente
    d.querySelectorAll('label').forEach(element => {
        element.remove()        
    })

    // setear los valores del nuevo nodo
    let cantidad = d.querySelector('.cantidad')
    let m1 = d.querySelector('.medida1')
    let m2 = d.querySelector('.medida2')
    cantidad.setAttribute('name', `data[${count}][cantidad]`)
    cantidad.value = ''
    m1.setAttribute('name', `data[${count}][medida1]`)
    m1.value = ''
    m2.setAttribute('name', `data[${count}][medida2]`)
    m2.value = ''

    // crear el boton para que se elimine el nodo
    let button = document.createElement('button')
    button.setAttribute('class', 'duplicateDelete btn btn-danger btn-sm far fa-trash-alt rounded-circle')
    d.appendChild(button)

    // agregar el componente nuevo
    contentDuplicate.appendChild(d)
})


let inputsModelo = document.querySelectorAll('input[name="modelo"]')
inputsModelo = Object.values(inputsModelo)

/* button 1 next */
let btn1 = document.getElementById('btnSiguienteSeccion1')
btn1.addEventListener('click', function(e){
    let isCheckedModelo = inputsModelo.filter(element => element.checked)
    let values = [];
    let inputsNumber = document.querySelectorAll('.contentDuplicate input[type="number"]')

    /* validate model */
    inputsNumber.forEach(element => {
        if(element.value > 0) values.push(element.value)
    })

    /* next action */
    if(isCheckedModelo.length && values.length > 2){
        let btn = this
        let content = this.closest('.seccion')
        content.classList.remove('d-none')
        content.classList.add('d-none')

        let actContent = document.querySelector(`#${btn.dataset.mover}`)
        actContent.classList.remove('d-none')
        actContent.classList.add('d-block')
    }else{
        this.textContent = "Llenar los datos"
        setTimeout(() => {
            this.textContent = "Siguiente"
        }, 2000);
    }
})

/* button 2 next */
let btn2 = document.getElementById('btnSiguienteSeccion2')
let inputPuerta = document.getElementById('puerta') 
let localidad = document.getElementById('localidad')  
btn2.addEventListener('click', function (){
    let btn = this
    let content = this.closest('.seccion')
    content.classList.remove('d-none')
    content.classList.add('d-none')

    let actContent = document.querySelector(`#${btn.dataset.mover}`)
    actContent.classList.remove('d-none')
    actContent.classList.add('d-block')

    if (inputPuerta.checked) {
        localidad.classList.add('d-block')
        localidad.classList.remove('d-none')
    }else{
        localidad.classList.add('d-none')
        localidad.classList.remove('d-block')     
    }
})

/* button back */
let back = document.querySelectorAll('.back')
back.forEach(element => {
    element.addEventListener('click', function(e){
        e.preventDefault()
        let btn = this
        let content = this.closest('.seccion')
        content.classList.remove('d-none')
        content.classList.add('d-none')

        let actContent = document.querySelector(`#${btn.dataset.mover}`)
        actContent.classList.remove('d-none')
        actContent.classList.add('d-block')     
    })
});

/* validate form */
const form = document.getElementById('cotizadorOnline')
form.addEventListener('submit', function(e){
    e.preventDefault()
    let form = e.currentTarget
    let formData = new FormData(form)
    form.querySelector('button[type="submit"]').textContent = 'Enviando correo'
    axios.post(form.getAttribute('action'), formData).then(r => {
        form.querySelector('button[type="submit"]').textContent = r.data.message
    }).catch(error =>{
        if(error.response){
            if(error.response.status == 422)
                responseValidationMessage(error.response.data.errors, form)
        }    
    })
})

let mecanismo = document.getElementById('mecanismo')
let controlRemoto = document.getElementById('control_remoto')
let inputElectrico = document.getElementById('electrica')

mecanismo.addEventListener('click', function(e){
    if(inputElectrico.checked){
        controlRemoto.classList.remove('d-none')
        controlRemoto.classList.add('d-block')
    }else{
        controlRemoto.classList.remove('d-block')
        controlRemoto.classList.add('d-none')        
    }
})


// Eliminar el nuevo nodo
document.querySelector('.contentDuplicate').addEventListener('click', function(e){
    e.preventDefault()
    if (e.target.classList.contains('duplicateDelete')) e.target.closest('.duplicate').remove()

})

