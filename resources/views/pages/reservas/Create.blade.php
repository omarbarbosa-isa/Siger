@extends('layouts.base')

@section('content')

 <main class="app-main">
        <div class="app-content-header">
                <div class="container-fluid">

                    <h1>Ambiente de criação de Reservas</h1>

 <a type="button" href="{{ route('reservas.index')}}" class="btn btn-outline-warning mb-2">Voltar</a>

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
                          <label for="validationCustom02" class="form-label">Usuário_id</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Digite o ID do usuário"
                            id="validationCustom02"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Mesa_id</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="Digite o ID da mesa"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      
                         <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Data da Reserva</label>
                          <input
                            type="date"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="Digite a data da reserva"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>  
                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Horario da Reserva</label>
                          <input
                            type="time"
                            class="form-control"
                            id="validationCustom05"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid file.</div>
                        </div>

                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Número de Pessoas</label>
                          <input
                            type="number"
                            class="form-control"
                            id="validationCustom05"
                            Placeholder="Digite o número de pessoas"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid file.</div>
                        </div>

                         <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Estado</label>
                          <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Escolher&hellip;</option>
                            <option>Concluída</option>
                            <option>Confirmada</option>
                            <option> Pendente </option>
                            <option>Cancelada</option>
                          </select>  
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

                        
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Criar Reserva</button>
                    </div>
                  </form>
                </div>
              </div>
                </div>
        </div>
</main>
@endsection