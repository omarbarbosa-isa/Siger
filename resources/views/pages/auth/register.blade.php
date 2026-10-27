
<!doctype html>
<html lang="pt">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGERES | Registo</title>

    <!--begin::Theme Init-->
    <script>
      (() => {
        'use strict';
        const STORAGE_KEY = 'lte-theme';
        let stored = null;

        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage indisponível
        }

        const prefersDark = globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
        let resolved = 'light';

        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (prefersDark) {
          resolved = 'dark';
        }

        document.documentElement.setAttribute('data-bs-theme', resolved);
        document.documentElement.style.colorScheme = resolved;
      })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="SIGERES | Registo" />
    <meta name="author" content="SIGERES" />
    <meta name="description" content="Página de registo do SIGERES." />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('dist/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->

  <!--begin::Body-->
  <body class="register-page bg-body-secondary">
    <main class="register-box">
      <!-- /.register-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header">
          <a
            href="{{ route('login') }}"
            class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"
          >
            <h1 class="mb-0"><b>SIGE</b>RES</h1>
          </a>
        </div>

        <div class="card-body register-card-body">
          <p class="register-box-msg">Criar uma nova conta</p>

          {{-- Mensagens de sucesso ou informação --}}
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

          {{-- Erros de validação --}}
          @if ($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('register') }}" method="POST">
            @csrf

            {{-- Nome --}}
            <div class="input-group mb-1">
              <div class="form-floating">
                <input
                  id="registerName"
                  type="text"
                  name="name"
                  class="form-control @error('name') is-invalid @enderror"
                  value="{{ old('name') }}"
                  placeholder=""
                  autocomplete="given-name"
                  required
                />
                <label for="registerName">Nome</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-person"></span>
              </div>
            </div>

            {{-- Apelido --}}
            <div class="input-group mb-1">
              <div class="form-floating">
                <input
                  id="registerSurname"
                  type="text"
                  name="surname"
                  class="form-control @error('surname') is-invalid @enderror"
                  value="{{ old('surname') }}"
                  placeholder=""
                  autocomplete="family-name"
                  required
                />
                <label for="registerSurname">Apelido</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-person"></span>
              </div>
            </div>

            {{-- Nome de utilizador --}}
            <div class="input-group mb-1">
              <div class="form-floating">
                <input
                  id="registerUsername"
                  type="text"
                  name="username"
                  class="form-control @error('username') is-invalid @enderror"
                  value="{{ old('username') }}"
                  placeholder=""
                  autocomplete="username"
                  required
                />
                <label for="registerUsername">Nome de utilizador</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-person-badge"></span>
              </div>
            </div>

            {{-- E-mail --}}
            <div class="input-group mb-1">
              <div class="form-floating">
                <input
                  id="registerEmail"
                  type="email"
                  name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  value="{{ old('email') }}"
                  placeholder=""
                  autocomplete="email"
                  required
                />
                <label for="registerEmail">E-mail</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-envelope"></span>
              </div>
            </div>

            {{-- Palavra-passe --}}
            <div class="input-group mb-1">
              <div class="form-floating">
                <input
                  id="registerPassword"
                  type="password"
                  name="password"
                  class="form-control @error('password') is-invalid @enderror"
                  placeholder=""
                  autocomplete="new-password"
                  required
                />
                <label for="registerPassword">Palavra-passe</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-lock-fill"></span>
              </div>
            </div>

            {{-- Confirmação da palavra-passe --}}
            <div class="input-group mb-3">
              <div class="form-floating">
                <input
                  id="registerPasswordConfirmation"
                  type="password"
                  name="password_confirmation"
                  class="form-control"
                  placeholder=""
                  autocomplete="new-password"
                  required
                />
                <label for="registerPasswordConfirmation">Confirmar palavra-passe</label>
              </div>
              <div class="input-group-text">
                <span class="bi bi-lock-fill"></span>
              </div>
            </div>

            <!--begin::Row-->
            <div class="row">
              <div class="col-8 d-inline-flex align-items-center">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value="1"
                    id="flexCheckDefault"
                    required
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    Aceito os termos
                  </label>
                </div>
              </div>

              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Registar</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>

          <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p>- OU -</p>
            <a href="#" class="btn btn-primary">
              <i class="bi bi-facebook me-2"></i> Registar com Facebook
            </a>
            <a href="#" class="btn btn-danger">
              <i class="bi bi-google me-2"></i> Registar com Google
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-0">
            <a href="{{ route('login') }}" class="link-primary text-center">
              Já tenho uma conta
            </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </main>
    <!-- /.register-box -->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Required Plugin(Popper.js)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Popper.js)-->

    <!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->

    <!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };

      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
  </body>
  <!--end::Body-->
</html>
