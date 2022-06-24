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
            <h1 class="text-info">Affectation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
              <li class="breadcrumb-item active">Affecttion</li>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('affectations.store')}}" method="POST">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Corps</label>
                      <select class="form-control" name="corps">
                        {{-- <option>FST</option>
                        <option>IUT</option>
                        <option>Administration central</option> --}}
                        @foreach ($corps as $corp)
                        <option value="{{$corp->id}}">{{ $corp->nom }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Echelons</label>
                      <select class="form-control" name="echelons">
                        @foreach ($echelons as $echelon)
                        <option value="{{$echelon->id}}">{{ $echelon->nom }}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Classes</label>
                      <select class="form-control"  name="classes">
                        @foreach ($classes as $classe)
                        <option value="{{$classe->id}}">{{ $classe->nom }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Indices</label>
                      <select class="form-control" name="indices">
                        @foreach ($indices as $indice)
                        <option value="{{$indice->id}}">{{ $indice->nom }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  </div>




                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Année</label>
                        <select class="form-control" name="periodes">
                          @foreach ($annees as $annee)
                        <option value="{{$annee->id}}">{{ $annee->annee }}</option>
                        @endforeach
                        </select>
                      </div>

                    </div>
                </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <input type="submit" class="btn btn-info btn-sm" value="Enregistrer">
                  {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                </div>
                @isset($messages)
                  <div class="alert alert-danger">{{$messages}}</div>
                @endisset
              </form>
            </div>



          </div>

          <!--/.col (right) -->
        </div>
        <div class="col-md-6">
          <!-- Form Element sizes -->
          <div class="card card-info">
          <div class="card-header">
              <h3 class="card-title">Ajout</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body row">
                <div class=" col-md-6">
                  {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right"> --}}
                      {{-- <li class="breadcrumb-item"><a href="#">Liste des utilisateurs</a></li> --}}
                      <div id="exampleModalLive1" class="modal fade" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLiveLabel">Ajout corps</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form method="POST" action="{{route('corps')}}" id="form-add-corps">
                                    @csrf
                                      <div class="form-row" style="border-radius:50%;">
                                          <div class="form-group col-md-8">
                                              @error('corps_in')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <label for="inputPseudo">Nom</label>
                                              <input type="text" class="form-control" name="corps_in" id="inputPseudo">
                                          </div>

                                      </div>


                                      <input type="submit" class="btn btn-md btn-primary "  value="Enregsitrez">
                                  </form>

                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Quittez</button>

                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="bd-example">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLive1">
                          Ajouter un corps
                      </button>
                  </div>
                      <!-- <li class="breadcrumb-item active">Projects</li> -->
                    {{-- </ol>
                  </div> --}}
                </div>
                <div class="col-md-6">
                  <div id="exampleModalLive2" class="modal fade" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLiveLabel">Ajout des echelons</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="{{route('echelons')}}" id="form-add-echelons">
                                @csrf
                                  <div class="form-row" style="border-radius:50%;">
                                      <div class="form-group col-md-8">
                                          <label for="inputPseudo">Nom</label>
                                          <input type="text" class="form-control" name="echelons_in" id="inputPseudo">
                                      </div>

                                  </div>

                                  <input type="submit" class="btn btn-md btn-primary"  value="Enregsitrez">
                              </form>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Quittez</button>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="bd-example">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLive2">
                      Ajoute un échelon
                  </button>
              </div>
                </div>


            <!-- /.card-body -->
          </div>
          <div class="card-body row">
            <div class=" col-md-6">
              {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> --}}
                  {{-- <li class="breadcrumb-item"><a href="#">Liste des utilisateurs</a></li> --}}
                  <div id="exampleModalLive3" class="modal fade" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLiveLabel">Ajout classe</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="{{route('classes')}}" id="form-add-classes">
                                @csrf
                                  <div class="form-row" style="border-radius:50%;">
                                      <div class="form-group col-md-8">
                                          <label for="inputPseudo">Nom</label>
                                          <input type="text" class="form-control" name="classes_in" id="inputPseudo">
                                      </div>

                                  </div>


                                  <input type="submit" class="btn btn-md btn-primary" value="Enregsitrez">
                              </form>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Quittez</button>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="bd-example">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLive3">
                      Ajouter une classe
                  </button>
              </div>
                  <!-- <li class="breadcrumb-item active">Projects</li> -->
                {{-- </ol>
              </div> --}}
            </div>
            <div class="col-md-6">
              <div id="exampleModalLive4" class="modal fade" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLiveLabel">Ajout un indice</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="{{route('indices')}}" id="form-add-indices">
                            @csrf
                              <div class="form-row" style="border-radius:50%;">
                                  <div class="form-group col-md-8">
                                      <label for="inputPseudo">Nom</label>
                                      <input type="text" class="form-control" name="indices_in" id="inputPseudo">
                                  </div>
                              </div>

                              <input type="submit" class="btn btn-md btn-primary" value="Enregsitrez">
                          </form>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quittez</button>

                      </div>
                  </div>
              </div>
          </div>

          <div class="bd-example">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLive4">
                  Ajouter un indice
              </button>
          </div>
            </div>


        <!-- /.card-body -->
      </div>
          <!-- /.card -->


          <!-- /.card -->


          <!-- /.card -->
          <!-- general form elements disabled -->

        </div>
        <!-- /.row -->
      </div>
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
  /*$(function () {
  });*/

  $(document).ready(function() {
    bsCustomFileInput.init();

     $("form[id^=form-add-]").each( function () {

         $(this).submit( function (event) {
            event.preventDefault()
            const currentUrl = $(this).attr("action").trim()
            const currentInput = $(this).find("input[name$=_in]")
            const name = currentInput.attr("name").trim()
            const value = currentInput.val().trim()

            $.ajax({
              type: "POST",
              url: currentUrl,
              data: {[name]: value, _token: '{{csrf_token()}}'},
              success: () => location.reload(),
              error: (error) => {
                  console.log(error);
                  let element = `<div class="invalid-feedback">${error["responseJSON"]["errors"][name][0]}</div>`
                  currentInput.addClass("is-invalid")
                  $(element).insertAfter(currentInput)

                  let time = null
                  time = setTimeout( () => {
                      currentInput.removeClass("is-invalid")
                      currentInput.next(".invalid-feedback").remove()
                      if (time !== null) time = null
                  }, 15000)
              }
            });
         })
     })

  })
</script>
</body>
</html>
