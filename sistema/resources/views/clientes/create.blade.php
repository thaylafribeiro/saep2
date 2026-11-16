<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Cadastrar Cliente</h2>
        @if ($errors->any())

            <div class="alert alert-danger">

                @foreach ($errors->all() as $erro)
                    <p>{{ $erro }}</p>
                @endforeach

            </div>

        @endif

        @if (session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
        @endif

        <form action="/clientes" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" maxlength="11" required>
            </div>

            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Endereço:</label>
                <input type="text" name="endereco" class="form-control">
            </div>

            <button class="btn btn-success">Salvar</button>

            <a href="/clientes" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>

</body>

</html>
