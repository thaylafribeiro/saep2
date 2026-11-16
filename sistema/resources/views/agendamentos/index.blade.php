<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
    </div>
</nav>

<div class="container mt-4">

    <h2>Agendamentos</h2>

    <a href="/dashboard" class="btn btn-secondary mb-3">Voltar</a>

    <a href="/agendamentos/create" class="btn btn-success mb-3">
        Novo Agendamento
    </a>

    <table class="table table-bordered table-striped bg-white">

        <thead class="table-dark">
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Veículo</th>
                <th>Placa</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            @foreach($agendamentos as $agendamento)

            <tr>

                <td>
                    {{ $agendamento->data_agendamento->format('d/m/Y H:i') }}
                </td>

                <td>
                    {{ $agendamento->veiculo->cliente->nome }}
                </td>

                <td>
                    {{ $agendamento->veiculo->cliente->cpf }}
                </td>

                <td>
                    {{ $agendamento->veiculo->cliente->telefone }}
                </td>

                <td>
                    {{ $agendamento->veiculo->marca }}
                    {{ $agendamento->veiculo->modelo }}
                </td>

                <td>
                    {{ $agendamento->veiculo->placa }}
                </td>

                <td>
                    {{ $agendamento->descricao }}
                </td>

                <td>
                    {{ $agendamento->status }}
                </td>

                <td>
                    <a href="/agendamentos/{{ $agendamento->id }}/edit"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    {{ $agendamentos->links('pagination::bootstrap-5') }}

</div>

</body>
</html>