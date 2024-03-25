@extends('products.layout')

@section('content')

@if (!(auth()->check()))
    <script>window.location = "{{ route('login') }}";</script>
@else

<div class="row">
    <div class="col-lg-12 margin-tb" style="padding-top: 12px;">
        <div style="width: 100%; display:flex; flex-direction:row; justify-content:space-between; height:40px;">
            <h2>Adicione seu novo livro</h2>
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<div style="height: 8px;"></div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Autor:</strong>
                <input type="text" name="autor" class="form-control" placeholder="Autor">
            </div>
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" class="form-control" placeholder="Titulo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Spinoff:</strong>
                <textarea class="form-control" style="height:150px" name="spinoff" placeholder="Spinoff"></textarea>
            </div>
        </div>
        <div style="height: 16px;"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>

@endif

@endsection