<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Veículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
    </div>
</nav>

<div class="container mt-4">

    <h2>Editar Veículo</h2>

    <form action="/veiculos/{{ $veiculo->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cliente:</label>

            <select name="cliente_id" class="form-select" required>

                @foreach($clientes as $cliente)

                    <option value="{{ $cliente->id }}"
                        {{ $veiculo->cliente_id == $cliente->id ? 'selected' : '' }}>

                        {{ $cliente->nome }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Marca:</label>
            <input type="text" name="marca" class="form-control"
                   value="{{ $veiculo->marca }}" required>
        </div>

        <div class="mb-3">
            <label>Modelo:</label>
            <input type="text" name="modelo" class="form-control"
                   value="{{ $veiculo->modelo }}" required>
        </div>

        <div class="mb-3">
            <label>Placa:</label>
            <input type="text" name="placa" class="form-control"
                   value="{{ $veiculo->placa }}" required>
        </div>

        <div class="mb-3">
            <label>Ano:</label>
            <input type="number" name="ano" class="form-control"
                   value="{{ $veiculo->ano }}">
        </div>

        <button class="btn btn-primary">Atualizar</button>

        <a href="/veiculos" class="btn btn-secondary">Voltar</a>

    </form>

</div>

</body>
</html>