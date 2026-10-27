      @extends('layouts.base')

      @section('content')

      <main class="app-main">
              <div class="app-content-header">
                      <div class="container-fluid">

                          <h1>Ambiente de criação de Usuário</h1>



        {{-- Bloco para exibir erros de validação --}}
                  @if ($errors->any())
                      <div class="alert alert-danger col-md-6">
                          <ul class="mb-0">
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

             {{-- Bloco para exibir erros de validação --}}
            @if ($errors->any())
                <div class="alert alert-danger col-md-6">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-12">
                <div class="card card-success card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Cadastro do Colaborador</div>
                    </div>

                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <!-- Nome -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="name"
                                            Placeholder="Nome"
                                            id="name"
                                            value="{{ old('name') }}"
                                            required
                                        />
                                    </div>

                                    <!-- Apelido -->
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">Apelido (Surname)</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="surname"
                                            Placeholder="Apelido"
                                            id="surname"
                                            value="{{ old('surname') }}"
                                            />
                                    </div>

                                    <!-- Username -->
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="username"
                                            Placeholder="Nome de usuário"
                                            id="username"
                                            value="{{ old('username') }}"
                                            required
                                            />
                                    </div>

                                    <!-- Categoria -->

                                    <div class="mb-3">
                                        <label class="form-label d-block">Categoria</label>

                                        <div class="btn-group" role="group" aria-label="Seleção de Categoria">
                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="category"
                                                id="category_cook"
                                                value="Cozinheiro"
                                                autocomplete="off"
                                                {{ old('category') == 'Cozinheiro' ? 'checked' : '' }}
                                            >
                                            <label class="btn btn-outline-success" for="category_cook">Cozinheiro</label>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="category"
                                                id="category_waiter"
                                                value="Atendente"
                                                autocomplete="off"
                                                {{ old('category') == 'Atendente' ? 'checked' : '' }}
                                            >
                                            <label class="btn btn-outline-success" for="category_waiter">Atendente</label>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="category"
                                                id="category_bartender"
                                                value="Barman"
                                                autocomplete="off"
                                                {{ old('category') == 'Barman' ? 'checked' : '' }}
                                            >
                                            <label class="btn btn-outline-success" for="category_bartender">Barman</label>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="category"
                                                id="category_other"
                                                value="other"
                                                autocomplete="off"
                                                {{ old('category') == 'other' ? 'checked' : '' }}
                                            >
                                            <label class="btn btn-outline-success" for="category_other">Outro</label>
                                        </div>
                                    </div>

                                    <!-- Cargo -->
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Cargo</label>
                                        <select class="form-select" name="role" id="role">
                                            <option value="">Selecione...</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Adminastrador</option>
                                            <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operador</option>
                                            <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Visitante</option>
                                        </select>
                                    </div>

                                    <!-- Data de nascimento (Input Nativo) -->
                                    <div class="mb-3">
                                        <label for="birth_date" class="form-label">Data de Nascimento</label>
                                        <input
                                            class="form-control"
                                            type="date"
                                            name="birth_date"
                                            id="birth_date"
                                            value="{{ old('birth_date') }}"
                                            />
                                    </div>

                                    <!-- Género -->
                                    <div class="mb-3">
                                        <label class="form-label d-block">Género</label>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="gender"
                                                id="gender_male"
                                                value="male"
                                                {{ old('gender') == 'male' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="gender_male">Masculino</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="gender"
                                                id="gender_female"
                                                value="female"
                                                {{ old('gender') == 'female' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="gender_female">Feminino</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="gender"
                                                id="gender_other"
                                                value="other"
                                                {{ old('gender') == 'other' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="gender_other">Outro</label>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <!-- Contacto -->
                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Contacto</label>
                                   <div class="input-group mb-3">
                                     <span class="input-group-text" id="basic-addon1">+258</span>
                                     <input
                                        class="form-control"
                                        type="tel"
                                        mask="000000000"
                                        maxlength="11"
                                        pattern="[0-9]{2} [0-9]{3} [0-9]{4}"
                                        oninput="this.value = this.value.replace(/[^0-9 ]/g, '')"
                                        placeholder="XX XXX XXXX"
                                        name="contact"
                                        id="contact"
                                        value="{{ old('contact') }}"
                                        required
                                       />
                                    </div>

                                    <!-- Endereço -->
                                    <div class="mb-3">
                                         <label for="adress" class="form-label">Morada</label>
                                <select 
                                class="form-select" 
                                name="adress"
                                id="adress"
                                value="{{ old('adress') }}"
                                required>
                                  <option selected disabled value="">Escolher&hellip;</option>
                                  <option>Maputo</option>
                                  <option>Maputo-Provincia</option>
                                  <option>Gaza</option>
                                  <option>Inhambane</option>
                                  <option>Sofala</option>
                                  <option>Manica</option>
                                  <option>Tete</option>
                                  <option>Zambezia</option>
                                  <option>Nampula</option>
                                  <option>Niassa</option>
                                  <option>Cabo Delgado</option>
                                </select>
                                    </div>

                                    <!-- Fotografia -->
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Foto de Perfil</label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="photo"
                                            name="photo"
                                            accept="image/*"
                                            />
                                    </div>

                                    <!-- E-mail -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input
                                            class="form-control"
                                            type="email"
                                            name="email"
                                            Placeholder="Omar@exemplo.com"
                                            id="email"
                                            value="{{ old('email') }}"
                                            required
                                            />
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="password"
                                            Placeholder="password123"
                                            id="password"
                                            required
                                            />
                                    </div>

                                    <!-- Confirmação da Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar Password</label>
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="password_confirmation"
                                            Placeholder="password123"
                                            id="password_confirmation"
                                            required
                                            />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div confirmation="Are you sure you want to cancel? Any unsaved changes will be lost.">
                            <a type="button" href="{{ route('users.index')}}" class="btn btn-danger mb-2">Cancelar</a>
                            <button class="btn btn-outline-success mb-2" type="submit">Guardar</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection