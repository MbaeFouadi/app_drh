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
<!-- Site wrapper -->
<div class="wrapper">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/udc.png" alt="AdminLTELogo" height="60" width="60">
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
            <h1 class="text-info">Liste des utilisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Liste des utilisateurs</a></li> --}}
              <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLiveLabel">Ajout des comptes</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="{{ route('inscription') }}" >
                            @csrf
                              <div class="form-row" style="border-radius:50%;">
                                  <div class="form-group col-md-6">
                                    @error('pseudo')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                      <label for="inputPseudo">Nom et Prénom</label>
                                      <input type="text" class="form-control" name="pseudo" id="inputPseudo">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('login')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                      <label for="inputpseudoP">Login</label>
                                      <input type="text" class="form-control" name="login" id="inputpseudoP">
                                  </div>
                              </div>

                              <div class="form-row" style="border-radius:50%;">
                                  <div class="form-group col-md-6">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                      <label for="inputPseudo">Mot de passe</label>
                                      <input type="password" class="form-control" name="password" id="inputPseudo">
                                  </div>
                                  <div class="form-group col-md-6">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                      <label for="inputpseudoP">Confirmez Mot de passe</label>
                                      <input type="password" class="form-control" name="password_confirmation" id="inputpseudoP">
                                  </div>
                              </div>
                              <div class="form-row" style="border-radius:50%;">
                                  <div class="form-group col-md-6">
                                      <label for="inputPseudo">Categorie</label>
                                      <select class="form form-control" name="role_id">
                                        @foreach($role1 as $roles)
                                        <option value="{{$roles->id}}">{{$roles->display_name}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  {{-- <div class="form-group col-md-6">
                                      <label for="inputpseudoP">xxxxx</label>
                                      <input type="number" class="form-control" name="1ère" id="inputpseudoP">
                                  </div> --}}
                              </div>

                              <input type="submit" class="btn btn-lg btn-primary " name="form_en" value="Enregsitrer">
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quittez</button>
                          {{-- <button type="button" class="btn btn-primary">Enregistrez</button> --}}
                      </div>
                  </div>
              </div>
          </div>

          <div class="bd-example">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLive">
                  Ajouter un compte
              </button>
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
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Utilisateur</h3>

          <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nom et Prénom
                      </th>
                      <th style="width: 30%">
                          Role
                      </th>
                      <th>
                          Login
                      </th>

                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                    <tr>
                      <td>
                          {{$user->user_id }}
                      </td>
                      <td>
                          {{$user->name }}


                      </td>
                      <td>
                        {{$user->display_name }}

                      </td>
                      <td class="project_progress">
                        {{$user->login }}

                      </td>
                      <!-- <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td> -->
                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                @endforeach








              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
