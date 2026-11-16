<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Principal - Oficina Mecânica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Menu superior -->

    <nav class="navbar navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="/dashboard">
                Oficina Mecânica
            </a>

            <div class="text-white">

                Olá, {{ Auth::user()->name }}

                <form action="/logout" method="POST" class="d-inline">

                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                        Sair
                    </button>

                </form>

            </div>

        </div>

    </nav>


    <!-- Conteúdo principal -->

    <div class="container mt-5">

        <h2>Painel Principal</h2>

        <p>Bem-vindo ao sistema de gerenciamento da oficina mecânica.</p>


        <div class="row mt-4">


            <!-- Clientes -->

            <div class="col-md-4 mb-3">

                <div class="card shadow p-3">

                    <h4>Clientes</h4>

                    <p>Gerenciar os clientes cadastrados na oficina.</p>

                    <a href="/clientes" class="btn btn-primary">
                        Acessar Clientes
                    </a>

                </div>

            </div>


            <!-- Veículos -->

            <div class="col-md-4 mb-3">

                <div class="card shadow p-3">

                    <h4>Veículos</h4>

                    <p>Gerenciar os veículos cadastrados na oficina.</p>

                    <a href="/veiculos" class="btn btn-primary">
                        Acessar Veículos
                    </a>

                </div>

            </div>


            <!-- Agendamentos -->

            <div class="col-md-4 mb-3">

                <div class="card shadow p-3">

                    <h4>Agendamentos</h4>

                    <p>Gerenciar os serviços agendados na oficina.</p>

                    <a href="/agendamentos" class="btn btn-primary">
                        Acessar Agendamentos
                    </a>

                </div>

            </div>


        </div>

    </div>

</body>

</html>
