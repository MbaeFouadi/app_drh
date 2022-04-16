<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/udc.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
  @include('includes.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-info">Fonction</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-info"></a>Accueil</li>
              <li class="breadcrumb-item active">Fonction</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ajout Fonction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('fonction.store')}}">
                @csrf
                <div class="card-body">
                  @isset($message)
                    <div class="alert alert-danger">{{ $message }}</div>
                  @endisset
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom Fonction</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="fonction" placeholder="Fonction">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Services</label>
                    <select class="form-control" name="service">
                      @foreach($services as $service)
                      <option value="{{ $service->id}}">{{ $service->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Catégories</label>
                    <select class="form-control" name="categorie">
                      @foreach($categories as $categorie)
                        <option value="{{ $categorie->id}}">{{ $categorie->type }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="number" class="form-control" name="nombre" id="exampleInputPassword1" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Années</label>
                    <select class="form-control" name="annee">
                      @foreach($annees as $annee)
                      <option value="{{ $annee->id}}">{{ $annee->annee }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Enregistrer</button>
                  {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                </div>
              </form>
            </div>



          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Fonction existante</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Composante</label>
                    <select class="form-control" id="composantes">
                      <option value="all" selected>tout</option>
                      @foreach($composantes as $composante)
                      <option value="{{ $composante->id}}">{{ $composante->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Service</label>
                    <select class="form-control" id="services">
                      <option value="all" selected>tout</option>
                      @foreach($services as $service)
                      <option value="{{ $service->id}}">{{ $service->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Fonction</label>
                    <select class="form-control">
                      @foreach($fonctions as $fonction)
                      <option value="{{ $fonction->id}}">{{ $fonction->nom }}</option>
                      @endforeach
                    </select>
                  </div> --}}
                  <div class="mt-3">
                    @error('nom_fonction')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    @error('le_nombre')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror                    
                    @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <table class="table table-hover" id="table_fonctions">
                      @foreach ($fonctions as $fonction)
                          <tr>
                            <td class="dropdown-item-title mod" data-toggle="modal" data-target="#modelId"
                                onclick='document.getElementById("serviceModal").value="{{ $fonction->service_id }}";document.getElementById("categorieModal").value="{{ $fonction->category_id }}";document.getElementById("anneeModal").value="{{ $fonction->annee_id }}";document.getElementById("id_fct").value="{{ $fonction->id }}";document.getElementById("fct").value="{{ $fonction->nom }}";document.getElementById("nbr").value="{{ $fonction->nombre }}";document.getElementById("idfct").value="{{ $fonction->id }}"'>
                              {{ $fonction->nom }}
                            </td>
                          </tr>
                      @endforeach
                    </table>
                  </div>

              <!-- /.card-body -->
            </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->


            <!-- /.card -->
            <!-- general form elements disabled -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edition d'une fonction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
           <!-- form start -->
          <form action="/form_edit_fonction" method="post">
            <input type="hidden" name="id" value="6" id="id_fct">

            <div class="card-body">
             
              <div class="form-group">
                <label for="fct">Nom Fonction</label>
                <input type="text" class="form-control" id="fct" name="nom_fonction" placeholder="Fonction">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Service</label>
                <select class="form-control" name="service_fonction" id="serviceModal">
                  @foreach($services as $service)
                  <option value="{{ $service->id}}">{{ $service->nom }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Categorie</label>
                <select class="form-control" name="category_fonction" id="categorieModal">
                  @foreach($categories as $categorie)
                    <option value="{{ $categorie->id}}">{{ $categorie->type }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="nbr">nombre</label>
                <input type="number" class="form-control" min="1" name="nombre_fonction" id="nbr" placeholder="nombre">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Année</label>
                <select class="form-control" name="annee_fonction" id="anneeModal">
                  @foreach($annees as $annee)
                  <option value="{{ $annee->id}}">{{ $annee->annee }}</option>
                  @endforeach
                </select>
              </div>
            </div>
             <!-- /.card-body -->

             <div class="card-footer">
              {{-- <button type="submit" class="btn btn-primary">Enregistrez</button> --}}
              <button id="btn-edit-fonction" type="submit" class="btn btn-warning form-control">Modifier</button>
              {{-- <button type="submit" class="btn btn-danger">Supprimer</button> --}}
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        {{--<button type="button" class="btn btn-primary">Save</button> --}}
        <form action="{{route('delete_fonction')}}" method="post">
          @csrf
          <input type="hidden" name="id" id="idfct">
        <button type="submit" class="btn btn-danger">Supprimer la fonction</button>

        </form>
      </div> 
        </div>
      </div>
      
    </div>
  </div>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  (function($) {
    bsCustomFileInput.init();

    const btnEditFonction = document.getElementById('btn-edit-fonction')
    if (btnEditFonction) {
      btnEditFonction.addEventListener('click', function (event) {
          event.preventDefault()
          event.stopPropagation()
            debugger
          this.form.submit()
      })
    }


    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      // Use above variables to manipulate the DOM
      
    });

    // Script for select Composante
    const selectTargetComposante = document.querySelector('select#composantes')
    const selectTargetService = document.querySelector('select#services')
    const tableTarget = document.querySelector('#table_fonctions')
    if (selectTargetComposante!=null && selectTargetService!=null && tableTarget!=null) {
    selectTargetComposante.addEventListener('change', function(event) {
      event.preventDefault()
      event.stopPropagation()

      const value = String(event.target.value).trim()
      if (value !== '') {
        $.get('/getServiceByComposante/'+value, function (data) {
          let options = ''
          data.forEach( function (service) {
            options += `<option value="${service.id}">${service.nom }</option>`
          });
          selectTargetService.innerHTML = options
        })
      }

    })

    selectTargetService.addEventListener('change', function(event) {
      event.preventDefault()
      event.stopPropagation()

      const value = String(event.target.value).trim()
      if (value !== '') {
        $.get('/getFonctionByService/'+value, function (data) {
          let trs = ''

          data.forEach( function (service) {
              trs += `
                <tr>
                  <td class="dropdown-item-title mod" data-toggle="modal" data-target="#modelId"
                        onclick='document.getElementById("serviceModal").value="${ fonction.service_id }";document.getElementById("categorieModal").value="${ fonction.category_id }";document.getElementById("anneeModal").value="${fonction.annee_id }";document.getElementById("id_fct").value="${ fonction.id }";document.getElementById("fct").value="${ fonction.nom }";document.getElementById("nbr").value="${ fonction.nombre }";document.getElementById("idfct").value="${ fonction.id }"'>
                        ${ fonction.nom }
                  </td>
                </tr>
                
              `
          });
          tableTarget.innerHTML = trs
        })
      }
      

    })
  }

  })(jQuery)
</script>
</body>
</html>
