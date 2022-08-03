@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Contrle de Contas >> Cadastrar</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('contas.store') }}" method="POST">

                @csrf

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">

                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="tipoConta" value="R" class="form-check-input">
                                        <label class="form-check-label" for="customRadio3">Conta a <strong>RECEBER</strong></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="tipoConta" value="P" class="form-check-input">
                                        <label class="form-check-label" for="customRadio4">Conta a <strong>PAGAR</strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="discriminacao" class="form-label">Discriminação:</label>
                                        <input type="text" autofocus id="discriminacao" name="discriminacao" class="form-control" @isset($discriminacao)value="{{ old('discriminacao') }}" @endisset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label">Valor de Custo (R$)</label>
                                    <input type="text" id="valor" name="valor" class="form-control" data-toggle="input-mask" data-mask-format="#.##0,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "#.##0,00"</span>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 position-relative" id="dataVencimento">
                                        <label class="form-label">Data do vencimento</label>
                                        <input type="text" name="dataVencimento" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-container="#dataVencimento">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="observacao" class="form-label">Outras informações:</label>
                                        <textarea class="form-control" id="observacao" name="observacao" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                </div>
                <!-- end card body-->

                <!-- footer card -->
                <div class="card-footer d-flex flex-row-reverse">
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('contas.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <!-- end footer card -->

            </form>
        </div>

    </div>
</div>

@endsection
