<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADM | Gella Guella</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/util.css">
    <link rel="stylesheet" href="/css/adm/admModel.css">
</head>

<body>

    {{-- Header --}}

    @include('adm.messageError')
    <section class="container-header-info">
        <div class="container-carousel">
            @php $isFirst = true; @endphp
            <div id="arrow" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($branch->images as $image)
                    @if($isFirst == true)
                    @php $isFirst = false; @endphp
                    <div class="carousel-item active" >
                        <img src="/storage/{{$image->pathImage}}" class="d-block w-100">
                    </div>
                    @else
                    <div class="carousel-item">
                        <img src="/storage/{{$image->pathImage}}" class="d-block w-100">
                    </div>
                    @endif
                    @endforeach
                </div>
                @if(sizeof($branch->images) > 1)
                <a class="carousel-control-prev" href="#arrow" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span></a>

                <a class="carousel-control-next" href="#arrow" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span></a>
                @endif
            </div>
        </div>
        <div class="detail">
            <div class="wrapper-details">
                <h3>{{$branch->branchName}}</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quod aliquam commodi neque quo nulla error quam a aperiam
                    consequatur ducimus sequi, ratione, quasi nesciunt. Nam neque
                    officiis expedita libero earum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quod aliquam commodi neque quo nulla error quam a aperiam
                    consequatur ducimus sequi, ratione, quasi nesciunt. Nam neque
                    officiis expedita libero earum.</p>
            </div>
        </div>
    </section>

    {{-- Form --}}

    <section class="wrapper-form">
        <div class="container-form">
            <div class="form" id="form">
                <form action="" method="POST" autocomplete="off">
                    @csrf
                    <input value="{{$branch->branchName}}" maxlength="30" type="text" name="name" id="name"
                        placeholder="Nome" required>
                    <div class="adress-1">
                        <input value="{{$branch->branchNumber}}" id="number" maxlength="5" type="number" name="number"
                            placeholder="Núm." required>
                        <input value="{{$branch->branchCep}}" id="cep" maxlength="30" type="text" name="cep"
                            placeholder="Cep" required>
                        <select name="district" id="district">
                            <option value="{{$branch->branchDistrict}}">{{$branch->branchDistrict}}</option>
                        </select>
                    </div>
                    <div class="adress-2">
                        <input value="{{$branch->branchStreet}}" id="street" maxlength="30" type="text" id="street"
                            placeholder="Rua" required>
                        <input value="{{$branch->branchCity}}" id="city" maxlength="30" type="text" name="city"
                            placeholder="Cidade" required>
                    </div>
                    <div class="money">
                        <input value="{{$branch->branchProfitMargin}}" onkeyup="somenteNumeros(this)" id="profit"
                            maxlength="12" type="text" name="profit" placeholder="Margem de Lucro (R$)">
                        <input value="{{$branch->branchMinimumInvestment}}" onkeyup="somenteNumeros(this)" id="minimum"
                            maxlength="12" type="text" name="minimum" placeholder="Investimento mínimo (R$)" required>
                    </div>
                    <textarea name="desc" id="" cols="30" rows="10"
                        placeholder="Descrição">{{$branch->branchDesc}}</textarea>
                    <input type="submit" value="Alterar" />
                </form>
            </div>
        </div>
    </section>

    {{-- Imagens já cadastradas --}}

    <section class="wrapper-container-image">

        @if(sizeof($branch->images) == -1)
        <div class="wrapper-image">
            @else
            <div class="wrapper-image">
                @endif
                <div class="container-image">
                    @foreach($branch->images as $image)
                    <div class="branch-image">
                        <a class="icon" href="{{route('deleteImage', $image->id)}}">Apagar</a>
                        <img src="/storage/{{$image->pathImage}}">
                    </div>
                    @endforeach
                </div>
            </div>
    </section>

    {{-- Add nova imagem --}}

    <li style="display: none; width: 100%; padding: 5px; font-size: .9em; background-color: rgba(235, 53, 53, 0.911); margin: 10px 0"
        id="erro"></li>
    
    <form action="{{Route('addImage', $branch->id)}}" method="POST" enctype="multipart/form-data"
        class="wrapper-buttons">
        @csrf
        <div class="left-container-btn">
            <label id="fileLabel" for="file" class="btn btn-add">Adicionar imagem</label>
            <input id="file" type="file" name="images[]" hidden accept="image/*" multiple='multiple' value="Adicionar imagem">
        </div>
        <div class="right-container-btn">
            <label for="save" class="btn btn-save">Salvar alterações</label>
            <input id="save" hidden type="submit" value="Salvar alterações">
        </div>
    </form>

    <div id="container-images" class="d-none">

    </div>

    <section class="wrapper-delete">
        <a href="{{route('deleteBranch', $branch->id)}}">
            <label class="btn btn-delete" for="delete">Apagar filial</label>
            <button id="delete" hidden></button>
        </a>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/jquery.mask.js"></script>
    <script src="/js/model.js"></script>
</body>
</html>