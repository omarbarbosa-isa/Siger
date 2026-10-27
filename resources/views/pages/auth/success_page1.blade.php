<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGERES | Operação concluída</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous"
    >
</head>

<body class="login-page bg-body-secondary">

<main class="login-box">

    <h1 class="login-logo">
        <a href="{{ route('login') }}"><b>SIGERES</b></a>
    </h1>

    <div class="card card-outline card-success shadow">
        <div class="card-body login-card-body text-center">

            <div class="mb-3">
                <i
                    class="bi bi-check-circle-fill text-success"
                    style="font-size: 4rem;"
                ></i>
            </div>

            <h4 class="fw-bold mb-3">
                Operação concluída!
            </h4>

            <p class="text-secondary">
                {{ session('success_message', 'A operação foi concluída com sucesso.') }}
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-grid gap-2 mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Iniciar sessão
                </a>

                <a href="{{ route('landing.page') }}" class="btn btn-outline-secondary">
                    Voltar à página inicial
                </a>
            </div>

        </div>
    </div>

</main>

<script src="{{ asset('dist/js/adminlte.js') }}"></script>

</body>
</html>