```blade
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGERES | Confirmar código OTP</title>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >

    <style>
        .otp-input {
            letter-spacing: 12px;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }

        .login-box {
            width: 400px;
            max-width: 95%;
        }
    </style>
</head>

<body class="login-page bg-body-secondary">

<main class="login-box">

    <h1 class="login-logo">
        <a href="{{ url('/') }}"><b>SIGERES</b></a>
    </h1>

    <div class="card card-outline card-primary shadow">
        <div class="card-body login-card-body">

            <h5 class="login-box-msg fw-bold">
                Confirmação de Código OTP
            </h5>

            <p class="text-secondary text-center small">
                Insira o código de 6 dígitos enviado para:
                <br>
                <strong>{{ $email ?? session('email') }}</strong>
            </p>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('info'))
                <div class="alert alert-info" role="alert">
                    {{ session('info') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('otp.verify') }}" method="POST">
                @csrf

                <input
                    type="hidden"
                    name="email"
                    value="{{ $email ?? session('email') }}"
                >

                <div class="mb-3">
                    <label for="code" class="visually-hidden">
                        Código de verificação
                    </label>

                    <input
                        id="code"
                        type="text"
                        name="code"
                        class="form-control otp-input @error('code') is-invalid @enderror"
                        maxlength="6"
                        placeholder="••••••"
                        pattern="[0-9]{6}"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        required
                        autofocus
                    >

                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i>
                        Validar e Activar Conta
                    </button>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">

                <form action="{{ route('otp.resend') }}" method="POST">
                    @csrf

                    <input
                        type="hidden"
                        name="email"
                        value="{{ $email ?? session('email') }}"
                    >

                    <input
                        type="hidden"
                        name="type"
                        value="{{ $type ?? session('type', 'registration') }}"
                    >

                    <button type="submit" class="btn btn-link btn-sm text-secondary p-0">
                        <i class="bi bi-arrow-clockwise me-1"></i>
                        Reenviar código
                    </button>
                </form>

                <a href="{{ route('login') }}" class="btn btn-link btn-sm text-secondary p-0">
                    Voltar ao Login
                </a>

            </div>

        </div>
    </div>

</main>

<script src="{{ asset('dist/js/adminlte.js') }}"></script>

</body>
</html>
```