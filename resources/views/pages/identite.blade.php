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
              <h1 class="text-right text-info">Etat civil</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item text-red"><a href="#" class="text-info">Accueil</a></li>
                <li class="breadcrumb-item active">Etat Civil</li>
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
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Etat civil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('employer.store')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('nin')
                          <div class="alert alert-danger">{{ $message }}
                          </div>
                          @enderror
                          <label for="exampleInputEmail1">Nin <span style="color:red">*</span></label>
                          <input type="text" class="form-control @error('nin') is-invalid @enderror " id="exampleInputEmail1" placeholder="Nin" name="nin" value="{{old('nin')}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      {{-- <div class="col-md-6">
                    <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                    <label for="exampleInputEmail1">Matricule</label>
                    <input type="text" class="form-control @error('matricule') is-invalid @enderror " id="exampleInputEmail1" placeholder="Matricule" name="matricule">
                  </div>
                  {{-- <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}
              </div>
              @enderror
              <label for="exampleInputPassword1">Date naissance <span style="color:red">*</span></label>
              <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date naissance">
            </div>
          </div> --}}
          <div class="col-md-6">
            {{-- <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}
          </div>
          @enderror
          <label for="exampleInputEmail1">Nom et Prenom</label>
          <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Nom et Prenom">
        </div> --}}
        {{-- <div class="form-group">
                      @error('lieu_naissance')
                      <div class="alert alert-danger">{{ $message }}
    </div>
    @enderror
    <label for="exampleInputPassword1">Lieu naissance <span style="color:red">*</span></label>
    <input type="text" name="lieu_naissance" class="form-control" id="exampleInputPassword1" placeholder="Lieu naissance">
  </div> --}}
  </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        @error('nom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Nom <span style="color:red">*</span></label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror " id="exampleInputEmail1" placeholder="Nom" name="nom" value="{{old('nom')}}">
      </div>
      <div class="form-group">
        @error('date_naissance')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Date naissance <span style="color:red">*</span></label>
        <input type="date" name="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Date naissance" value="{{old('date_naissance')}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        @error('prenom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Prénom <span style="color:red">*</span></label>
        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputEmail1" placeholder="Prenom" value="{{old('prenom')}}">
      </div>
      <div class="form-group">
        @error('lieu_naissance')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Lieu naissance <span style="color:red">*</span></label>
        <input type="text" name="lieu_naissance" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Lieu naissance" value="{{old('lieu_naissance')}}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Adresse <span style="color:red">*</span></label>
        @error('adresse')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" value="{{old('adresse')}}" name="adresse" class="form-control @error('adresse') is-invalid @enderror" id="exampleInputEmail1" placeholder="Adresse">
      </div>
      <div class="form-group">
        @error('telephone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Téléphone <span style="color:red">*</span></label>
        <input type="text" value="{{old('telephone')}}" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="exampleInputPassword1" placeholder="Telephone">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        @error('sexe')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Sexe <span style="color:red">*</span></label>
        <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
          <option value="">Sexe</option>
          <option value="M" @if (old('sexe')=="M" ) {{ 'selected' }} @endif>M</option>
          <option value="F" @if (old('sexe')=="F" ) {{ 'selected' }} @endif>F</option>

        </select>
      </div>
      <div class="form-group">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Email <span style="color:red"></span></label>
        <input type="email" value="{{old('email')}}" name="email" class="form-control " id="exampleInputPassword1" placeholder="Email">
        {{-- <input type="password" name="password" class="form-control" id="xampleInputPassword1" value="password" hidden> --}}

      </div>

    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        @error('statut')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Statut <span style="color:red">*</span></label>
        <select class="form-control @error('statut') is-invalid @enderror" name="statut">
          <option value="">Statut</option>
          <option value="Célibataire" @if (old('statut')=="Célibataire" ) {{ 'selected' }} @endif>Célibataire</option>
          <option value="Fiancé" @if (old('statut')=="Fiancé" ) {{ 'selected' }} @endif>Fiancé</option>
          <option value="Marié" @if (old('statut')=="Marié" ) {{ 'selected' }} @endif>Marié</option>
        </select>
      </div>
      <div class="form-group">
        @error('nombre_charge')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Nombre de charge</label>
        <input type="number" value="{{old('nombre_charge')}}" name="nombre_charge" class="form-control @error('nombre_charge') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nombre de charge">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        @error('nombre_enfant')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Nombre d'enfant</label>
        <input type="number" value="{{old('nombre_enfant')}}" name="nombre_enfant" class="form-control @error('nombre_enfant') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nombre d'enfant">
      </div>
      <div class="form-group">
        @error('naissance')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Né(e) en </label>
        <input type="text" value="{{old('naissance')}}" name="naissance" class="form-control @error('naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Né(e) en">
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-6">
      <div class="form-group">
        @error('compte_bancaire')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputPassword1">Compte Bancaire <span style="color:red">*</span></label>
        <input type="text" value="{{old('compte_bancaire')}}" name="compte_bancaire" class="form-control @error('compte_bancaire') is-invalid @enderror" id="exampleInputPassword1" placeholder="Compte Bancaire">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        @error('annee')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Année recrutement <span style="color:red">*</span></label>
        <select class="form-control @error('annee') is-invalid @enderror" name="annee">
          <option value="">Année</option>
          @foreach($annees as $anne)
          @if (old('annee')==$anne->annee)
          <option value="{{$anne->annee}}" selected>{{$anne->annee}}</option>
          @else
          <option value="{{$anne->annee}}">{{$anne->annee}}</option>
          @endif
          @endforeach
        </select>
      </div>

    </div>
  </div>
  <div class="row">



    <div class="col-md-6">
      <div class="form-group">
        @error('position_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">position <span style="color:red">*</span></label>
        <select class="form-control @error('position_id') is-invalid @enderror" name="position_id">
          <option value="">position</option>
          @foreach($positions as $position)
          @if (old('position_id')==$position->id)
          <option value="{{$position->id}}" selected>{{$position->position}}</option>

          @else
          <option value="{{$position->id}}">{{$position->position}}</option>

          @endif
          @endforeach
        </select>
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
        @error('type_contrat_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Type de Contrat <span style="color:red">*</span></label>
        <select class="form-control @error('type_contrat_id') is-invalid @enderror" name="type_contrat_id">
          <option value="">Type contrat</option>
          @foreach($contrats as $contrat)
          @if (old('type_contrat_id')==$contrat->id)
          <option value="{{$contrat->id}}" selected>{{$contrat->code_design_contrat}}</option>
            
          @else
          <option value="{{$contrat->id}}">{{$contrat->code_design_contrat}}</option>
            
          @endif
          @endforeach
        </select>
      </div>

    </div>
  </div>
  <!-- /.card-body -->



  <div class="card-footer">
    <button type="submit" class="btn btn-info btn-sm">Enregistrer</button>
    {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                  <button type="submit" class="btn btn-danger">Supprimer</button> --}}
  </div>
  </form>
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
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>