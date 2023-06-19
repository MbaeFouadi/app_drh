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

            <!-- Main content -->
            <section class="content">
                <div class="container "><br>
                    <h2 class="text-center display-4 text-info">Composantes</h2><br><br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ route('liste_composantes')}}" method="POST">
                                @csrf
                                @error('search')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Composantes</label>
                                        <select class="form-control" name="composantes_id" id="composantes" required>
                                            <option value="">Selectionner la composante</option>
                                            @foreach ($composantes as $composante)
                                            <option value="{{$composante->id}}">{{$composante->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Services</label>
                                        <select class="form-control" name="services_id" id="services" required>
                                            <option value="">Selectionner le service</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Valider</button>

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
  <script src="//code.jquery.com/jquery.js"></script>

    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type=text/javascript>
        // var id=$("#xD").attr("sec");
        alert(id)
        $('#composantes').change(function() {
            var composantes_id = $(this).val();
            if (composantes_id) {
                $.ajax({
                    type: "POST",
                    // url:"{{url('getCorps')}}?country_id="+countryID,
                    url: "{{route('getService')}}",
                    data: {
                        composantes_id: composantes_id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(res) {
                     
                        if (res) {
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
                $("#services").empty();
            }
        })
    </script>
</body>

</html>