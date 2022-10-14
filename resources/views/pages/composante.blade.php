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
  <link rel="shortcut icon" href="images/udc.png">

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
            <h1 class="text-info">Composante</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
              <li class="breadcrumb-item active">Composante</li>
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
                <h3 class="card-title">Ajout Composante</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('composante.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="exampleInputEmail1">Nom Composante</label>
                    <input type="text" value="{{old('nom')}}" class="form-control" id="exampleInputEmail1" name="nom" placeholder="Composante">
                  </div>
                  <div class="form-group">
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="exampleInputPassword1">Code Design</label>
                    <input type="text" class="form-control" value="{{old('code')}}" id="exampleInputPassword1" name="code" placeholder="Code Design">
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
                <h3 class="card-title">Composante existante</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="mt-3">
                <table class="table table-hover">
                  @foreach ($composantes as $composante)
                      <tr>
                        <td class="dropdown-item-title mod" data-toggle="modal" data-target="#modelId"
                         onclick='document.getElementById("id_comp").value="{{ $composante->id }}";document.getElementById("comp").value="{{ $composante->nom }}";document.getElementById("cod").value="{{ $composante->code_des }}";document.getElementById("idcom").value="{{ $composante->id }}"'>
                          {{ $composante->nom }}
                          {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                        
                        </td>
                      </tr>
                  @endforeach
                </table>
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
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edition d'une composante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
          <div class="container-fluid">
            <form method="POST" action="{{route('edit_composante')}}">
              @csrf
              <input type="hidden" name="id" id="id_comp">
              <div class="card-body">
                <div class="form-group">
                  @error('nom')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <label for="comp">Nom Composante</label>
                  <input type="text" class="form-control" id="comp"  name="nom_composante" placeholder="Composante">
                </div>
                <div class="form-group">
                  @error('code')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <label for="cod">Code Design</label>
                  <input type="text" class="form-control" id="cod" name="code_composante" placeholder="Code Design">
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="submit" class="btn btn-primary">Enregistrez</button> --}}
                <button type="submit" class="btn btn-warning form-control">Modifier</button>
                {{-- <button type="submit" class="btn btn-danger">Supprimer</button> --}}
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{--<button type="button" class="btn btn-primary">Save</button> --}}
          <form action="{{route('delete_composante')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="idcom">
          <button type="submit" class="btn btn-danger">Supprimer la composante</button>

          </form>
        </div> 

      </div>
    </div>
  </div>
  
  <script>
    $('#exampleModal').on('show.bs.modal', event => {
      var button = $(event.relatedTarget);
      var modal = $(this);
      // Use above variables to manipulate the DOM
      
    });
  </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')


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
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
