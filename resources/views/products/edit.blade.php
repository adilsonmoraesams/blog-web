@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de products</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('products.update',$product->id) }}" method="POST">

                @csrf
                @method('PUT')

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome:</label>
                                    <input type="text" autofocus id="name" name="name" value="{{ $product->name }}" class="form-control" @isset($name)value="{{ old('name') }}" @endisset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Detalhes:</label>
                                    <textarea type="text" id="detail" name="detail" class="form-control">{{ $product->detail }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card body-->

                <!-- footer card -->
                <div class="card-footer d-flex flex-row-reverse">
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <!-- end footer card -->

            </form>
        </div>

    </div>
</div>



@endsection
