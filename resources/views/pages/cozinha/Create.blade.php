@extends('layouts.base')

@section('content')

 <main class="app-main">
        <div class="app-content-header">
                <div class="container-fluid">

                    <h1>Ambiente de criação de Cozinha</h1>

 <a type="button" href="{{ route('cozinha.index')}}" class="btn btn-outline-warning mb-2">Voltar</a>

<!-- Custom validation (criacao de users) -->
              <div class="col-lg-6">
                <div class="card card-info card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Prencha os campos cuidadosamente</div>
              </div>
              <form class="needs-validation" novalidate>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-12">
                          <label for="validationCustom02" class="form-label">Reserva_id ou Pedido_id</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Digite o ID da reserva ou do pedido"
                            id="validationCustom02"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Menu_id</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="Digite o ID do menu"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      
                         <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Quantidade</label>
                          <input
                            type="number"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="Digite a quantidade"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>

                     <div class="col-md-12">
                          <label for="validationCustom01" class="form-label">Observações</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="Digite as observações"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        
                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Inicio_preparo</label>
                          <input
                            type="time"
                            class="form-control"
                            id="validationCustom05"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid file.</div>
                        </div>

                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Fim_preparo</label>
                          <input
                            type="time"
                            class="form-control"
                            id="validationCustom05"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid file.</div>
                        </div>

                        
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Criar Cozinha</button>
                    </div>
                  </form>
                </div>
              </div>
                </div>
        </div>
</main>
@endsection