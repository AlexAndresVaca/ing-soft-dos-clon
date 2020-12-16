@extends('plantilla')
@section('gProductos_active')
active
@endsection
@section('nav')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
    </ol>
</nav>
@endsection
@section('main')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- DONDE SE ENCUENTRA -->
        <h1 class="h3 mb-0 text-gray-800">Gestión Productos</h1>
    </div>
    <!-- Agregar  -->
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <button type="button" class="btn btn-primary my-4" data-toggle="modal"
                data-target="#registrarProductoModal">
                <i class="fas fa-boxes"></i>
                Nuevo Producto
            </button>
        </div>
    </div>
    <!-- CUANDO REGISTRE UN NUEVO PRODUCTO -->
    @if(session('producto_creado') === TRUE)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registro realizado!</strong> se ha agregado un producto de manera exitosa.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-danger">Lista de productos</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-gym table-dark table-bordered" id="productos" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#COD</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th class="text-center w-150px"><i class="fas fa-info-circle"></i> Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listaProductos as $item)
                        <tr>
                            <td>{{$item->cod_prod}}</td>
                            <td>{{$item->detalle_prod}}</td>
                            <td>{{$item->stock_prod}}</td>
                            <td><a href="{{route('productos.detalles',$item)}}"
                                    class="btn btn-sm btn-primary d-block mx-auto w-75px">Detalles</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')
<div class="modal fade" id="registrarProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('productos.new')}}" method="POST" autocomplete="off">
                    @CSRF
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" class="form-control " placeholder="Nombre el producto" value="{{old('detalle_prod')}}" name="detalle_prod">
                            @if($errors->has('detalle_prod'))
                            <div class="ml-1 text-danger">
                                {{$errors->first('detalle_prod')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Stock inicial" value="0" name="stock_prod">
                            @if($errors->has('stock_prod'))
                            <div class="ml-1 text-danger">
                                {{$errors->first('stock_prod')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@if($errors->any())
<script>
$(document).ready(function() {
    $("#registrarProductoModal").modal("show");
});
</script>
@endif
@endsection