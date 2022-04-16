@extends('pages.conges.conges')
@section('meta-title', $title = "Mon congé")
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
            <h3>Détails du congé</h3>

            <div class="col-md-6">
            <table class="table">
              <tr>
                <td>Date du demande du congé</td><td>: <b>{{\Carbon\Carbon::parse($conge->created_at)->format('j F, Y')}}</b></td>
              </tr>
              <tr>
                <td>Date du debut du congé</td><td>: <b>{{\Carbon\Carbon::parse($conge->date_debut)->format('j F, Y')}}</b></td>
              </tr>
              <tr>
                <td>Nombre d'heures demandé</td><td>: <b>{{$conge->nombre_heure}}</b></td>
              </tr>
              <tr>
                <td>Heures restantes</td><td>: <b>{{$conge->heure}}</b></td>
              </tr>
            </table>
            </div>
            <hr>
            <div class="text-center">
              @if($conge->reponse==1 && $conge->is_ok==1)
              <span class='text-success' style="text-decoration:underline">Demande acceptée</span>
              <h5>{{$conge->motif}}</h5>
              @elseif($conge->reponse==1 && $conge->is_ok==0)
              <span class='text-danger' style="text-decoration:underline">Demande refusée</span>
              <h6 style="text-align:left">Motif du refus :</h6>
              <p>{{$conge->motif}}</p>
              @else
              <span class='text-warning' style="text-decoration:underline">{{$conge->motif}}</span>
              @endif
            </div>
          </div>

        <!-- ./col -->
      </div>
    </div>
  </section>
@endsection
