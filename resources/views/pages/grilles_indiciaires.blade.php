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
              <h1 class="text-info text-center">Grilles indicaires</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="text-info">Accueil</a></li>
                <li class="breadcrumb-item active text-center">Grilles indicaires</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <ul>
        <li>
          @foreach ( $corps as $corp )
          <h3>Le Corps {{ $corp->nom}} </h3>
          <div class="container">
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Classes</th>
                  <th scope="col">Echelons</th>
                  <th scope="col">Indices</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  @isset($p4)
                  <td>Exceptionnelle </td>
                  @endisset
                  <td></td>
                  @isset($p4)
                  <td>{{$p4->indice}}</td>
                  @endisset
                <tr>

                  <td>Principalat</td>
                  <td>
                    @isset($p3)
                    <p>3ème échelon</p>
                      
                    @endisset
                    @isset($p2)
                    <p>2ème échelon</p>
                      
                    @endisset
                    @isset($p1)
                    <p>1er échelons</p>
                      
                    @endisset
                  </td>
                  <td>
                    @isset($p3)
                    <p>{{$p3->indices}}</p>
                      
                    @endisset
                    @isset($p2)
                    <p>{{$p2->indices}}</p>
                      
                    @endisset
                    @isset($p1)
                    <p>{{$p1->indices}}</p>
                      
                    @endisset
                  </td>
                </tr>
                <tr>
                  <td>1ère</td>
                  <td>
                    @isset($first3)
                    <p>3ème échelon</p>
                      
                    @endisset
                    @isset($first2)
                    <p>2ème échelon</p>
                      
                    @endisset
                    @isset($first1)
                    <p>1er échelons</p>
                      
                    @endisset
                  </td>
                  <td>
                    @isset($first3)
                    <p>{{$first3->indices}}</p>
                    @endisset
                    @isset($first2)
                    <p>{{$first2->indices}}</p>
                    @endisset
                    @isset($first1)
                    <p>{{$first1->indices}}</p>
                    @endisset
                  </td>
                </tr>
                <tr>
                  <td>2ème</td>
                  <td>
                    @isset($second4)
                    <p>4ème échelon</p>
                      
                    @endisset
                    @isset($second3)
                    <p>3ème échelon</p>
                      
                    @endisset
                    @isset($second2)
                    <p>2ème échelon</p>
                      
                    @endisset
                    @isset($second1)
                    <p>1er échelons</p>
                      
                    @endisset
                    @isset($stagiaire)
                    <p>Stagiaire</p>
                      
                    @endisset
                  </td>
                  <td>
                    @isset($second4)
                    <p>{{$second4->indices}}</p>
                      
                    @endisset
                    @isset($second3)
                    <p>{{$second3->indices}}</p>
                      
                    @endisset
                    @isset($second2)
                    <p>{{$second2->indices}}</p>
                      
                    @endisset
                    @isset($second1)
                    <p>{{$second1->indices}}</p>
                      
                    @endisset
                    @isset($stagiaire)
                    <p>{{$stagiaire->indices}}</p>
                      
                    @endisset
                  </td>
                </tr>

                </tr>

                <!-- @foreach ($echelons as $echelon )
                <tr>
                  <td> {{ $echelon->echelon}}</td>                 
                </tr>
                @endforeach -->

              </tbody>
            </table>
          </div>
          @endforeach
        </li>
        <a href="{{ route('corps_grille') }}" class="btn btn-primary">Autre corps</a>
      </ul>

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

      $("form[id^=form-add-]").each(function() {

        $(this).submit(function(event) {
          event.preventDefault()
          const currentUrl = $(this).attr("action").trim()
          const currentInput = $(this).find("input[name$=_in]")
          const name = currentInput.attr("name").trim()
          const value = currentInput.val().trim()

          $.ajax({
            type: "POST",
            url: currentUrl,
            data: {
              [name]: value,
              _token: '{{csrf_token()}}'
            },
            success: () => location.reload(),
            error: (error) => {
              console.log(error);
              let element = `<div class="invalid-feedback">${error["responseJSON"]["errors"][name][0]}</div>`
              currentInput.addClass("is-invalid")
              $(element).insertAfter(currentInput)

              let time = null
              time = setTimeout(() => {
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