@extends('layouts.main')
@section('title', 'Contato | Gella Guella')

@section('path', 'contact.jpg')
@section('text', 'Entre em contato conosco!')
@section('singleCss', 'contact.css')
@section('meta-tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="background">
</div>
    <div id="main">
        <div id="cards">
            <div class="card">
                <div class="icon">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                </div>
                <div class="card-content">
                    <h3>Endereço</h3>
                    <p>Avenida São João Freitas Nº3245</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fas fa-phone fa-2x"></i>
                </div>
                <div class="card-content">
                    <h3>Telefone</h3>
                    <p>11 98645-9863</p>
                    <p>11 2558-9378</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="far fa-envelope fa-2x"></i>
                </div>
                <div class="card-content">
                   <h3>E-mail</h3>
                   <p>Emailgellaguella@gmail.com</p>
                </div>
            </div>
        </div>
        <div id="form">
            <form action="contact/sendEmail" method="POST" id="formulario">
                @csrf
                <h3>Mande sua mensagem</h3>

                <div class="alert-success d-none">
                    <li></li>
                </div>
                <div class="alert-error d-none"></div>

                <input type="text" id="name" name="nome" value="{{old('nome')}}" placeholder="Nome completo">
                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="E-mail">
                <input type="text" id="tel" maxlength="15" name="numero" value="{{old('numero')}}" placeholder="Telefone de contato" >
                <select id="states" class="select" name="estado" value="{{old('estado')}}">
                    <option value="null">Estados</option>
                    <option value="Outro">Outro</option>
                </select>
                <select id="capital" class="select"  name="capital" value="{{old('capital')}}">
                    <option value="null">Capital de investimento</option>
                    <option value="100 a 200 mil">R$ 100 mil a 200 mil</option>
                    <option value="200 a 300 mil">R$ 200 mil a 300 mil</option>
                    <option value="300 a 400 mil">R$ 300 mil a 400 mil</option>
                    <option value="400 a 500 mil">R$ 400 mil a 500 mil</option>
                    <option value="500 a 600 mil">R$ 500 mil a 600 mil</option>
                    <option value="600 a 700 mil">R$ 600 mil a 700 mil</option>
                    <option value="700 a 800 mil">R$ 700 mil a 800 mil</option>
                    <option value="800 mil ou mais">Acima de 800 mil</option>
                </select>
                <textarea id="message" name="mensagem" value="{{old('mensagem')}}" placeholder="Por que deseja abrir uma de nossas filiais Gella Guella?"></textarea>
                <button type="submit" id="button">Enviar mensagem</button>
            </form>
        </div>
    </div>   
    
@endsection
@section('javascript')
    <script src="js/jquery.mask.js"></script>
    <script src="js/contact.js"></script>
@endsection