@extends('layouts.app')


@section('content')

<div class="row">
    <div class="page-title-box">
        <div class="page-title-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categorias.show', $categoria->id) }}">{{ $categoria->titulo }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SubCategoria</li>
                </ol>
            </nav>
        </div>
        <h4 class="page-title">Controle de subcategorias</h4>
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
                        <form action="{{ route('subcategorias.index', $categoria->id) }}" style="text-align:center" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Filtrar registros" aria-label="Filtrar registros" name="filtrar" id="filtrar" aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit">Filtrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex flex-row-reverse col">
                        <form>
                            <div class="input-group mb-3">
                                <a href="{{ route('subcategorias.create', $categoria->id) }}" class="btn btn-primary">
                                    Nova Categoria
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
                                    <th>Titulo</th>
                                    <th width="120">Ativo</th>
                                    <th width="220" style="text-align:center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategorias as $subcategoria)
                                <tr>
                                    <td>
                                        {{ $subcategoria->id }}
                                    </td>
                                    <td>
                                        {{ $subcategoria->titulo }}
                                    </td>
                                    <td>
                                        <div>
                                            <input disabled type="checkbox" id="situacao" data-switch="success" @if($subcategoria->situacao == true) checked @endif>
                                            <label for="situacao" data-on-label="Sim" data-off-label="Não" class="mb-0 d-block"></label>
                                        </div>
                                    </td>
                                    <td class="table-action ">
                                        <form action="{{ route('subcategorias.destroy', [$categoria->id, $subcategoria->id] ) }}" style="text-align:center" method="post">
                                            <a class="btn btn-primary" href="{{ route('subcategorias.edit',[$categoria->id, $subcategoria->id]) }}"><i class="mdi mdi-pencil"></i></a>

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
                {{ $subcategorias->links('pagination::bootstrap-5') }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


@endsection
