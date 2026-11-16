<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Veículos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Veículos</h2>

        <a href="/dashboard" class="btn btn-secondary mb-3">Voltar</a>

        <a href="/veiculos/create" class="btn btn-success mb-3">Novo Veículo</a>

        <table class="table table-bordered table-striped bg-white">

            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->cliente->nome }}</td>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->ano }}</td>

                        <td>
                            <a href="/veiculos/{{ $veiculo->id }}/edit" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

        {{ $veiculos->links('pagination::bootstrap-5') }}

    </div>

</body>

</html>
