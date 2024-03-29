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
            <h1 class="text-center text-info">Avancement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
              <li class="breadcrumb-item active">Avancement</li>
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
                <h3 class="card-title">Avancement</h3>
              </div><br>
              <!-- @if (session()->has('message'))
                <div class="alert alert-success">
                  {{session()->get('message')}}
                </div>
              @endif -->
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route ('avancement_re')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('annees')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Année</label>
                          <select class="form-control" name="annees" id="annees" required>
                          <option value="">Annee</option>
                            @foreach ($annees as $annee)
                            <option value="{{$annee->id_annee}}">{{ $annee->annee }}</option>
                            @endforeach
                          </select>
                      </div>
                      

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('type_av')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Type avancement</label>
                        <select class="form-control" name="type_av">
                          <option value="Avancé(e)">Avancé(e)</option>
                          <option value="Recruté(e)">Recruté(e)</option>
                          <option value="Reclassé(e">Reclassé(e)</option>
                          <option value="Intégré(e)">Intégré(e)</option>
                        </select>
                    </div>
                    </div>

                   

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('date_avan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Date avancement</label>
                        <input type="date" name="date_avan" class="form-control" id="exampleInputEmail1" placeholder="date recrutement" required>
                      </div>
                      <div class="form-group">
                        @error('corps')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Corps</label>
                        <select class="form-control" name="corps" id="corps" required>
                          <option value="">Corps</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('date_dec')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Date décision</label>
                        <input type="date" name="date_dec" class="form-control" id="exampleInputEmail1" placeholder="date decision" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Classes</label>
                          @error('classes')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <select class="form-control" name="classes" id="classes" required>
                          <option value="">Classes</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('echelons')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Echelons</label>
                        <select class="form-control" name="echelons" id="echelons" required>
                          <option value="">Echelons</option>
                        </select>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('indices')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Indices</label>
                        <select class="form-control" name="indices" id="indices" required>
                          <option value="">Indices</option>
                        </select>
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('note')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Note</label>
                        <input type="text" name="note"class="form-control" id="exampleInputPassword1" placeholder="note" required>
                      </div>
                        <div class="form-group">
                          <input type="hidden" name="employer_id" class="form-control" id="exampleInputPassword1" value="{{ $employer->id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Type</label>
                        <select class="form-control" name="type"  required>
                          <option value="Décision">Décision</option>
                          <option value="Arretée">Arrêtée</option>
                          <option value="note">Note</option>
                          <option value="Conrat">Contrat</option>

                        </select>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Enregistrez</button>
                  <a href="{{route('affectation.index')}}"class="btn btn-info btn-sm text-right">Suivant</a>
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
<script type=text/javascript>

  $('#annees').change(function(){

  var periodes_id = $(this).val();
  if(periodes_id){
    $.ajax({
      type:"POST",
      // url:"{{url('getCorps')}}?country_id="+countryID,
      url:"{{route('getCorps')}}",
      data:{periodes_id:periodes_id, _token: '{{csrf_token()}}'},
      success:function(res){
      if(res){
        $("#corps").empty();
        $("#corps").append('<option>Selectionner le corps</option>');
        $.each(res,function(key,value){
          $("#corps").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#corps").empty();
      }
      }
    });
  }else{
    $("#corps").empty();
    $("#classes").empty();
  }
  });

  $('#corps').change(function(){
  var corps_id = $(this).val();
  var annees=$("#annees").val();

  if(annees && corps_id){
    $.ajax({
      type:"POST",
      // url:"{{url('getCorps')}}?country_id="+countryID,
      url:"{{route('getClasses')}}",
      data:{annees:annees,corps_id:corps_id, _token: '{{csrf_token()}}'},
      success:function(res){
      if(res){

        $("#classes").empty();
        $("#classes").append('<option>Selectionner la Classe</option>');
        $.each(res,function(key,value){
          $("#classes").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#classes").empty();
      }
      }
    });
  }else{
    $("##classes").empty();
    $("#echelons").empty();
  }
  });

  $('#classes').change(function(){
    var classes_id = $(this).val();
    var corps_id = $("#corps").val();
    var annees=$("#annees").val();

  if(annees && corps_id && classes_id){
    $.ajax({
      type:"POST",
      // url:"{{url('getCorps')}}?country_id="+countryID,
      url:"{{route('getEchelons')}}",
      data:{annees:annees,corps_id:corps_id,classes_id:classes_id, _token: '{{csrf_token()}}'},
      success:function(res){
      if(res){

        $("#echelons").empty();
        $("#echelons").append('<option>Selectionner Echelons</option>');
        $.each(res,function(key,value){
          $("#echelons").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#echelons").empty();
      }
      }
    });
  }else{
    $("#echelons").empty();
    $("#echelons").empty();
  }
  });
  $('#echelons').change(function(){
  var echelons_id = $(this).val();
  var corps_id = $("#corps").val();
  var classes_id = $("#classes").val();
  var annees=$("#annees").val();

  if(annees && corps_id && echelons_id && classes_id){
    $.ajax({
      type:"POST",
      // url:"{{url('getCorps')}}?country_id="+countryID,
      url:"{{route('getIndices')}}",
      data:{annees:annees,corps_id:corps_id,echelons_id:echelons_id,classes_id:classes_id, _token: '{{csrf_token()}}'},
      success:function(res){
      if(res){

        $("#indices").empty();
        $("#indices").append('<option>Selectionner indices</option>');
        $.each(res,function(key,value){
          $("#indices").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#indices").empty();
      }
      }
    });
  }else{
    $("#indices").empty();
    $("#indices").empty();
  }
  });



</script>
</body>
</html>
