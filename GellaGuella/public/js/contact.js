
((doc, win) => {
    let states = doc.querySelector('#states');

    const getStates = async () =>{
        let req = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
        let response = await req.json();
        response.forEach(element => {
            let state = element.sigla;
            let op = document.createElement('option');
            op.setAttribute('value', state);
            op.appendChild(document.createTextNode(state));
            states.appendChild(op);
        }) 
    }  
    
    getStates();

    $('#tel').mask('(##) #####-####');

    let name, token, email, message, tel, capital, form;
    name = doc.querySelector('#name');
    token = doc.querySelector("input[name='_token']");
    email = doc.querySelector('#email');
    tel = doc.querySelector('#tel');
    state = doc.querySelector('#states');
    capital = doc.querySelector('#capital');
    message = doc.querySelector('#message');
    form = doc.querySelector('#formulario');

    form.addEventListener('submit', (evt) => { 
        evt.preventDefault();
        let erros=[];       
        let alert_error = doc.querySelector(`.alert-error`);
        alert_error.classList.add(`d-none`);

        if(alert_error.childNodes.length > 0) alert_error.childNodes[0].remove();
        
        const verifyField=(field, max=10, min=1) => {
            if(field.value == "null" || field.value.length == 0 || field.value.length > max || field.value.length < min || field.value == ""){
                field.classList.add(`invalid`);
                erros.push(`Campo ${field.name} invalido.`);
            }else{
                field.classList.remove(`invalid`);
            }
        }

        verifyField(name,100,3);
        verifyField(email,100,5);
        verifyField(tel,16,15);
        verifyField(state,30,1);
        verifyField(capital,30,1);
        verifyField(message,300,2);

        const clearFields=()=>{
            name.value = "";
            email.value = "";
            tel.value = "";
            state.value = "null";
            capital.value = "null";
            message.value = "";
            
        }

        if(erros.length == 0){
            let button = $("#button")[0];
            button.innerHTML="Carregando";   
            let i = doc.createElement(`i`);
            i.setAttribute(`class`, `ml-3 fas fa-circle-notch fa-spin`);
            button.appendChild(i);
            $.ajax({
                type: 'POST',
                url: 'contact/sendEmail',
                headers: 
                    {
                        "X-CSRF-TOKEN": token.value
                    },
                data: {
                    name: name.value,
                    email: email.value,
                    tel: tel.value,
                    state: state.value,
                    capital: capital.value,
                    message: message.value,
                },
                success: (res) => {
                    let response = JSON.parse(res);
                    if(response.message == "ok"){
                        let success = doc.querySelector(".alert-success");
                        success.classList.remove(`d-none`);
                        success.children[0].innerHTML = "E-mail enviado com sucesso!";
                        clearFields();
                    }     
                    button.innerHTML = "Enviar mensagem";
                }
            })            

        } else {
            alert_error.classList.remove(`d-none`);
            let div_li = doc.createElement(`div`);
            erros.forEach(element => {
                let li = doc.createElement(`li`);
                li.appendChild(doc.createTextNode(element));
                div_li.appendChild(li);
            });
            alert_error.appendChild(div_li);
        }

    })

})(document, window)
