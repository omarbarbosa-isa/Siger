 @extends('layouts.base')   

 @section('content')

 <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Users</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">user</a></li>
                    <li class="breadcrumb-item active" aria-current="page">index</li>
                  </ol>
                </nav>
              </div>
            </div>
            <a type="button" href="{{ route('users.create')}}" class="btn btn-outline-success mb-2">Criar user</a>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
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
                              <th>ID</th>
                              <th>Nome</th>
                              <th>Apelido</th>
                              <th>Nascimento</th>
                              <th>Género</th>
                              <th>Usuário</th>
                              <th>Role</th>
                              <th>Categoria</th>
                              <th>Contacto</th>
                              <th>Ações</th>

                            </tr>
                          </thead>
                          @foreach ($users as $user)
                          <tbody>
                            <tr class="align-middle">
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->surname }}</td>
                              <td>{{ $user->birth_date }}</td>
                              <td>{{ $user->gender }}</td>
                              <td>{{ $user->username }}</td>
                              <td>{{ $user->role }}</td>
                              <td>{{ $user->category }}</td>
                              <td>{{ $user->contact }}</td>
                              <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye" aria-hidden="true"> </i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil" aria-hidden="true"> </i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button 
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger" 
                                     onclick="return confirm('Are you sure?')"
                                     ><i class="bi bi-trash" aria-hidden="true"> </i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                            
                          </tbody>
                          @endforeach
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