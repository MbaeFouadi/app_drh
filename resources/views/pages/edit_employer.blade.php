<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shortcut icon" href="images/udc.png">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('images/udc.png') }}" alt="AdminLTELogo" height="60" width="60">
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
            <h1 class="text-right text-info">Modification</h1>
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
              <form action="{{route('employer.update',$data->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                  {{-- <div class="col-md-6">
                    <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <label for="exampleInputEmail1">Matricule</label>
                      <input type="text" class="form-control @error('matricule') is-invalid @enderror " id="exampleInputEmail1" placeholder="Matricule" name="matricule">
                    </div>
                    {{-- <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <label for="exampleInputPassword1">Date naissance</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date naissance">
                    </div>
                  </div> --}}
                  <div class="col-md-6">
                    {{-- <div class="form-group">
                      @error('matricule')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <label for="exampleInputEmail1">Nom et Prenom</label>
                      <input type="text" name=""class="form-control" id="exampleInputEmail1" placeholder="Nom et Prenom">
                    </div> --}}
                    {{-- <div class="form-group">
                      @error('lieu_naissance')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <label for="exampleInputPassword1">Lieu naissance</label>
                      <input type="text" name="lieu_naissance" class="form-control" id="exampleInputPassword1" placeholder="Lieu naissance">
                    </div> --}}
                  </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('nin')
                          <div class="alert alert-danger">{{ $message }}
                          </div>
                          @enderror
                          <label for="exampleInputEmail1">Nin</label>
                          <input type="text" class="form-control @error('nin') is-invalid @enderror " id="exampleInputEmail1" placeholder="Nin" name="nin" value="{{$data->nin}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('mat_fop')
                          <div class="alert alert-danger">{{ $message }}
                          </div>
                          @enderror
                          <label for="exampleInputEmail1">Matricule FOP</label>
                          <input type="text" class="form-control @error('mat_fop') is-invalid @enderror " id="exampleInputEmail1" placeholder="Matricule FOP" name="mat_fop" value="{{$data->mat_fop}}">
                        </div>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror " id="exampleInputEmail1" placeholder="Nom" name="nom" value="{{ $data->nom }}">
                      </div>
                      <div class="form-group">
                        @error('date_naissance')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Date naissance</label>
                        <input type="date" name="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Date naissance" value="{{ $data->date_naissance }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('prenom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Prénom</label>
                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="exampleInputEmail1" placeholder="Prenom" value="{{ $data->prenom }}">
                      </div>
                      <div class="form-group">
                        @error('lieu_naissance')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Lieu naissance</label>
                        <input type="text" name="lieu_naissance" class="form-control @error('lieu_naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Lieu naissance" value="{{ $data->lieu_naissance }}">
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse</label>
                        @error('adresse')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" id="exampleInputEmail1" placeholder="Adresse" value="{{$data->adresse  }}">
                      </div>
                      <div class="form-group">
                        @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Téléphone</label>
                        <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="exampleInputPassword1" placeholder="Telephone" value="{{ $data->telephone }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('sexe')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Sexe</label>
                          <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                            <option value="{{ $data->sexe }}">{{ $data->sexe }}</option>
                            <option value="M">M</option>
                            <option value="F">F</option>

                          </select>
                      </div>
                    <div class="form-group">
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Email" value="{{ $data->email }}">
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
                          <label for="exampleInputEmail1">Statut</label>
                            <select class="form-control @error('statut') is-invalid @enderror" name="statut">
                              <option value="{{ $data->statut }}">{{ $data->statut }}</option>
                              <option value="Célibataire">Célibataire</option>
                              <option value="Fiancé">Fiancé</option>
                              <option value="Marié">Marié</option>
                            </select>
                        </div>
                      <div class="form-group">
                        @error('nombre_charge')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputPassword1">Nombre de charge</label>
                        <input type="number" name="nombre_charge" class="form-control @error('nombre_charge') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nombre de charge" value="{{ $data->nombre_charge }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        @error('nombre_enfant')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          <label for="exampleInputPassword1">Nombre d'enfant</label>
                          <input type="number" name="nombre_enfant"class="form-control @error('nombre_enfant') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nombre d'enfant" value="{{ $data->nombre_enfant }}">
                      </div>
                      <div class="form-group">
                        @error('naissance')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          <label for="exampleInputPassword1">Né(e) en </label>
                          <input type="text" name="naissance" class="form-control @error('naissance') is-invalid @enderror" id="exampleInputPassword1" placeholder="Né(e) en" value="{{ $data->naissance }}">
                      </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        @error('compte_bancaire')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          <label for="exampleInputPassword1">Compte Bancaire</label>
                          <input type="text" name="compte_bancaire" class="form-control @error('compte_bancaire') is-invalid @enderror" id="exampleInputPassword1" placeholder="Compte Bancaire" value="{{ $data->compte_bancaire }}">
                      </div>
                    </div>

                   
                    <div class="col-md-6">
      <div class="form-group">
        @error('annee')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Année recrutement </label>
        <select class="form-control @error('annee') is-invalid @enderror" name="annee">
          <option value="{{ $data->annee_id }}">{{ $data->annee_id }}</option>
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
          <option value="{{$posi->posi_id}}">{{$posi->position}}</option>
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
        <label for="exampleInputEmail1">Type de Contrat </span></label>
        <select class="form-control @error('type_contrat_id') is-invalid @enderror" name="type_contrat_id">
          <option value="{{$contrate->contrat_id}}">{{$contrate->code_design_contrat}}</option>
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
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        @error('position_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="exampleInputEmail1">Agent Origine<span style="color:red">*</span></label>
        <select class="form-control @error('statut') is-invalid @enderror" name="agent">
          <option value="{{ $data->agent }}">{{ $data->agent }}</option>
          <option value="IATOS" @if (old('statut')=="IATOS" ) {{ 'selected' }} @endif>IATOS</option>
          <option value="FOP" @if (old('statut')=="FOP" ) {{ 'selected' }} @endif>FOP</option>
        </select>
      </div>

    </div>


    </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Modifier</button>
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
    <!-- Main content -->
    
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Statut initiale</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @isset($statut)
                <form  action="{{route('form.update',$statut->id)}}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('annees')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Année</label>
                            <select class="form-control" name="annees" id="annees">
                              <option>{{ $annee->annee }}</option>
                              @foreach ($annees as $annee)
                              <option value="{{$annee->id}}">{{ $annee->annee }}</option>
                              @endforeach
                            </select>
                        </div>

                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('date_re')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Date recrutement</label>
                          <input type="date" name="date_re" class="form-control" id="exampleInputEmail1" placeholder="date recrutement" value="{{ $statut->date_re }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Corps</label>
                            @error('corps')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <select class="form-control" name="corps" id="corps">
                              <option value="{{ $statut->corps_id }}">{{ $statut->corp }}</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('date_dec')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Date décision</label>
                          <input type="date" name="date_dec" class="form-control" id="exampleInputEmail1" placeholder="date decision" value="{{ $statut->date_dec }}">
                        </div>
                        <div class="form-group">
                          @error('classes')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Classes</label>
                          <select class="form-control"  name="classes" id="classes">
                            <option value="{{ $statut->classes_id}}">{{ $statut->classe }}</option>
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
                            <select class="form-control" name="echelons" id="echelons">
                              <option value="{{ $statut->echelons_id}}">{{ $statut->echelon }}</option>

                            </select>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('indices')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Indices</label>
                          <select class="form-control" name="indices" id="indices">
                            <option value="{{ $statut->indices_id}}">{{ $statut->indice }}</option>

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
                          <input type="text" name="note"  class="form-control @error('note') is-invalid @enderror" id="exampleInputPassword1" value="{{ $statut->note}}">
                        </div>

                      </div>

                      <div class="col-md-6">
                      <div class="form-group">
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="exampleInputEmail1">Type</label>
                        <select class="form-control" name="type"  >
                        <option value="{{ $statut->type}}">{{ $statut->type}}</option>
                          <option value="Décision">Décision</option>
                          <option value="Arretée">Arrêtée</option>
                          <option value="note">Note</option>
                          <option value="Contrat">Contrat</option>


                        </select>
                      </div>

                    </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @error('ministere')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <label for="exampleInputEmail1">Ministère  Origine</label>
                          <input type="text" name="ministere"  class="form-control @error('ministere') is-invalid @enderror" id="exampleInputEmail1" value="{{ $statut->ministere}}">
                        </div>
                      </div>

                    </div>



                  </div>
                  <!-- /.card-body -->



                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-info btn-sm">Modifier</button>
                    {{-- <button type="submit" class="btn btn-warning">Modifier</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button> --}}
                  </div>
                </form>
          @endisset

             
            </div>



          </div>

          <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-body box-profile">

                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Avancement</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          
                            <th>
                              Matricule
                            </th>
                            <th>
                              Nom et Prénom
                            </th>
                            <th>
                              Date avancement
                            </th>
                            <th>
                              Action
                            </th>
                          
                        </tr>
                        </thead>
                        @foreach($avancements as $avancement)
                          <tbody>
                          
                            <tr>
                              
                              <td>
                                {{ $avancement->matricule }}

                              </td>
                              <td>
                                {{ $avancement->nom }} {{ $avancement->prenom }} 

                              </td>
                              <td>
                                {{ $avancement->date_avan }}
                                
                              </td>
                              <td>
                                <a class="btn btn-info btn-xs" href="{{route('avancement.show',$avancement->id_ava) }}">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                              </a>
                              <a class="btn btn-danger btn-xs text-left" href="{{route('avancement.show',$avancement->id_ava) }}">
                                <i class="fas fa-trash">
                                </i>
                              </td>
                            
                            
                            
                          </tr>
                    
                          </tbody>
                       
                        @endforeach
                       
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>


                </div>
                <!-- /.card-body -->
              </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Formation</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                      <th>
                        Matricule
                      </th>
                      <th>
                        Nom et Prénom
                      </th>
                      <th>
                        Diplôme
                      </th>
                      <th>
                        Action
                      </th>
                    
                  </tr>
                  </thead>
                  @foreach($formations as $formation)
                  <tbody>
                  
                    <tr>
                      
                      <td>
                        {{ $formation->matricule }}

                      </td>
                      <td>
                        {{ $formation->nom }} {{ $formation->prenom }} 
                      </td>
                      <td>
                        {{ $formation->diplome }}
                      </td>
                      <td>
                        <a class="btn btn-info btn-xs" href="{{route('formation.show',$formation->id_formation) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                      </a>
                      <a class="btn btn-danger btn-xs text-left" href="{{route('formation.show',$formation->id_formation) }}">
                        <i class="fas fa-trash">
                        </i>
                      </td>
                     
                     
                     
                  </tr>
             
                  </tbody>
                  @endforeach
                
                 
                </table>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              
             
            </div>



          </div>
          <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-body box-profile">

                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Affectation</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          
                            <th>
                              Matricule
                            </th>
                            <th>
                              Nom et Prénom
                            </th>
                            <th>
                              Composante
                            </th>
                            <th>
                              Action
                            </th>
                          
                        </tr>
                        </thead>
                        @foreach($affectations as $affectation)
                        <tbody>
                        
                          <tr>
                            <td>
                              {{ $affectation->matricule }}
      
                            </td>
                            <td>
                              {{ $affectation->nom }} {{ $affectation->prenom }} 
                            </td>
                            <td>
                              {{ $affectation->composante }}
                              
                            </td>
                            <td>
                              <a class="btn btn-info btn-xs" href="{{route('affectation.show',$affectation->id_affec) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <a class="btn btn-danger btn-xs text-left" href="{{route('affectation.show',$affectation->id_affec) }}">
                              <i class="fas fa-trash">
                              </i>
                            </td>
                           
                           
                           
                        </tr>
                   
                        </tbody>
                        @endforeach
                        
                       
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>


                </div>
                <!-- /.card-body -->
              </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
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
