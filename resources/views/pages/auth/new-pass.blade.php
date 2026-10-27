<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGERES | Nova Palavra-passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  </head>
  <body class="login-page bg-body-secondary">
    <main class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="link-dark"><b>SIGERES</b></a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Insira o código OTP recebido por email e defina a sua nova palavra-passe.</p>

          <form action="{{ route('password.update.otp') }}" method="post">
            @csrf
            
            <!-- Código OTP -->
            <div class="input-group mb-3">
              <input type="text" name="otp" class="form-control @error('otp') is-invalid @enderror" placeholder="Código OTP de 6 dígitos" required />
              <div class="input-group-text"><span class="bi bi-shield-lock"></span></div>
              @error('otp')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Nova Password -->
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nova Palavra-passe" required />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Confirmação da Password -->
            <div class="input-group mb-3">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a Nova Palavra-passe" required />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Alterar Palavra-passe</button>
              </div>
            </div>
          </form>

          <p class="mt-3 mb-1 text-center">
            <a href="{{ route('login') }}">Voltar ao Login</a>
          </p>
        </div>
      </div>
    </main>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  </body>
</html>