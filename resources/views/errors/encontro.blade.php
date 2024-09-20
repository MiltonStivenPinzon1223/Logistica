@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div
                class="card text-white bg-primary"
            >
                <div class="card-body">
                    <h4 class="card-title">Error {{$error}}</h4>
                    <p class="card-text">{{$message}}</p> 
                </div>
            </div>
            
        </div>
        </form>
    </div>
</div>


<script>
    // Mostrar el mensaje durante 2 segundos y luego redirigir
    setTimeout(function() {
        window.location.href = '{{ route('events.index') }}';
    }, 2000); 
</script>
@endsection
