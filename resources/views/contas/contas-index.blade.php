@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h2 class="page-title">CONTAS</h2>
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
                        <form action="{{ route('contas.index') }}" style="text-align:center" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Filtrar registros" aria-label="Filtrar registros" name="filtrar" id="filtrar" aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit">Filtrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex flex-row-reverse col">
                        <form>
                            <div class="input-group mb-3">
                                <a href="{{ route('contas.create') }}" class="btn btn-primary">
                                    Nova Conta Receber/Pagar
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
                                    <th width="80">#</th>
                                    <th>Tipo</th>
                                    <th>Discriminação</th>
                                    <th width="140">Vencimento</th>
                                    <th width="140">Situação</th>
                                    <th width="140" class="text-center">Entrada</th>
                                    <th width="140" class="text-center">Saída</th>
                                    <th width="140" class="text-center">Pago</th>
                                    <th width="220" style="text-align:center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($contas as $conta)
                                <tr>
                                    <td>
                                        {{ $conta->id }}
                                    </td>
                                    <td>
                                        {{ $conta->getTipoConta() }}
                                    </td>
                                    <td>
                                        {{ $conta->discriminacao }}
                                    </td>
                                    <td>
                                        {{ $conta->dataVencimento }}
                                    </td>
                                    <td>
                                        <h4>
                                            @if ($conta->situacao == 0)
                                            <span class="badge bg-light text-dark">{{ $conta->getSituacao() }}</span>
                                            @endif

                                            @if ($conta->situacao == 1)
                                            <span class="badge bg-Warning text-dark">{{ $conta->getSituacao() }}</span>
                                            @endif

                                            @if ($conta->situacao == 2)
                                            <span class="badge bg-Success text-dark">{{ $conta->getSituacao() }}</span>
                                            @endif
                                        </h4>
                                    </td>
                                    <td class="text-center">
                                        @if ($conta->tipoConta == 'R')
                                        <span class="label-red">
                                            {{ 'R$ '.number_format($conta->valor, 2, ',', '.') }}
                                        </span>
                                        @else
                                        <span>-</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="color:red">
                                        @if ($conta->tipoConta == 'P')
                                        <span class="label-red">
                                            {{ 'R$ '.number_format($conta->valor, 2, ',', '.') }}
                                        </span>
                                        @else
                                        <span>-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        0
                                    </td>
                                    <td class="table-action ">
                                        <form action="{{ route('contas.destroy', $conta->id) }}" style="text-align:center" method="post">

                                            <a class="btn btn-info" href="{{ route('contas.show', $conta) }}"><i class="mdi mdi-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('contas.edit',$conta) }}"><i class="mdi mdi-pencil"></i></a>

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
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center">{{ 'R$ '.number_format( $entradas, 2, ',', '.') }}</th>
                                    <th class="text-center">{{ 'R$ '.number_format( $saidas, 2, ',', '.') }}</th>
                                    <th class="text-center">Pago</th>
                                    <th style="text-align:center"></th>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end tab-content-->

            </div>
            <!-- end card body-->

            <div class="card-footer">
                {{ $contas->links('pagination::bootstrap-5') }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<!--


<div class="row">
    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat border border-primary">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-currency-usd widget-icon bg-primary rounded-circle text-white"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Revenue">Contas a Receber</h5>
                <h3 class="mt-1 mb-1">
                    {{ 'R$ '.number_format( $entradas, 2, ',', '.') }}
                </h3>  <p class="mb-0 text-muted">
                    <span class="badge bg-info me-1">
                        <i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat bg-primary text-white ">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-currency-usd widget-icon  rounded-circle bg-white text-primary"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">RECEBIDOS</h6>
                <h3 class="mt-1 mb-1">36,254</h3>
                <p class="mb-0">
                <span class="badge badge-light-lighten me-1">
                    <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
        </div>
    </div>

    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat border border-danger">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-currency-usd-off widget-icon bg-danger text-white""></i>
                </div>
                <h5 class=" text-muted fw-normal mt-0" title="Growth">Contas a Pagar</h5>
                        <h3 class="mt-1 mb-1">
                            {{ 'R$ '.number_format( $saidas, 2, ',', '.') }}
                        </h3>
                        <p class="mb-0 text-muted">
                    <span class="text-success me-2">
                        <i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat bg-danger text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd-off widget-icon bg-white text-danger"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">PAGOS</h6>
                    <h3 class="mt-1 mb-1">36,254</h3>
                    <p class="mb-0">
                    <span class="badge badge-light-lighten me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
                </div>
            </div>
        </div>

    <div class="col-xxl-3 col-sm-6">
        <div class="card widget-flat bg-primary text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                </div>
                <h5 class="fw-normal mt-0" title="Revenue">Banco</h5>
                <h3 class="mt-3 mb-3 text-white">$10,245</h3>
                <p class="mb-0">
                    <span class="badge bg-info me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 17.26%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>end col-->
    </div>

    @endsection
