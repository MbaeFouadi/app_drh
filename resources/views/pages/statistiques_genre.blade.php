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
            <h1 class="text-info">Statiques par genre</h1>
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
                         
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quittez</button>
                          {{-- <button type="button" class="btn btn-primary">Enregistrez</button> --}}
                      </div>
                  </div>
              </div>
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
          <h3 class="card-title">Statiques par genre</h3>

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
                          Masculin
                      </th>
                      <th style="width: 20%">
                          Féminin
                      </th>
                      <th style="width: 30%">
                          Total
                      </th>
                    
                  </tr>
              </thead>
              <tbody>
               
                    <tr>
                      <td>
                          {{ $Masculin }}
                      </td>
                      <td>
                 
                          {{ $Feminin }}

                      </td>
                      <td>
                       {{  $Masculin + $Feminin }} 
                      </td>
                      
                    
                  </tr>
               








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
