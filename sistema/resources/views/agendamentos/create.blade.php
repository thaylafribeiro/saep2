<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Agendamento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Novo Agendamento</h2>
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

        <form action="/agendamentos" method="POST">

            @csrf

            <div class="mb-3">
                <label>Veículo e Cliente:</label>

                <select name="veiculo_id" class="form-select" required>

                    <option value="">Selecione um veículo</option>

                    @foreach ($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}">

                            {{ $veiculo->cliente->nome }}
                            -
                            {{ $veiculo->marca }}
                            {{ $veiculo->modelo }}
                            -
                            {{ $veiculo->placa }}

                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Data e horário:</label>

                <input type="datetime-local" name="data_agendamento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Descrição do serviço:</label>

                <textarea name="descricao" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Status:</label>

                <select name="status" class="form-select">

                    <option value="Pendente">Pendente</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Cancelado">Cancelado</option>

                </select>
            </div>

            <button class="btn btn-success">Salvar</button>

            <a href="/agendamentos" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>

</body>

</html>
