@extends('layouts.app')




@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de Categorias</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">

            <!-- card body-->
            <div class="card-body ">
                <div class="row">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo:</label>
                                <input type="text" disabled id="titulo" name="titulo" class="form-control" value="{{ $categoria->titulo }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="checkbox" disabled data-switch="success" id="situacao" name="situacao" class="form-control" checked="{{ $categoria->situacao }}">
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
                </div>
            </div>
            <!-- end footer card -->

        </div>

    </div>
</div>

@endsection
