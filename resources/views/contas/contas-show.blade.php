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
                                    <input type="text" disabled class="form-control" value="{{ $contas->discriminacao }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Valor de Custo (R$)</label>
                                <input type="text" disabled class="form-control" value="{{ $contas->valor }}">
                                <span class="font-13 text-muted">e.g "#.##0,00"</span>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 position-relative" id="dataVencimento">
                                    <label class="form-label">Data do vencimento</label>
                                    <input type="text" disabled class="form-control" value="{{ $contas->dataVencimento }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="observacao" class="form-label">Outras informações:</label>
                                    <textarea disabled class="form-control" id="observacao" name="observacao" rows="5">{{ $contas->observacao }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <fieldset>
                            <legend>
                                <h5>TABELA DE PAGAMENTO</h5>
                            </legend>

                            <div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pagamento-modal">Adicionar Pagamento</button>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- end card body-->

            <!-- footer card -->
            <div class="card-footer d-flex flex-row-reverse">
                <div class="d-grid gap-2 d-md-block ">
                    <a href="{{ route('contas.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
            <!-- end footer card -->

        </div>

    </div>
</div>


<!-- Signup modal PAGAMETNO -->


<div id="pagamento-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h3>Inclusão de Pagamento</h3>
                </div>

                <form class="ps-3 pe-3" action="#">

                    <div class="mb-3">
                        <label for="formaPagamento" class="form-label">Forma de Pagamento</label>
                        <input class="form-control" type="text" id="formaPagamento" name="formaPagamento" required="">
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Valor Pago</label>
                        <input class="form-control" type="email" id="emailaddress" required="">
                    </div>

                    <div class="mb-3">
                        <label for="taxa" class="form-label">Taxa</label>
                        <input class="form-control" type="text" required="" id="taxa">
                    </div>

                    <div class="mb-3">
                        <label for="taxa" class="form-label">Comprovante</label>
                        <input class="form-control" type="file" required="" id="taxa">
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn btn-primary">Salvar</button>
                        <p></p>
                        <button type="button" class="btn btn-default">Cancelar</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@endsection
