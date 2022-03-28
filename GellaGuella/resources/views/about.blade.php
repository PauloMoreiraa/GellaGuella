@extends('layouts.main')
@section('title', 'Sobre | Gella Guella')

@section('singleCss', 'about.css') {{-- css individual --}}
@section('path', 'bar2.jpg')
@section('text', 'Sobre a Gella Guella')

@section('content')

    <section class="container-master">

        {{-- Info 1 (Who are we?) --}}

        <div class="container-first-info">
            <div class="text-container">
                <h3 class="anime-left">Quem somos?</h3>
                <p class="anime-left">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Amet quia voluptates
                    fugiat ipsa eligendi tenetur, eius nobis
                    deleniti obcaecati iste non sapiente quis
                    expedita in itaque officia 
                    enim soluta illo?</p>
                <p class="anime-left">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Amet quia voluptates
                    fugiat ipsa eligendi tenetur, eius nobis
                    deleniti obcaecati iste non sapiente quis
                    expedita in itaque officia 
                    enim soluta illo?</p>
            </div>
            <div class="icon-container">
                <img src="/images/liquor.svg" alt="" srcset="">
            </div>
        </div>

        {{-- Brands --}}

        <div class="container-brands">
            <h3 class="anime-left">Algumas marcas com quais trabalhamos</h3>

            @php
                $brands = [
                    "budweiser" => "ic_budweiser",
                    "coca-cola" => "ic_coca-cola",
                    "imperio" => "ic_imperio",
                    "itaipava" => "ic_itaipava",
                    "jack" => "ic_jack",
                    "johnnie" => "ic_johnnie",
                    "skol" => "ic_skol",
                    "stella" => "ic_stella"
                ];
            @endphp

            <section class="slide anime-left">
                <div class="slide-brands" data-flickity='{ "autoPlay": true }'>
                    @foreach($brands as $brand)
                        <div 
                            class="slide-cell" 
                            style="background-image: url('../images/brands/{{$brand}}.png')"></div>
                    @endforeach
                </div>
            </section>
        </div>

        {{-- Wave --}}

        <div class="wave-end-slider"></div>

        {{-- Timeline --}}

        <div class="container-timeline">

            <h3 class="anime-top">Nossa História</h3>

            <div class="timeline">

                <div class="container-story left">
                  <div class="date">2007</div>
                  <i class="icon fa fa-home"></i>
                  <div class="content anime-top">
                    <h2>Evento 1</h2>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p><br>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p>
                  </div>
                </div>

                <div class="container-story right">
                  <div class="date">2009</div>
                  <i class="icon fa fa-gift"></i>
                  <div class="content anime-top">
                    <h2>Evento 2</h2>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p>
                  </div>
                </div>

                <div class="container-story left">
                  <div class="date">2015</div>
                  <i class="icon fa fa-user"></i>
                  <div class="content anime-top">
                    <h2>Evento 3</h2>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p>
                  </div>
                </div>

                <div class="container-story right">
                  <div class="date">2018</div>
                  <i class="icon fa fa-running"></i>
                  <div class="content anime-top">
                    <h2>Evento 4</h2>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p><br>
                    <p>Lorem ipsum dolor sit amet elit. 
                        Aliquam odio dolor, id luctus erat 
                        sagittis non. Ut blandit semper 
                        pretium</p>
                  </div>
                </div>

                <div class="container-story left">
                    <div class="date">2020</div>
                    <i class="icon fa fa-cog"></i>
                    <div class="content anime-top">
                        <h2>Evento 5</h2>
                        <p>Lorem ipsum dolor sit amet elit. 
                            Aliquam odio dolor, id luctus erat 
                            sagittis non. Ut blandit semper 
                            pretium</p>
                    </div>
                </div>

                <div class="container-story right">
                    <div class="date">2021</div>
                    <i class="icon fa fa-certificate"></i>
                    <div class="content anime-top">
                        <h2>Evento 6</h2>
                        <p>Lorem ipsum dolor sit amet elit. 
                            Aliquam odio dolor, id luctus erat 
                            sagittis non. Ut blandit semper 
                            pretium</p>
                    </div>
                </div>

            </div>

        </div>

    </section>  
    
@endsection