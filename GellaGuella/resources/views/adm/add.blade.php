@extends('adminlte::page')
@section('title', 'ADM | Gella Guella')

@section('content')
    @include('adm.messageError')

    <h3 class="title">Cadastre uma nova filial</h3>

    <div class="container-master">
        <div class="form" id="form">
            <div class="error" id="erro"></div>
            <form id="form-submit" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <input maxlength="30" type="text" id="name" name="name" placeholder="Nome *" value="{{old('name')}}">
                <div class="address-1">
                    <input id="cep" maxlength="9" type="text" name="cep" placeholder="CEP *">
                    <input id="number" maxlength="5" type="number" name="number" placeholder="Numero *">
                    <select name="district" id="district">
                        <option value="null">Estado *</option>
                        <option value="SP">SP</option>
                        <option value="RJ">RJ</option>
                        <option value="SC">SC</option>
                    </select>  
                </div>
                <div class="address-2">
                    <input id="city" maxlength="30" type="text" name="city" placeholder="Cidade *">
                    <input id="street" maxlength="50" type="text" name="street" placeholder="Logradouro *">
                </div>
                <div class="money">
                    <input id="profit" maxlength="12" type="text" name="profit" onkeyup="somenteNumeros(this)" placeholder="Margem de Lucro (R$)">
                    <input id="minimum" maxlength="12" type="text" name="minimum" onkeyup="somenteNumeros(this)" placeholder="Investimento mínimo (R$) *">
                </div>
                <input id="file" type='file' name='images[]' hidden accept="image/*" multiple='multiple'/>
                <textarea name="desc" id="desc"  rows="10" placeholder="Descrição *"></textarea>
                <label id="fileLabel" for="file">Selecionar imagens *</label>
                <input type="submit" id="button" value="Cadastrar"/>
            </form>
        </div>
      
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/adm/admPanel.css">
    <link rel="stylesheet" href="/css/adm/admAdd.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/jquery.mask.js"></script>
    <script>

        function somenteNumeros(num) {
            var er = /[^0-9.,]/;
            er.lastIndex = 0;
            var campo = num;
            if(er.test(campo.value)) {
                campo.value = "";
            }
        }

        // Masks

        $(document).ready(() =>{

            $('#cep').mask('00000-000');
            $('#profit').mask("#.##0,00", {reverse: true});
            $('#minimum').mask("#.##0,00", {reverse: true});
            $('#cep').change(async() =>{
                let req = await fetch("https://viacep.com.br/ws/" + $('#cep').val() + "/json/");
                let response = await req.json();
                $('#street').val(response.logradouro);
                $('#city').val(response.localidade);
                if(response.uf == 'SP'){
                    $('#district').val('SP');
                }else if(response.uf == 'RJ'){
                    $('#district').val('RJ');
                }else if(response.uf == 'SC'){
                    $('#district').val('SC');
                }
            });

            $('#file').change((evt) =>{
                $('.images').remove();
                $('#erro').css('display','none');
                $('.li-erro').remove();
                $('#fileLabel').html('Selecionar imagens *')
                if(evt.target.files.length == 1){
                    $('#fileLabel').attr('class', 'fileSel');
                    $('#fileLabel').html('Imagem selecionada');
                    $('#fileLabel').css('color', 'green');
                    preview(evt);
                }else if(evt.target.files.length > 1){
                    $('#fileLabel').attr('class', 'fileSel');
                    $('#fileLabel').html('Imagens selecionadas');
                    $('#fileLabel').css('color', 'green');
                    preview(evt);
                }
            })

            // Preview das imagens

            const preview = (evt) =>{
                if(evt.target.files.length == 0) return;
                $('#form').append("<div class='images'></div>");
                $('.images').css('width', '100%');
                for (let i = 0; i < evt.target.files.length; i++) { 
                    let img = new Image();
                    let file = evt.target.files[i];
                    img.src = URL.createObjectURL(file);
                    img.onload = () =>{
                        if((img.naturalWidth % 16) == 0 && (img.naturalHeight % 9) == 0 
                        && (img.naturalWidth > img.naturalHeight)){
                            $('#erro').css('display', 'none')
                            let divImage = $('.images');
                            divImage.css('display', 'block');
                            img.style.padding = '5px 0';
                            img.style.borderRadius = '10px';
                            img.style.width = '10%';
                            divImage.append(img);
                        }else{

                            // Imagem nao pode ser utilizada

                            $('#erro').css('display', 'block')
                            $('#erro').html("Só é válido imagem paisagem 16:9, imagem: {" + file.name + "}.");
                            $('#fileLabel').css('color', 'red');
                            $('#fileLabel').html(`imagem {${file.name}} incompatível`);
                        }
                    }
                }
            }

            // States

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


            // String values to double

            $('#form-submit').submit(() =>{
                let minimum = $('#minimum').val()
                let profit = $('#profit').val()

                $('input[name=minimum]').val(
                    parseFloat(minimum.replace(/\./g,'').replace(',', '.')))
                    
                $('input[name=profit]').val(
                    parseFloat(profit.replace(/\./g,'').replace(',', '.')))
            })
        })
    </script>
@stop