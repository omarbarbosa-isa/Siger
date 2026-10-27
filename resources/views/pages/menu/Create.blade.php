@extends('layouts.base')

@section('content')

 <main class="app-main">
        <div class="app-content-header">
                <div class="container-fluid">

                    <h1>Ambiente de criação de Menu</h1>

 <a type="button" href="{{ route('menu.index')}}" class="btn btn-outline-warning mb-2">Voltar</a>

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
                          <label for="validationCustom02" class="form-label">Menu</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Frango Grelhado"
                            id="validationCustom02"
                            required
                          />
                          <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Descrição</label>
                          <select class="form-select mb-2" id="validationCustom04" name="descricao_select">
                            <option selected disabled value="">Escolher uma sugestão...</option>
                            <option value="Servido com arroz, batata frita e salada fresca">Servido com arroz, batata frita e salada fresca</option>
                            <option value="Acompanha xima, molho de tomate e vegetais da época">Acompanha xima, molho de tomate e vegetais da época</option>
                            <option value="Grelhado na brasa com tempero especial da casa">Grelhado na brasa com tempero especial da casa</option>
                            <option value="Preparado ao molho de piri-piri e alho fresco">Preparado ao molho de piri-piri e alho fresco</option>
                            <option value="Cozinhado ao leite de coco e amendoim">Cozinhado ao leite de coco e amendoim</option>
                            <option value="Contém mariscos, camarão e temperos tradicionais">Contém mariscos, camarão e temperos tradicionais</option>
                            <option value="Opção vegetariana com vegetais grelhados e especiarias">Opção vegetariana com vegetais grelhados e especiarias</option>
                            <option value="Serve 2 pessoas - Porção familiar completa">Serve 2 pessoas - Porção familiar completa</option>
                           <option value="Bebida natural gelada sem adição de açúcar">Bebida natural gelada sem adição de açúcar</option>
                            <option value="Sobremesa caseira servida com calda de frutos vermelhos">Sobremesa caseira servida com calda de frutos vermelhos</option>
                          </select>
                            <input type="text" class="form-control" name="descricao_input" placeholder="Ou escreva uma descrição personalizada...">
                      </div>
                          <div class="invalid-feedback">Please select a valid state.</div>
                        </div>

                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Preço</label>
                          <input
                            type="number"
                            class="form-control"
                            id="validationCustom01"
                            placeholder="1000.00"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Categoria</label>
                          <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Escolher&hellip;</option>
                            <option>Entrada</option>
                            <option>Prato Principal</option>
                            <option>Sobremesa</option>
                            <option>Bebida</option>
                          </select>  
                        </div>
                        
                        </div>
                        
                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Foto</label>
                          <input
                            type="file"
                            class="form-control"
                            id="validationCustom05"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid file.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Estado</label>
                          <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Escolher&hellip;</option>
                            <option>Disponível</option>
                            <option>Indisponível</option>
                          </select>  
                        </div>

                        
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Criar Menu</button>
                    </div>
                  </form>
                </div>
              </div>
                </div>
        </div>
</main>
@endsection