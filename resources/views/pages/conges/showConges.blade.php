<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <style>
      .t td{
          padding: 5px;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('images/udc.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
   @include('includes.navbar')


  <!-- Main Sidebar Container -->
  @include('includes.sidebar')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Liste des utilisateurs</a></li> --}}
              

          <div class="bd-example">
              {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive">
                  Ajouter un compte
              </button> --}}
          </div>
              <!-- <li class="breadcrumb-item active">Projects</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Edition d'un congé</b></h3>

          <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card p-0 container t">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <table>
                            <tr>
                                <td>Matricule</td>
                                <td>: <span class="text-success"><b>{{$employe->matricule}}</b></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table>
                            <tr>
                              <td>Nom</td>
                              <td>: <span class="text-success"><b>{{$employe->nom}}</b></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table>
                          <tr>
                              <td>Prénom</td>
                              <td>: <span class="text-success"><b>{{$employe->prenom}}</b></span></td>
                          </tr>
                        </table>
                    </div>
                </div>
          
         </div>
         
        </div>
        <div class="card text-center container" style="">
            <table class="table table-bordered mt-2">
                <tr>
                    <th>Date</th>
                    <th>Heures demandées</th>
                    <th>Heures restantes</th>
                </tr>
                <tr>
                    <td>{{$employe->date_debut}}</td>
                    <td>{{$employe->nombre_jour}}</td>
                    <td>{{$employe->jour}}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <div class="d-flex mb-2 mt-1 text-center" style="text-align: center;">
                
                        <form action="{{route('conges.update', $employe->idConge)}}" method="post">
                         @csrf
                         @method('PUT')
                         <input type="number" name="idEmpl" id="" value="{{$employe->id}}" hidden>
                         <input type="number" name="modConge" id="" value="1" hidden>

                         
                            <button type="submit" class="m-3 btn btn-success">Accepter</button>
                            
                        </form>
                       <button type="button" class="m-3 btn btn-danger btn-refus">Refuser</button>
        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card p-2 refus">
            <form action="{{route('conges.update', $employe->idConge)}}" method="post">
                @csrf
                @method('PUT')
                         <input type="number" name="idEmpl" id="" value="{{$employe->id}}" hidden>
                         <input type="number" name="modConge" id="" value="0" hidden>
                <label for="motif">Motif du refus</label>
                <textarea name="motif" id="" class="form-control mb-2" cols="28" rows="2" required></textarea>
                <button type="submit" class="btn btn-info">Envoyer</button>
                <button type="button" class="btn btn-warning btn-annuler">Annuler</button>
            </form>
        </div>
        <!-- /.card-body -->
      
      <!-- /.card -->

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
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".refus").fadeOut(1, function(){
            $(".s").fadeIn(500)
        });
    })

</script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.btn-refus', function(){
            $(".s").fadeOut(3, function(){
                $(".refus").fadeIn(1000)
            });
        });
        $(document).on('click', '.btn-annuler', function(){
            $(".refus").fadeOut(3, function(){
                $(".s").fadeIn(1000)
            });
        });
    });
</script>
<div class="s"></div>
<script>
  $(document).ready( function () {

      $("#form-add-user").submit( function (event) {
          event.preventDefault()
          const url = $(this).attr("action").trim()
          let data = {}

          /* $(this).find("input[name], select[name]").each( function () {
              const target = $(this)
              const name = target.attr('name')
              const value = target.val().trim()
              data[name] = (isNaN(value) === false && value !== "") ? Number(value) : value
          }) */
          const form = $(this)
          const pseudo = form.find("input[name=pseudo]").val().trim()
          const login = form.find("input[name=login]").val().trim()
          const password = form.find("input[name=password]").val().trim()
          const password_confirmation = form.find("input[name=password_confirmation]").val().trim()
          const role_id = parseInt(form.find("select[name=role_id]").val().trim())

          data = {pseudo, login, password, password_confirmation, role_id}

          $.ajax({
            type: "POST",
            url: url,
            data: {...data, _token: '{{csrf_token()}}'},
            success: () => location.reload(),
            error: (error) => {
                console.log(error);
                Object.entries(error["responseJSON"]["errors"]).map( (name) => {
                    let element = `<div class="invalid-feedback">${name[1][0]}</div>`
                    let currentInput = form.find(`[name=${name[0]}]`)
                        currentInput.addClass("is-invalid")
                    $(element).insertAfter(currentInput)

                    let time = null
                    time = setTimeout( () => {
                        currentInput.removeClass("is-invalid")
                        currentInput.next(".invalid-feedback").remove()
                        if (time !== null) time = null
                    }, 15000)
                })
            }
          });
      })
  })
</script>
</body>
</html>
