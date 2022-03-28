@extends('adminlte::page')
@section('title', 'ADM | Gella Guella')

@section('content')

    <h3 class="title">Suas filiais</h3>

    @if(sizeof($branches) == 0)
        <h3 class="flex-c m-t-200 fs-30 no-branches">Nenhuma filial registrada :/</h3>
    @else
        @if(sizeof($branches) == 1)
            <section class="container-master-single">
        @else
            <section class="container-master">
        @endif
            <div class="branch-cards">

                @foreach($branches as $branch)
                    <div class="branch-card">
                        <div class="container-carousel">
                            <a class="icon" href="{{route('model', $branch->id)}}"><i class="far fa-edit"></i></a>
                            @php $isFirst = true; @endphp
                            <div id="arrow{{$branch->id}}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($branch->images as $image)
                                        @if($isFirst == true)
                                            @php $isFirst = false; @endphp
                                            <div class="carousel-item active">
                                                <img src="/storage/{{$image->pathImage}}" 
                                                    class="d-block w-100">
                                            </div>   
                                        @else
                                            <div class="carousel-item">
                                                <img src="/storage/{{$image->pathImage}}" 
                                                    class="d-block w-100">
                                            </div>   
                                        @endif
                                    @endforeach
                                </div>
                                @if(sizeof($branch->images) > 1)
                                    <a class="carousel-control-prev" href="#arrow{{$branch->id}}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span></a>

                                    <a class="carousel-control-next" href="#arrow{{$branch->id}}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span></a>
                                @endif     
                            </div>
  
                        </div>
                        <div class="container-footer">
                            <h4>{{$branch->branchName}}</h4>
                            <p>{{$branch->branchDesc}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/adm/admPanel.css">
    <link rel="stylesheet" href="/css/adm/admBranches.css">
    <link rel="stylesheet" href="/css/util.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop