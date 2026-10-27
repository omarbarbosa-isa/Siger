 @extends('layouts.base')

      @section('content')
      
     <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Dados do colaborador</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row g-3">
              <!-- Left rail -->
             <div class="col-md-3">
                <!-- About card -->
                <div class="card">
                  <div class="card-body text-center">
                    <div
                      class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center mb-3"
                      style="width: 96px; height: 96px; font-size: 2rem"
                      aria-hidden="true"
                    >
                      {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr($user->surname, 0, 1)) }}
                    </div>
                    <h3 class="h5 mb-0">{{ $user->name }} {{ $user->surname }}</h3>
                    <p class="text-secondary mb-3">{{ $user->email }}</p>
                    
                    
                  </div>
                </div>
              
              </div>

              <!-- Tab content -->
              <div class="col-md-9">
                <div class="tab-content">
                  <!-- Account -->
                  <div class="tab-pane fade show active" id="account" role="tabpanel">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Dados do colaborador : {{$user->id}}</h3>
                      </div>
                      <div class="card-body">

                                    <div class="row">
                                <div class="col-md-6">
                                <p>ID: {{ $user->id }}</p>
                                <p>Name: {{ $user->name }}</p>
                                <p>Surname: {{ $user->surname }}</p>
                                <p>Username: {{ $user->username }}</p>
                                 </div>
                                   
                                <div class="col-md-6">
                                <p>Email: {{ $user->email }}</p>
                                <p>Role: {{ $user->role }}</p>
                                <p>Category: {{ $user->category }}</p>
                                <p>Contact: {{ $user->contact }}</p>
                                </div>
                                    </div>
                                
                              
                      </div>
                            <div class="card-footer">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle-fill" aria-hidden="true"></i>
                                        Voltar</a>
                                    
                                    <a href="{{ route('users.edit', $user->id) }}"
                                     class="btn btn-primary">
                                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                        Editar</a>

        

                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger float-end" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            <i class="bi bi-trash me-1" aria-hidden="true"></i>
                                    Deletar
                            </a>
                            <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                            </form>
                        
                        </div>

                    <style>
                        .delete-container {
                            width: 100%;
                            display: flex
                            
                            ;
                            justify-content: flex-end;
                            margin-top: 10px;
                        }

                        .delete-btn {
                            background-color: #dc3545;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 15px;
                            font-weight: bold;
                        }

                        .delete-btn:hover {
                            background-color: #b02a37;
                        }
                    </style>

                            </div>
                    </div>
                  </div>

                  <!-- Notifications -->
                  <div class="tab-pane fade" id="notifications" role="tabpanel">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Notifications</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-secondary">Choose what to be notified about.</p>
                        <div
                          class="d-flex justify-content-between align-items-start py-2 border-bottom"
                        >
                          <div>
                            <p class="mb-0 fw-semibold">Product updates</p>
                            <small class="text-secondary">Major releases and changelogs</small>
                          </div>
                          <div class="form-check form-switch mb-0">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="notif-0"
                              checked
                            />
                            <label class="visually-hidden" for="notif-0">
                              Toggle Product updates
                            </label>
                          </div>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-start py-2 border-bottom"
                        >
                          <div>
                            <p class="mb-0 fw-semibold">Security alerts</p>
                            <small class="text-secondary"
                              >Sign-in attempts and account changes</small
                            >
                          </div>
                          <div class="form-check form-switch mb-0">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="notif-1"
                              checked
                            />
                            <label class="visually-hidden" for="notif-1">
                              Toggle Security alerts
                            </label>
                          </div>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-start py-2 border-bottom"
                        >
                          <div>
                            <p class="mb-0 fw-semibold">Weekly digest</p>
                            <small class="text-secondary"
                              >A summary of activity in your workspace</small
                            >
                          </div>
                          <div class="form-check form-switch mb-0">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="notif-2"
                            />
                            <label class="visually-hidden" for="notif-2">
                              Toggle Weekly digest
                            </label>
                          </div>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-start py-2 border-bottom"
                        >
                          <div>
                            <p class="mb-0 fw-semibold">Mentions</p>
                            <small class="text-secondary">When a teammate @mentions you</small>
                          </div>
                          <div class="form-check form-switch mb-0">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              role="switch"
                              id="notif-3"
                            />
                            <label class="visually-hidden" for="notif-3"> Toggle Mentions </label>
                          </div>
                        </div>
                        <button class="btn btn-primary mt-3">Save preferences</button>
                      </div>
                    </div>
                  </div>

                  <!-- Security -->
                  <div class="tab-pane fade" id="security" role="tabpanel">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Password</h3>
                      </div>
                      <div class="card-body">
                        <form class="row g-3">
                          <div class="col-md-12">
                            <label class="form-label" for="pwd-current"> Current password </label>
                            <input type="password" class="form-control" id="pwd-current" />
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="pwd-new"> New password </label>
                            <input type="password" class="form-control" id="pwd-new" />
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="pwd-confirm">
                              Confirm new password
                            </label>
                            <input type="password" class="form-control" id="pwd-confirm" />
                          </div>
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update password</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="card mt-3">
                      <div class="card-header">
                        <h3 class="card-title">Two-factor authentication</h3>
                      </div>
                      <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                          <p class="mb-0 fw-semibold">Authenticator app</p>
                          <small class="text-secondary">
                            Use an authenticator app such as 1Password or Authy.
                          </small>
                        </div>
                        <button class="btn btn-outline-primary">Enable</button>
                      </div>
                    </div>
                  </div>

                  <!-- Billing -->
                  <div class="tab-pane fade" id="billing" role="tabpanel">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Current plan</h3>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <div>
                            <p class="mb-0 fw-semibold">Pro plan</p>
                            <small class="text-secondary">
                              $29 / month &middot; Renews June 18, 2026
                            </small>
                          </div>
                          <a href="#" class="btn btn-outline-primary btn-sm"> Change plan </a>
                        </div>
                        <hr />
                        <p class="fw-semibold mb-2">Payment method</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <i class="bi bi-credit-card-2-front me-2" aria-hidden="true"></i>
                            Visa ending in 4242
                          </div>
                          <a href="#" class="btn btn-link btn-sm">Update</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Danger zone -->
                  <div class="tab-pane fade" id="danger" role="tabpanel">
                    <div class="card border-danger">
                      <div class="card-header bg-danger-subtle">
                        <h3 class="card-title text-danger">Danger zone</h3>
                      </div>
                      <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                          <div>
                            <p class="mb-0 fw-semibold">Export account data</p>
                            <small class="text-secondary">
                              Download a copy of all your data as a ZIP archive.
                            </small>
                          </div>
                          <button class="btn btn-outline-secondary">Export</button>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between align-items-start">
                          <div>
                            <p class="mb-0 fw-semibold text-danger">Delete account</p>
                            <small class="text-secondary">
                              This will permanently delete your account and all associated data.
                              This cannot be undone.
                            </small>
                          </div>
                          <button class="btn btn-danger">Delete account</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
        
        @endsection