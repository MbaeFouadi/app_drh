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
  <script src="plugins/jquery/jquery.min.js"></script>

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
              <h1 class="text-center text-info">Affectation</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
                <li class="breadcrumb-item active">Affectation</li>
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
                  <h3 class="card-title">Affectation</h3>
                </div> <br>
                <!-- @if (session()->has('message'))
                <div class="alert alert-success">
                  {{session()->get('message')}}
                </div>
              @endif -->
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('affectation.store')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                          @error('annees')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputPassword1">Années</label>
                          <select class="form-control" name="annees" id="annees" required>
                          <option value="">Années</option>
                            @foreach($periodes as $periode )
                            <option value="{{$periode->annee_id}}">{{$periode->periode}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('composantes')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Composantes</label>
                          <select class="form-control" name="composantes" id="composantes" required>
                            <option>Composantes</option>
                            <!-- @foreach ($composantes as $composante)
                            <option value="{{$composante->id}}">{{ $composante->nom}}</option>
                            @endforeach -->
                          </select>
                        </div>
                        <div class="form-group">
                          @error('fonctions')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Fonctions</label>
                          <select class="form-control" name="fonctions" id="fonctions" required>
                            <option>Fonctions</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('services')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Services</label>
                          <select class="form-control" name="services" id="services" required>
                            <option>Services</option>
                          </select>
                        </div>

                        <div class="form-group">
                        @error('numero_post')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Poste de Travail</label>
                        <input type="text" name="numero_post" class="form-control" id="exampleInputPassword1" placeholder="Post de travail" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <!-- <div class="form-group">
                          @error('position')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Position</label>
                          <select class="form-control" name="position">
                            <option value="Actif">Actif</option>
                            <option value="Retraiter">Retraite</option>
                          </select>
                        </div> -->
                      
                      </div>
                        

                        <div class="form-group">
                          <input type="hidden" name="employer_id" class="form-control" id="exampleInputPassword1" value="{{ $employer->id }}">
                        </div>
                      </div>
                      <div class="col-md-6 form-group">
                        <!-- @error('numero_post')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Poste de Travail</label>
                        <input type="text" name="numero_post" class="form-control" id="exampleInputPassword1" placeholder="Post de travail">
                      </div> -->
                    </div>



                  </div>
                  <!-- /.card-body -->



                  <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm">Enregistrer</button>
                  <a href="{{route('accueil')}}"class="btn btn-info btn-sm text-right">Quitter</a>
                    {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                  </div>
                  @isset($erreur)
                  <div class="alert alert-danger">{{$erreur}}</div>
                  @endisset
                </form>
              </div>



            </div>
            <div class="col-md-6">
              <div class="card card-info card-outline">
                <div class="card-body box-profile">

                  <h3 class="profile-username text-center text-info">{{ $employer->nom }} {{ $employer->prenom }}</h3>

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
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <script type=text/javascript>
    $('#annees').change(function() {
      var annees_id = $(this).val();
      if (annees_id) {
        $.ajax({
          type: "POST",
          // url:"{{url('getCorps')}}?country_id="+countryID,
          url: "{{route('getComposantes')}}",
          data: {
            annees_id: annees_id,
            _token: '{{csrf_token()}}'
          },
          success: function(res) {
            if (res) {
              console.log(annees_id);
              $("#composantes").empty();
              $("#composantes").append('<option>Selectionner la composante</option>');
              $.each(res, function(key, value) {
                $("#composantes").append('<option value="' + key + '">' + value + '</option>');
              });

            } else {
              $("#composantes").empty();
            }
          }
        });
      } else {
        $("#services").empty();
        $("#service").empty();
      }
    });
    $('#composantes').change(function() {
      var composantes_id = $(this).val();
      var annees_id = $("#annees" ).val();
      if (composantes_id) {
        $.ajax({
          type: "POST",
          // url:"{{url('getCorps')}}?country_id="+countryID,
          url: "{{route('getServices')}}",
          data: {
            composantes_id: composantes_id,
            annees_id: annees_id,
            _token: '{{csrf_token()}}'
          },
          success: function(res) {
            if (res) {
              console.log(composantes_id);
              console.log(annees_id);

              $("#services").empty();
              $("#services").append('<option>Selectionner le service</option>');
              $.each(res, function(key, value) {
                $("#services").append('<option value="' + key + '">' + value + '</option>');
              });

            } else {
              $("#services").empty();
            }
          }
        });
      } else {
        $("#services").empty();
        $("#service").empty();
      }
    });

    $('#services').change(function() {
      var composantes_id = $("#composantes").val();
      var annees_id = $("#annees" ).val();
      var services_id = $(this).val();


      if (services_id) {
        $.ajax({
          type: "POST",
          // url:"{{url('getCorps')}}?country_id="+countryID,
          url: "{{route('getFonctions')}}",
          data: {
            composantes_id: composantes_id,
            annees_id: annees_id,
            services_id: services_id,
            _token: '{{csrf_token()}}'
          },
          success: function(res) {
            if (res) {

              $("#fonctions").empty();
              $("#fonctions").append('<option>Selectionner la fonction</option>');
              $.each(res, function(key, value) {
                $("#fonctions").append('<option value="' + key + '">' + value + '</option>');
              });

            } else {
              $("#fonctions").empty();
            }
          }
        });
      } else {
        $("#fonctions").empty();
        $("#fonctions").empty();
      }
    });

    // $('#fonctions').change(function() {
    //   var fonction_id = $(this).val();


    //   if (fonction_id) {
    //     $.ajax({
    //       type: "POST",
    //       // url:"{{url('getCorps')}}?country_id="+countryID,
    //       url: "{{route('getAnnees')}}",
    //       data: {
    //         fonction_id: fonction_id,
    //         _token: '{{csrf_token()}}'
    //       },
    //       success: function(res) {
    //         if (res) {

    //           $("#annees").empty();
    //           $("#annees").append('<option>Selectionner l\'annee</option>');
    //           $.each(res, function(key, value) {
    //             $("#annees").append('<option value="' + key + '">' + value + '</option>');
    //           });

    //         } else {
    //           $("#annees").empty();
    //         }
    //       }
    //     });
    //   } else {
    //     $("#annees").empty();
    //     $("#annees").empty();
    //   }
    // });
  </script>
</body>

</html>