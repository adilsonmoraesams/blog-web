@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de Produtos >> Editar</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('produto.update',$produto->id) }}" method="POST">

                @csrf
                @method('PUT')

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">
                        @csrf
                        <div class="col-xl-6">

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ $produto->nome }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="fornecedor_id" name="fornecedor_id" aria-label="Selecione o fornecedor">
                                            <option value="">...</option>
                                            @foreach ( $fornecedores as $fornecedor )
                                            <option @if($fornecedor->id == $produto->fornecedor_id) selected @endif value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                                            @endforeach
                                        </select>
                                        <label for="tipo">Fornecedor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <select class="form-select" id="tipo" name="tipo" aria-label="Floating label select example">
                                            <option value="">...</option>
                                            <option
                                            @if(1==$produto->tipo) selected @endif
                                            value="1">Milhas</option>
                                            <option @if(2==$produto->tipo) selected @endif value="2">Fixo</option>
                                        </select>
                                        <label for="tipo">Tipo de Produto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label">Valor de Custo (R$)</label>
                                    <input id="valor" name="valor" type="text" value="{{ $produto->valor }}" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cotar" class="form-label">Coatar em:</label>
                                    <input type="text" autofocus id="cotar" name="cotar" class="form-control" value="{{ $produto->cotar }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Detalhes:</label>
                                    <textarea type="text" rows="5" id="detalhes" name="detalhes" class="form-control">{{ $produto->detalhes }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="regras" class="form-label">Regras:</label>
                                    <textarea type="text" rows="5" id="regras" name="regras" class="form-control">{{ $produto->regras }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-row-reverse">
                            <div class="mb-3 ">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" @if($produto->ativo == true) checked @endif  name="ativo" id="ativo">
                                    <label class="form-check-label" for="ativo">Ativo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body-->

                    <!-- footer card -->
                    <div class="card-footer d-flex flex-row-reverse">
                        <div class="d-grid gap-2 d-md-block ">
                            <a href="{{ route('produto.index') }}" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                    <!-- end footer card -->

            </form>
        </div>

    </div>
</div>



@endsection
