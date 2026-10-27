<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIGERES | Recuperação de password</title>

    <!--begin::Theme Init-->
    <script>
      (() => {
        'use strict';
        const STORAGE_KEY = 'lte-theme';
        let stored = null;

        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage may be unavailable.
        }

        const prefersDark = globalThis.matchMedia(
          '(prefers-color-scheme: dark)'
        ).matches;

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
    <meta name="supported-color-schemes" content="light dark" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Forgot Password" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="Recover your account password." />
    <!--end::Primary Meta Tags-->

    <!--begin::CSS-->
    <link rel="preload" href="{{ asset('dist/css/adminlte.css') }}" as="style" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />
    <!--end::CSS-->
  </head>
  <!--end::Head-->

  <!--begin::Body-->
  <body class="login-page bg-body-secondary">

    <main class="login-box">

      <h1 class="login-logo">
        <a href="{{ route('login') }}"><b>SIGERES</b></a>
      </h1>

      <!-- /.login-logo -->

      <div class="card">
        <div class="card-body login-card-body">

          <p class="login-box-msg">
            Esqueceu-se da palavra-passe? Introduza o seu e-mail para receber
            um código de recuperação.
          </p>

          {{-- Mensagem de sucesso --}}
          @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif

          {{-- Mensagem de informação --}}
          @if (session('info'))
            <div class="alert alert-info" role="alert">
              {{ session('info') }}
            </div>
          @endif

          {{-- Erros de validação --}}
          @if ($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Formulário de recuperação --}}
          <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <label class="visually-hidden" for="forgotEmail">
              Email
            </label>

            <div class="input-group mb-3">
              <input
                id="forgotEmail"
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Endereço de e-mail"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                autofocus
              />

              <div class="input-group-text">
                <span class="bi bi-envelope"></span>
              </div>
            </div>

            @error('email')
              <div class="text-danger small mb-3">
                {{ $message }}
              </div>
            @enderror

            <div class="row">
              <div class="col-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">
                    Request new password
                  </button>
                </div>
              </div>
            </div>
          </form>

          <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
          </p>

          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">
              Register a new membership
            </a>
          </p>

        </div>
        <!-- /.login-card-body -->
      </div>

    </main>
    <!-- /.login-box -->

    <!--begin::JavaScript-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>

    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';

      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };

      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(
          SELECTOR_SIDEBAR_WRAPPER
        );

        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          window.OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          window.OverlayScrollbarsGlobal.OverlayScrollbars(
            sidebarWrapper,
            {
              scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
              },
            }
          );
        }
      });
    </script>
    <!--end::JavaScript-->

  </body>
  <!--end::Body-->
</html>
