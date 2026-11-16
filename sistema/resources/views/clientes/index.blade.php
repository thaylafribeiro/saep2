<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Oficina Mecânica</a>
            <a href="/logout" class="text-white"> </a>
        </div>
    </nav>

    <div class="container mt-4">

        <h2>Clientes</h2>

        <a href="/dashboard" class="btn btn-secondary mb-3">Voltar</a>

        <a href="/clientes/create" class="btn btn-success mb-3">Novo Cliente</a>

        <form action="/clientes" method="GET" class="mb-3">

            <div class="input-group">

                <input type="text" name="busca" class="form-control" placeholder="Pesquisar cliente..."
                    value="{{ request('busca') }}">

                <button class="btn btn-primary">Pesquisar</button>

            </div>

        </form>

        <table class="table table-bordered table-striped bg-white">

            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->endereco }}</td>

                        <td>
                            <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

        {{ $clientes->links('pagination::bootstrap-5') }}

    </div>

</body>

</html>
