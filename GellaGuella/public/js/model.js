function somenteNumeros(num) {
    var er = /[^0-9.,]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

$('#cep').mask('00000-000');
$('#profit').mask("#.##0,00", {
    reverse: true
});

$('#minimum').mask("#.##0,00", {
    reverse: true
});

$('#cep').change(async () => {
    let req = await fetch("https://viacep.com.br/ws/" + $('#cep').val() + "/json/");
    let response = await req.json();
    $('#street').val(response.logradouro);
    $('#city').val(response.localidade);
    $('#district').val(response.uf);
});

$('#file').change((evt) => {
    $('.btn-save').css('display', 'none');
    $('.images').remove();
    $('#fileLabel').html('Selecionar imagens');
    $('#container-images').css('display', 'none');
    if (evt.target.files.length == 1) {
        $('.btn-save').css('display', 'block');
        $('#fileLabel').html('Imagem selecionada');
        preview(evt);
    } else if (evt.target.files.length > 1) {
        $('.btn-save').css('display', 'block');
        $('#fileLabel').html('Imagens selecionadas');
        preview(evt);
    }
})

// Preview das imagens

const preview = (evt) => {
    $('#container-images')[0].classList.add('d-none');
    if (evt.target.files.length == 0) return;
    $('#container-images').append("<div class='images'></div>");
    $('.images').css('width', '100%');
    for (let i = 0; i < evt.target.files.length; i++) {
        let img = new Image();
        let file = evt.target.files[i];
        img.src = URL.createObjectURL(file);
        img.onload = () => {
            if ((img.naturalWidth % 16) == 0 && (img.naturalHeight % 9) == 0 &&
                (img.naturalWidth > img.naturalHeight)) {
                $('#erro').css('display', 'none');
                $('#container-images').css('display', 'block');
                $('#container-images')[0].classList.remove('d-none');
                let divImage = $('.images');
                divImage.append(img);
            } else {

                // Imagem nao pode ser utilizada

                $('.btn-save').css('display', 'none')
                $('#erro').css('display', 'block')
                $('#erro').html("Só é válido imagem paisagem 16:9, imagem: {" + file.name + "}.");
                $('#fileLabel').html(`imagem {${file.name}} incompatível`);
            }
        }
    }
}

const getStates = async () =>{
    let states = document.querySelector('#district');
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

