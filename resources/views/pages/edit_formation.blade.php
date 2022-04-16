<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
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
            <h1 class="text-center text-info">Modification formation</h1>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('formation.update',$formation->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('diplome')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputEmail1">Diplôme</label>
                      <input type="text"  name="diplome" class="form-control  @error('diplome') is-invalid @enderror" id="exampleInputEmail1" placeholder="diplome" value="{{ $formation->diplome }}">
                    </div>

                    <div class="form-group">
                      @error('lieu')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputPassword1">Lieu</label>
                      <input type="text" name="lieu" class="form-control  @error('lieu') is-invalid @enderror" id="exampleInputPassword1" placeholder="Lieu" value="{{ $formation->lieu }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      @error('annee')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputEmail1">Année</label>

                      <input type="text" name="annee" class="form-control  @error('annee') is-invalid @enderror" id="exampleInputEmail1" placeholder="Année" value="{{ $formation->annee }}">
                    </div>
                    <div class="form-group">
                      @error('genre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <label for="exampleInputPassword1">Genre</label>
                      <input type="text" name="genre" class="form-control  @error('genre') is-invalid @enderror" id="exampleInputPassword1" placeholder="Genre" value="{{ $formation->genre }}">
                    </div>
                  </div>
                  <div class="form-group">
                    {{-- <input type="hidden" name="employer_id" class="form-control" id="exampleInputPassword1" value="{{ $employer->id }}"> --}}
                  </div>
                  </div>



                </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Modifier</button>
                  {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                </div>
              </form>
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

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
