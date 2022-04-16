@extends('pages.conges.conges')
@section('meta-title', $title = "Mon profil")
@section('content')
<section class="content">
  @if(session()->has('congeOk1'))
  <script type="text/javascript">
    alert("Vous avez demandé un congés. Merci d'attendre une réponse.");
  </script>
  @endif
  @if(session()->has('congeOk2'))
  <script type="text/javascript">
    alert("Vous avez demandé un congés. Merci d'attendre une réponse.");
  </script>
  @endif
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

        <div class="col-md-12">
          <!-- small box -->
          <div class="card p-5">
            <h3>Mes informations</h3>

            <div class="row">
              <div class="col-md-6">
              <table class="table">
                <tr>
                  <td>Matricule</td><td>: <b>{{$employer->matricule}}</b></td>
                </tr>
                <tr>
                  <td>Nom</td><td>: <b>{{$employer->nom}}</b></td>
                </tr>
                <tr>
                  <td>Prénom</td><td>: <b>{{$employer->prenom}}</b></td>
                </tr>
                <tr>
                  <td>Email</td><td>: <b>{{$employer->email}}</b></td>
                </tr>
              </table>
              </div>
              <div class="col-md-6">
              <table class="table">
                <tr>
                  <td>Téléphone</td><td>: <b>{{$employer->telephone}}</b></td>
                </tr>
                <tr>
                  <td>Adresse</td><td>: <b>{{$employer->adresse}}</b></td>
                </tr>
                <tr>
                  <td>Staut</td><td>: <b>{{$employer->statut}}</b></td>
                </tr>
                <tr>
                  <td>Compte bancaire</td><td>: <b>{{$employer->compte_bancaire}}</b></td>
                </tr>
              </table>
              </div>
            </div>
            <hr>
            <h6><span class="text-success"><b>Modification du mot de passe</b></span></h6>

            <div class="text-center">
              @if(session()->has('anc'))
                <p class="text-danger text-center">
                ° {{ session()->get('anc') }}
              </p>
              @endif
            </div>
            <form class="form-groupe" method="POST" action="{{ route('password.update') }}">
              @csrf
              {{--@method('PUT')--}}
              <div class="row mt-3">
                 <div class="col-md-3">
                   <input type="password" minlength="2" class="form-control" name="anc_pwd" placeholder="Ancien mot de passe" required>
                 </div>
                 <div class="col-md-3">
                   <input type="password" minlength="2" class="form-control" name="pass1" placeholder="Nouveau mot de passe" required>
                 </div>
                 <div class="col-md-3">
                   <input type="password" minlength="2" class="form-control" name="pass2" placeholder="Confirmer mot de passe" required>
                 </div>
                 <div class="col-md-3">
                   <input type="submit" class="form-control btn btn-info" name="" value="Modifier">
                 </div>
               </div>
            </form>

          </div>

        <!-- ./col -->
      </div>
    </div>
  </section>
@endsection
