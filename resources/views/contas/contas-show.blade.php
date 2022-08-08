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
                                <input type="text" disabled class="form-control" value="{{ convert_money_brl( $contas->valor ) }}">
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

                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Forma Pgto</th>
                                        <th>Pago</th>
                                        <th>Taxas</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contas->movimentos as $movimento )
                                    <tr>
                                        <td class="table-user">
                                            {{ $movimento->descricao }}
                                        </td>
                                        <td class="table-user">
                                            {{ $movimento->formaPagamento->descricao }}
                                        </td>
                                        <td class="table-user">
                                            R$ {{ convert_money_brl( $movimento->valorPago ) }}
                                        </td>
                                        <td class="table-user">
                                            R$ {{ convert_money_brl( $movimento->valorTaxa) }}
                                        </td>
                                        <td class="table-user">
                                            R$ {{ convert_money_brl( $movimento->valor) }}
                                        <td>
                                            <form action="{{ route('movimento.destroy', $movimento->id) }}" style="text-align:center" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-pill">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>



                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            R$ {{ convert_money_brl( $movimento->sum('valor') ) }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

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

<div id="pagamento-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md"">
        <div class=" modal-content">
        <div class="modal-body">

            <div class="col-12">
                <div class="text-center mt-2 mb-4">
                    <h3>Inclusão de Pagamento</h3>
                </div>

                <form action="{{ route('movimento.store', $contas) }}" enctype="multipart/form-data" method="POST" class="ps-3 pe-3">

                    @csrf

                    <div class="row">
                        <div class="mb-3">
                            <label for="tipo">Forma de Pagamento</label>
                            <select class="form-select" id="forma_pagamento_id" name="forma_pagamento_id" aria-label="Floating label select example">
                                <option value="">...</option>
                                @foreach ($formaPagamento as $fpagamento )
                                <option value="{{ $fpagamento->id }}">{{ $fpagamento->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição do Pagamento</label>
                            <input class="form-control" type="text" name="descricao" id="descricao" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="valorPago" class="form-label">Valor Pago</label>
                                <input class="form-control" type="text" name="valorPago" id="valorPago">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="valorTaxa" class="form-label">Taxa</label>
                                <input class="form-control" type="text" name="valorTaxa" id="valorTaxa">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="taxa" class="form-label">Comprovante</label>
                            <input class="form-control" type="file" name="comprovante" required="require" id="comprovante">
                        </div>
                    </div>


                    <div class="row">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <p></p>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="col-6">

        </div> -->

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- plugin js -->
<script src="assets/js/vendor/dropzone.min.js"></script>
<!-- init js -->
<script src="assets/js/ui/component.fileupload.js"></script>

@endsection
