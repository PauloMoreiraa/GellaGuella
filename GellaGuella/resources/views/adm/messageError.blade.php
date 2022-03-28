<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>

    @import '/css/fonts.css';

    .swal2-timer-progress-bar{ background-color: rgb(53, 53, 53) }
    .swal2-icon { overflow-y: hidden !important; overflow-x: hidden !important; }

    .swal2-popup{
        background-color: #1d1d1d !important;
        -webkit-box-shadow: 5px 5px 5px 2px rgba(0,0,0,0.25) !important;
        -moz-box-shadow: 5px 5px 5px 2px rgba(0,0,0,0.25) !important;
        box-shadow: 5px 5px 5px 2px rgba(0,0,0,0.25) !important;
    }

    .swal2-title{
        color: rgb(221, 221, 221);
        font-family: Poppins-Thin; 
    }
           
</style>
<script>//
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        //backend nao aparece o console
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

@if(session()->has('swal_msg'))
    
    <script>
        not = @json(session()->pull("swal_msg"));
        Toast.fire({
            icon: not.type,
            title: not.message
        }).then(function(){
            {{ session()->forget('swal_msg') }}
            console.log({{session('smal_msg')}});
        })
    </script>
    @php    

        session()->forget('swal_msg'); 
    @endphp
@endif

{{-- Other way: --}}

{{-- @if($message = Session::get('swal_msg'))
    <script>                    
        Toast.fire({
            icon: 'error',
            title: '{{$message}}'
        })
    </script>
    @php 
        session()->forget('swal_msg'); 
     @endphp
@endif --}}

{{-- $.ajax({
    url: "{{route('slamano')}}",
    cache: false,
    success: function(data){
        sessionStorage.clear()
    },
}) --}}