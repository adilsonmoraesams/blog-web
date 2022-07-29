@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de usuarios</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">

                @csrf
                @method('PUT')

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" autofocus id="titulo" name="titulo" value="{{ $categoria->titulo }}" class="form-control" @isset($titulo)value="{{ old('titulo') }}" @endisset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input type="checkbox" data-switch="success" id="situacao" name="situacao" @if($categoria->situacao == true) checked @endif class="form-control" @isset($situacao)checked="{{ old('situacao') }}" @endisset>
                                    <label for="situacao" data-on-label="Sim" data-off-label="Não" class="mb-0 d-block"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body-->

                <!-- footer card -->
                <div class="card-footer d-flex flex-row-reverse">
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <!-- end footer card -->

            </form>
        </div>

    </div>
</div>



@endsection
