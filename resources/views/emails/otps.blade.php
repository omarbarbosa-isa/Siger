<form method="POST" action="{{ route('otp.verify') }}">
    @csrf

    <!-- Alerta informativo ou de sucesso vindo da sessão -->
    @if (session('info'))
        <div class="alert alert-info mb-3">
            {{ session('info') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Campo do Código OTP -->
    <div class="mb-3">
        <label for="otp" class="form-label">Código de Confirmação (OTP)</label>
        <input 
            type="text" 
            class="form-control @error('otp') is-invalid @enderror" 
            id="otp" 
            name="otp" 
            maxlength="6" 
            placeholder="Digite o código de 6 dígitos" 
            required 
            autofocus
        >

        @error('otp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Botão de submissão -->
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Verificar Código</button>
    </div>
</form>