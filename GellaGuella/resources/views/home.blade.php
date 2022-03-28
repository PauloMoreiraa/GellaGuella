@extends('layouts.main')
@section('title', 'Gela Guela | Início')

@section('singleCss', 'home.css') {{-- css individual --}}
@section('path', 'bar1.jpg') {{-- background da header --}}
@section('text', 'Já pensou em se tornar um empresário?') {{-- texto da header --}}

@section('content')

    <!-- Informações -->
    
    <section class="container-master">
    
        <!-- Info 1 -->
    
        <div class="container-info">
            <div class="icon">
                <img class="anime-left" src="/images/drink.svg" alt="">
            </div>
            <div class="detail">
                <div class="wrapper-details anime-top">
                    <h3>Título 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quod aliquam commodi neque quo nulla error quam a aperiam 
                        consequatur ducimus sequi, ratione, quasi nesciunt. Nam neque 
                        officiis expedita libero earum.</p>
                </div>
            </div>
        </div>

        <!-- Info 2 -->
    
        <div class="wave-start-1"></div> <!-- Wave de cima -->
    
        <div class="container-info" id="info-diff">
            <div class="detail">
                <div class="wrapper-details anime-top">
                    <h3>Título 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quod aliquam commodi neque quo nulla error quam a aperiam 
                        consequatur ducimus sequi, ratione, quasi nesciunt. Nam neque 
                        officiis expedita libero earum.</p>
                </div>
            </div>
            <div class="icon">
                <img class="anime-right" src="/images/drink.svg" alt="">
            </div>
        </div>
    
        <div class="wave-end-1"></div> <!-- Wave de baixo -->

        <!-- Info 3 -->
    
        <div class="wrapper-third-section">
            <div class="container-info-diff">
                <h3 class="anime-top">Título 3</h3>
                <p class="anime-top">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quod aliquam commodi neque quo nulla error quam a aperiam 
                    consequatur ducimus sequi, ratione, quasi nesciunt. Nam neque 
                    officiis expedita libero earum.</p>
                    
            </div>
    
            <div class="image">
                <img class="anime-top" src="/images/drinks.png">
            </div>
        </div>

        <!-- Button area -->

        <div class="container-btn">
            <a href="{{Route('branches')}}"><button class="btn">Nossas filiais disponíveis</button></a>
        </div>
        
    </section>

@endsection