<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Oficina Mecânica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card p-4">

                <h2 class="text-center mb-4">Oficina Mecânica</h2>

                <h5 class="text-center mb-3">Entrar no sistema</h5>

                @if($errors->any())
                    <div class="alert alert-danger">
                        E-mail ou senha incorretos.
                    </div>
                @endif

                <form action="/login" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label>E-mail:</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Senha:</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Entrar
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>