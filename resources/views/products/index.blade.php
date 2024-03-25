@extends('products.layout')

@section('content')

@if (!(auth()->check()))
    <script>window.location = "{{ route('login') }}";</script>
@else


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" style="display:flex; flex-direction:column; align-items:center; width:100%;">
            <h1>Bem vindo {{auth()->user()->name}}!!</h1>
            <p>Confira suas compras:</p>
        </div>
        <div class="pull-left" style="display:flex; flex-direction:row; justify-content:space-between; width:100%;">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Novo Livro</a>

            @csrf
            @method('DELETE')

            <a class="btn btn-danger" href="{{ route('user.destroy')}}"> Logout</a>
        </div>
    </div>
<div>
    <div style="height: 16px;"></div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="success-message">
            <p>{{ $message }}</p>
        </div>

        <script>
            setTimeout(function(){
                document.getElementById('success-message').remove();
            }, 2000);
        </script>   
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Titulo</th>
            <th>Spinoff</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->titulo }}</td>
            <td>{{ $product->spinoff }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Mais</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <p>Quantidade total de livros: {{$total}}</p>
  
    {!! $products->links() !!}

@endif

@endsection