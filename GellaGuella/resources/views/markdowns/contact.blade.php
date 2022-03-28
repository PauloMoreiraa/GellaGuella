@component('mail::message')
# Nome do cliente {{$name}}
<hr>
Mensagem: " <strong>{{$message}}</strong>"
<hr>
Estado de <strong>{{$state}}</strong>
<hr>
Numero de telefone para contato <strong>{{$tel}}</strong>
<br>
<br>
E-mail eletrônico para contato <strong>{{$email}}</strong>
@component('mail::panel')
    Capital de investimento : <strong>R${{$capital}}</strong>
@endcomponent
 
@component('mail::subcopy')
    Em agradecimento, SpaceSoft.co
@endcomponent
@endcomponent
