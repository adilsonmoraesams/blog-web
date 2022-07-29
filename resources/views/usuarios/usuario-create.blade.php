@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                ?
            </div>
            <h4 class="page-title">Controle de Usuários</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                <!-- card body-->
                <div class="card-body ">
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome:</label>
                                    <input type="text" autofocus id="name" name="name" class="form-control" @isset($name)value="{{ old('name') }}" @endisset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail:</label>
                                    <select utofocus id="perfil_id" name="perfil_id" class="form-control">
                                        <option value="0">Usuário</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail:</label>
                                    <input type="text" autofocus id="email" name="email" class="form-control" @isset($email)value="{{ old('email') }}" @endisset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha:</label>
                                    <input type="password" autofocus id="password" name="password" class="form-control" @isset($password)value="{{ old('password') }}" @endisset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body-->

                <!-- footer card -->
                <div class="card-footer d-flex flex-row-reverse">
                    <div class="d-grid gap-2 d-md-block ">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <!-- end footer card -->

            </form>
        </div>

    </div>
</div>

@endsection
