@extends('user.layout')

@section('content')

@if ((auth()->check()))
    <script>window.location = "{{ route('products.index') }}";</script>
@else


<div class="col-lg-12 margin-tb" style="padding-top: 12px;">
    <div style="width: 100%; display:flex; flex-direction:row; justify-content:center; height:40px; gap: 100px;">
    <h2>Cadastro</h2>
        <a class="btn btn-primary" href="{{ route('login') }}"> Login</a>
    </div>
    <div style="height:8px;">
</div>

@if ($errors->any())
    <div id="alert-message" style="display:flex; flex-direction:row; justify-content:center;" >
        <div class="alert alert-danger" style="width:50%;">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </div>
    </div>

    <script>
            setTimeout(function(){
                document.getElementById('alert-message').remove();
            }, 2000);
        </script> 
@endif

<form action="{{ route('user.update') }}" method="POST">
@csrf

<div style="gap: 24px; display:flex; flex-direction:column; align-items: center;">
    <div class="col-xs-12 col-sm-12 col-md-12" style="width: 50%;">
        <div class="form-group">
            <div style="width:100%; display:flex; flex-direction:row; justify-content:flex-start; padding-left: 1px;">
                <strong>Nome:</strong>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Nome">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="width: 50%;">
        <div class="form-group">
            <div style="width:100%; display:flex; flex-direction:row; justify-content:flex-start; padding-left: 1px;">
                <strong>E-mail:</strong>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="width: 50%;">
        <div class="form-group">
            <div style="width:100%; display:flex; flex-direction:row; justify-content:flex-start; padding-left: 1px;">
                <strong>Password:</strong>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Criar</button>
    </div>
</div>
   
</form>
@endif

@endsection