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

    <!-- Main content -->
    <section class="content">
        <div class="container "><br>
            <h2 class="text-center display-4 text-info">Ajout des limites d'age</h2><br><br><br>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('retraites.store')}}"  method="POST">
                      @csrf
                      <!-- @error('search')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror -->
                        <!-- <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Matricule" name="search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div> -->
                        <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('corps_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Corps</label>
                        <select name="corps_id" id="" class="form-control">
                            @foreach ($corps as $corp )
                            <option value="{{$corp->id}}">{{$corp->nom}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                       
                        <label for="exampleInputPassword1">Emploi</label>
                        <input type="text" name="emploi" class="form-control" id="exampleInputPassword1" placeholder="Emploi">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('age')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Age</label>
                        <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" id="exampleInputEmail1" placeholder="age">
                      </div>
                     
                    </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-md">Enregistrer</button>
                 
                </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>

  <!-- Main footer -->
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
