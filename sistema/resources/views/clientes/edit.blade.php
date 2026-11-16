<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Editar Cliente</h2>

        <form action="/clientes/{{ $cliente->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
            </div>

            <div class="mb-3">
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" maxlength="11"
                    required>
            </div>

            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
            </div>

            <div class="mb-3">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" value="{{ $cliente->email }}">
            </div>

            <div class="mb-3">
                <label>Endereço:</label>
                <input type="text" name="endereco" class="form-control" value="{{ $cliente->endereco }}">
            </div>

            <button class="btn btn-primary">Atualizar</button>

            <a href="/clientes" class="btn btn-secondary">Voltar</a>

        </form>

    </div>

</body>

</html>
