```blade
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGERES | Redefinir Palavra-passe</title>

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

    <div class="card card-outline card-primary shadow">
        <div class="card-body login-card-body">

            <h4 class="login-box-msg fw-bold">
                Redefinir Palavra-passe
            </h4>

            <p class="text-secondary text-center small">
                Introduza o código de seis dígitos enviado para o seu e-mail
                e escolha uma nova palavra-passe.
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.reset.otp.update') }}" method="POST">
                @csrf

                <input
                    type="hidden"
                    name="email"
                    value="{{ old('email', $email ?? session('email')) }}"
                >

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>

                    <input
                        id="email"
                        type="email"
                        class="form-control"
                        value="{{ $email ?? session('email') }}"
                        disabled
                    >
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">
                        Código de verificação
                    </label>

                    <input
                        id="code"
                        type="text"
                        name="code"
                        class="form-control @error('code') is-invalid @enderror"
                        placeholder="Introduza o código de 6 dígitos"
                        maxlength="6"
                        pattern="[0-9]{6}"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        required
                    >

                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Nova palavra-passe
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Mínimo de 8 caracteres"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">
                        Confirmar nova palavra-passe
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Repita a nova palavra-passe"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-shield-lock me-1"></i>
                        Redefinir palavra-passe
                    </button>
                </div>
            </form>

            <p class="mt-3 mb-0 text-center">
                <a href="{{ route('login') }}">Voltar ao Login</a>
            </p>

        </div>
    </div>

</main>

<script src="{{ asset('dist/js/adminlte.js') }}"></script>

</body>
</html>
```