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
    {{-- <img class="animation__shake" src="images/udc.png" alt="AdminLTELogo" height="60" width="60"> --}}
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
            <h1 class="text-center text-info">Formation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
              <li class="breadcrumb-item active">Formation</li>
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
                <h3 class="card-title">Formation</h3>
              </div> <br>
              <!-- @if (session()->has('message'))
                <div class="alert alert-success">
                  {{session()->get('message')}}
                </div>
              @endif -->
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('formation.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('diplome')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputEmail1">Diplôme</label>
                      <input type="text"  name="diplome" class="form-control  @error('diplome') is-invalid @enderror" id="exampleInputEmail1" placeholder="diplome" required>
                    </div>

                    <div class="form-group">
                      @error('lieu')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputPassword1">Lieu</label>
                      <input type="text" name="lieu" class="form-control  @error('lieu') is-invalid @enderror" id="exampleInputPassword1" placeholder="Lieu" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('annee')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputEmail1">Année</label>

                      <input type="text" name="annee" class="form-control  @error('annee') is-invalid @enderror" id="exampleInputEmail1" placeholder="Année" required>
                    </div>
                    <div class="form-group">
                      @error('genre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputPassword1">Filière</label>
                      <input type="text" name="genre" class="form-control  @error('genre') is-invalid @enderror" id="exampleInputPassword1" placeholder="Genre" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="employer_id" class="form-control" id="exampleInputPassword1" value="{{ $employer->id }}">
                  </div>
                  </div>



                </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Enregistrer et enregistrer une autre formation</button>
                  <a href="{{route('statut')}}"class="btn btn-info btn-sm text-right">Suivant</a>
                  <a href="{{route('accueil')}}"class="btn btn-info btn-sm text-right">Quitter</a>
                  {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                </div>
              </form>
            </div>



          </div>
          <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-body box-profile">


                  <h3 class="profile-username text-center text-info">{{ $employer->nom }}  {{ $employer->prenom }}</h3>

                  <p class="text-muted text-center">Matricule: {{ $employer->matricule }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Adresse:</b> <a class="float-center text-info">{{$employer->adresse}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Téléphone:</b> <a class="float-center text-info">{{$employer->telephone}}</a>
                    </li>
                  </ul>


                </div>
                <!-- /.card-body -->
              </div>
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
