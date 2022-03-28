<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('meta-tags')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
        <link rel="stylesheet" href="/fontawesome/css/all.css"> <!-- Icons -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> <!-- Flickity.css (slide) -->
        <link rel="stylesheet" href="/css/util.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/@yield('singleCss')">
    </head>
    <body>

        <header>

            {{-- Nav e etc... --}}
            
            <nav>
                <input type="checkbox" id="check">
                
                <label for="check" class="checkbtn">
                    <ion-icon name="menu"></ion-icon>
                </label>

                <label class="logo">Gella Guella</label>
                <ul id="list">
                    <li><a href="{{Route('home')}}">Início</a></li>
                    <li><a href="{{Route('about')}}">Sobre</a></li>
                    <li><a href="{{Route('branches')}}">Filiais</a></li>
                    <li><a href="{{Route('contact')}}">Contato</a></li>
                </ul>
            </nav>

            <div class="container-header"
                style="background-image: url('/images/@yield('path')'); padding:30px;">
                <h1>@yield('text')</h1>
            </div>


        </header>

        <section>

            @yield('content')
            @include('adm.messageError')

        </section>

        <footer>
            <div class="container-foo">
                <div class="detail-container">
                    <div class="helper-detail">
                        <h3 id="logo-anchor">Gella Guella</h3>
                        <div class="icons">
                            <div class="icon-wrapper">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </div>
        
                            <div class="icon-wrapper">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
        
                            <div class="icon-wrapper">
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="short-container">
                    <h3>Atalhos</h3>
                    <ul>
                        <li class="shortcut-link"><a href="{{Route('home')}}">Início</a></li>
                        <li class="shortcut-link"><a href="{{Route('about')}}">Sobre</a></li>
                        <li class="shortcut-link"><a href="{{Route('branches')}}">Filiais</a></li>
                        <li class="shortcut-link"><a href="{{Route('contact')}}">Contato</a></li>
                    </ul>
                </div>

                <div class="questions-container">
                    <h3>Perguntas Frequentes</h3>
                    <ul>
                        <li class="shortcut-link"><a href="{{Route('home')}}">Whatsapp</a></li>
                        <li class="shortcut-link"><a href="{{Route('about')}}">Mandar email</a></li>
                        <li class="shortcut-link"><a href="{{Route('branches')}}">Como funciona?</a></li>
                        <li class="shortcut-link"><a href="{{Route('contact')}}">Avalie-nos</a></li>
                    </ul>
                </div>

            </div>

            <div class="wave-credits"></div>

            <div class="credits">
                Developed by <a target="_blank" href="https://www.instagram.com/spacesoft.co/">SpaceSoft Co.</a>
            </div>
        </footer>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="/js/script.js"></script>
        @yield('javascript')
    </body>
</html>