@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h2 class="page-title">Controle de Produtos</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="d-flex flex-row-start col">
                        <form action="{{ route('produto.index') }}" style="text-align:center" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Filtrar registros" aria-label="Filtrar registros" name="filtrar" id="filtrar" aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit">Filtrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex flex-row-reverse col">
                        <form>
                            <div class="input-group mb-3">
                                <a href="{{ route('produto.create') }}" class="btn btn-primary">
                                    Novo Produto
                                </a>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="tab-content">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th width="120">#</th>
                                    <th>Produto</th>
                                    <th width="230">Fornecedor</th>
                                    <th width="120">Ativo</th>
                                    <th width="220" style="text-align:center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                <tr>
                                    <td>
                                        {{ $produto->id }}
                                    </td>
                                    <td>
                                        {{ $produto->nome }}
                                    </td>
                                    <td>
                                        {{ $produto->fornecedor->nome }}
                                    </td>
                                    <td>
                                        <div>
                                            <input disabled type="checkbox" id="ativo" data-switch="success" @if($produto->ativo == true) checked @endif>
                                            <label for="ativo" data-on-label="Sim" data-off-label="Não" class="mb-0 d-block"></label>
                                        </div>
                                    </td>
                                    <td class="table-action ">
                                        <form action="{{ route('produto.destroy', $produto->id) }}" style="text-align:center" method="post">

                                            <a class="btn btn-info" href="{{ route('produto.show',$produto->id) }}"><i class="mdi mdi-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('produto.edit',$produto->id) }}"><i class="mdi mdi-pencil"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end tab-content-->

            </div>
            <!-- end card body-->

            <div class="card-footer">
                {{ $produtos->links('pagination::bootstrap-5') }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@endsection
