@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h2 class="page-title">Controle de Fornecedores</h2>
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
                        <form action="{{ route('fornecedor.index') }}" style="text-align:center" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Filtrar registros" aria-label="Filtrar registros" name="filtrar" id="filtrar" aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit">Filtrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex flex-row-reverse col">
                        <form>
                            <div class="input-group mb-3">
                                <a href="{{ route('fornecedor.create') }}" class="btn btn-primary">
                                    Novo Fornecedor
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
                                    <th>Fornecedor</th>
                                    <th width="240">Fone</th>
                                    <th width="220" style="text-align:center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>
                                        {{ $fornecedor->id }}
                                    </td>
                                    <td>
                                        {{ $fornecedor->nome }}
                                    </td>
                                    <td>
                                        {{ $fornecedor->fone }}
                                    </td>
                                    <td class="table-action ">
                                        <form action="{{ route('fornecedor.destroy', $fornecedor->id) }}" style="text-align:center" method="post">

                                            <a class="btn btn-info" href="{{ route('fornecedor.show', $fornecedor->id) }}"><i class="mdi mdi-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('fornecedor.edit',$fornecedor->id) }}"><i class="mdi mdi-pencil"></i></a>

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
                {{ $fornecedores->links('pagination::bootstrap-5') }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@endsection
