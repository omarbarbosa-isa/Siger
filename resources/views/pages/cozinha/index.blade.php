 @extends('layouts.base')   

 @section('content')

 <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Cozinha</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">cozinha</a></li>
                    <li class="breadcrumb-item active" aria-current="page">index</li>
                  </ol>
                </nav>
              </div>
            </div>
            <a type="button" href="{{ route('cozinha.create')}}" class="btn btn-outline-success mb-2">Criar Cozinha</a>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cozinha</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 16rem">
                    <span class="input-group-text">
                      <i class="bi bi-search" aria-hidden="true"></i>
                    </span>
                    <input
                      id="table-filter"
                      type="search"
                      class="form-control"
                      placeholder="Filter rows&hellip;"
                      aria-label="Filter rows"
                    />
                  </div>
                </div>
              </div>

              <!--<div class="card-body"> -->
                
                <div id="users-table"></div>

                 <table class="table table-sm">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Tarefas</th>
                          <th>Estado</th>
                          <th style="width: 40px">Progresso</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td>1.</td>
                          <td>Preparar ingridientes</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 99%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">99%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>2.</td>
                          <td>Verificar stock dos produtos</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 66%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">66%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>3.</td>
                          <td>Limpar bancadas e equipamentos</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 78%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">78%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>4.</td>
                          <td>Conferir pedidos antes de sair</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar text-bg-warning" style="width: 60%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-warning">60%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>5.</td>
                          <td>Higienizar utensílios</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-primary" style="width: 40%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-primary">40%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>6.</td>
                          <td>Fechar cozinha</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-success" style="width: 0%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-success">0%</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
              </div>
              <div class="card-footer text-secondary small">
                Powered by
                <a href="https://tabulator.info/" target="_blank" rel="noopener">Omar Barbosa</a>
                &mdash; Sistema de Gestão de Restaurantes.
              </div>
            </div>
          </div>
        </div>
      </main>
      

 @endsection