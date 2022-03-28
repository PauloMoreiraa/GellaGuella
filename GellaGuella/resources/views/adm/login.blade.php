<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/adm/admLogin.css">
        <link rel="stylesheet" href="/css/util.css">
        <title>Entrar | Gella Guella</title>
    </head>
    <body>
        @include('adm.messageError')
        <?php Session::forget('swal_msg'); ?>
        <div class="form">
            <h1 class="m-b-20 fs-25">Administração</h1>
            <form action="" method="POST" autocomplete="off">
                @csrf
                <input autocomplete="nope" maxlength="30" type="text" name="username" placeholder="Usuário" required>
                <input autocomplete="nope" maxlength="30" type="password" name="password" placeholder="Senha" required>
                <input type="submit" value="Entrar"/>
            </form>
            <a class="m-t-20 fs-15 flex-c" href="{{route('home')}}">Voltar</a>
        </div>
    </body>
</html>