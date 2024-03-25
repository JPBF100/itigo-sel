@extends('products.layout')

@section('content')

@if (!(auth()->check()))
    <script>window.location = "{{ route('login') }}";</script>
@else

<div class="row">
        <div class="col-lg-12 margin-tb" style="padding-top: 12px;">
            <div style="width: 100%; display:flex; flex-direction:row; justify-content:space-between; height:40px;">
                <h2> Seu livro</h2>
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div style="height: 8px;"></div>
    <div style="width: 100%; height:1px; background-color:black;"></div>
    <div style="height: 16px;"></div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $product->titulo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Autor:</strong>
                {{ $product->autor }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Spinoff:</strong>
                {{ $product->spinoff }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" 
        style="width: 100%; display: flex; justify-content: flex-end; align-items: center;
        padding-top: 64px;">
            <div class="form-group">
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                    <h1>Capa:</h1>
                </div>
                <img src="{{ $product->capa }}" style="width: 200px; height: 200px;"/>
            </div>
        </div>
    </div>

@endif

@endsection