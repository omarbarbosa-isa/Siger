 @extends('layouts.base')   

 @section('content')

 <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Menu</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">index</li>
                  </ol>
                </nav>
              </div>
            </div>
            <a type="button" href="{{ route('menu.create')}}" class="btn btn-outline-success mb-2">Criar Menu</a>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
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
                          <td>Adicionar pratos ao menu</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 60%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">60%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>2.</td>
                          <td>Editar informações dos pratos</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 34%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">34%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>3.</td>
                          <td>Atualizar preços</td>
                          <td>
                            <div class="progress progress-xs">
                              <div
                                class="progress-bar progress-bar-danger"
                                style="width: 3%"
                              ></div>
                            </div>
                          </td>
                          <td><span class="badge text-bg-danger">3%</span></td>
                        </tr>
                        <tr class="align-middle">
                          <td>4.</td>
                          <td>Organizar categorias</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar text-bg-warning" style="width: 20%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-warning">20%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>5.</td>
                          <td>Verificar disponibilidade dos pratos</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-primary" style="width: 50%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-primary">50%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>6.</td>
                          <td>Remover pratos indisponíveis</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-success" style="width: 97%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-success">97%</span>
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