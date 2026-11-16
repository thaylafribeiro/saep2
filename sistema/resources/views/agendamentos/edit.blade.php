<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Agendamento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
    </div>
</nav>

<div class="container mt-4">

    <h2>Editar Agendamento</h2>

    <form action="/agendamentos/{{ $agendamento->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cliente:</label>

            <input type="text"
                   class="form-control"
                   value="{{ $agendamento->veiculo->cliente->nome }}"
                   disabled>
        </div>

        <div class="mb-3">
            <label>Veículo:</label>

            <input type="text"
                   class="form-control"
                   value="{{ $agendamento->veiculo->modelo }} - {{ $agendamento->veiculo->placa }}"
                   disabled>
        </div>

        <div class="mb-3">
            <label>Data e horário:</label>

            <input type="datetime-local"
                   name="data_agendamento"
                   class="form-control"
                   value="{{ $agendamento->data_agendamento->format('Y-m-d\TH:i') }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Descrição:</label>

            <textarea name="descricao"
                      class="form-control"
                      required>{{ $agendamento->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status:</label>

            <select name="status" class="form-select">

                <option value="Pendente"
                    {{ $agendamento->status == 'Pendente' ? 'selected' : '' }}>
                    Pendente
                </option>

                <option value="Em andamento"
                    {{ $agendamento->status == 'Em andamento' ? 'selected' : '' }}>
                    Em andamento
                </option>

                <option value="Concluído"
                    {{ $agendamento->status == 'Concluído' ? 'selected' : '' }}>
                    Concluído
                </option>

                <option value="Cancelado"
                    {{ $agendamento->status == 'Cancelado' ? 'selected' : '' }}>
                    Cancelado
                </option>

            </select>
        </div>

        <button class="btn btn-primary">Atualizar</button>

        <a href="/agendamentos" class="btn btn-secondary">Voltar</a>

    </form>

</div>

</body>
</html>