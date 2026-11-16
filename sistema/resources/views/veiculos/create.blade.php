<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Veículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Cadastrar Veículo</h2>
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

        <form action="/veiculos" method="POST">

            @csrf

            <div class="mb-3">
                <label>Cliente:</label>

                <select name="cliente_id" class="form-select" required>

                    <option value="">Selecione um cliente</option>

                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nome }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Marca:</label>
                <input type="text" name="marca" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Modelo:</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Placa:</label>
                <input type="text" name="placa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Ano:</label>
                <input type="number" name="ano" class="form-control">
            </div>

            <button class="btn btn-success">Salvar</button>

            <a href="/veiculos" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>

</body>

</html>
