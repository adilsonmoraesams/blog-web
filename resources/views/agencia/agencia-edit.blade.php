@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de Agências >> Editar</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('agencia.update', $agencia) }}" method="POST">

                @csrf
                @method('PUT')

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ $agencia->nome }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label class="form-label">Responsável:</label>
                                <input type="text" id="responsavel" name="responsavel" value="{{ $agencia->responsavel }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label class="form-label">Telefone:</label>
                                <input type="text" id="fone" name="fone" value="{{ $agencia->fone }}" class="form-control" data-toggle="input-mask" data-mask-format="(00) 00000-0000">
                                <span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="5">{{ $agencia->descricao }}</textarea>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end card body-->

        <!-- footer card -->
        <div class="card-footer d-flex flex-row-reverse">
            <div class="d-grid gap-2 d-md-block ">
                <a href="{{ route('agencia.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        <!-- end footer card -->

        </form>
    </div>

</div>
</div>



@endsection
