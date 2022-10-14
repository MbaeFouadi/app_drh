<?php

use Carbon\Carbon;

Carbon::setLocale('fr'); ?>
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
  <link rel="shortcut icon" href="images/udc.png">

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


                                {{-- <div class="bd-example">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive">
                  Ajouter un compte
              </button>
          </div> --}}
                                <!-- <li class="breadcrumb-item active">Projects</li> -->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box --
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Congés</h3>
          </div>
        </div>-->


                <div class="card card-info">
                    <div class="card-header">

                        <h3 class="card-title">Edition contrat à titre de vacation</h3>

                    </div>
                    <!-- /.card-header -->

                    <div class="container">
                        <form action="{{route('form_vacation')}}" method="POST">
                            @csrf

                            <div class="card-body">

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('semestre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleInputEmail1">Semestre</label>
                                        <select name="semestre" id="" class="form-control">
                                            <option value="semestre1">Semestre 1</option>
                                            <option value="semestre1">Semestre 2</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('annee_academique')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="exampleInputEmail1">Année Academique</label>
                                        <select name="annee_academique" id="" class="form-control">
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2020-2021">2020-2021</option>
                                        </select>
                                        <input type="hidden" name="employer_id" class="form-control @error('date_fin') is-invalid @enderror" id="exampleInputEmail1" placeholder="date_fin"  require value="{{$id}}">
                                    </div>

                                </div>
                            </div>



                            <!-- /.card-body -->



                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-sm">Enrégistrer</button>
                                {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                            </div>
                        </form>
                    </div>

                </div>

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
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>

    <script>
        $(document).ready(function() {

            $("#form-add-user").submit(function(event) {
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

                data = {
                    pseudo,
                    login,
                    password,
                    password_confirmation,
                    role_id
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        ...data,
                        _token: '{{csrf_token()}}'
                    },
                    success: () => location.reload(),
                    error: (error) => {
                        console.log(error);
                        Object.entries(error["responseJSON"]["errors"]).map((name) => {
                            let element = `<div class="invalid-feedback">${name[1][0]}</div>`
                            let currentInput = form.find(`[name=${name[0]}]`)
                            currentInput.addClass("is-invalid")
                            $(element).insertAfter(currentInput)

                            let time = null
                            time = setTimeout(() => {
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
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>