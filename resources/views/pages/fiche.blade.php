<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UDC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('styles.css') }}">

</head>
<body>
  <div class="container">
    <div class="row bloc1">
      <div class="col- logo">
        <img src="{{ asset('images/udc.png') }}" class="text-center">
      </div>
      <div class="col-">
        <h1 class="text-center">UNION DES COMORES</h1>
        <p class="text-center">Unité-solidarité-Developpement</p>
        <h2 class="text-center"><span class="fi">FICHE SIGNALETIQUE</span></h2>
      </div>
    </div>
    <div class="grand-bloc">
      <div class="row">
        <div class="col-md-9" ><span  style="border-right:1px solid black;padding-left:12px;padding-right:12px;border-top:1px solid black;"><b>Etat Civil</b></span></div>
        <div class="col-md-3 da"  style="border-left:1px solid black;padding-left:12px;padding-right:12px;"><span>Date d'édition:01/01/2010</span></div>
      </div>
      <div class="etat">
        <div class="row">
          <div class="col-md-6"><h3>{{$employer->nom }} {{$employer->prenom }}</h3></div>
          <div class="col-md-6"> {{$employer->matricule }}</div>
        </div>
        <div class="row">
          <div class="col-2">Ne(é) le</div>
          <div class="col-10">{{$employer->date_naissance }} à {{$employer->lieu_naissance}}</div>
        </div>
        <div class="row">
          <div class="col-2">Demeurant à</div>
          <div class="col-10">{{$employer->adresse }}</div>
        </div>
        <div class="row">
          <div class="col-2">Telehone : {{$employer->telephone }}</div>
          <div class="col-10"> Email:{{$employer->email}}</div>
        </div>
        <div class="row">
          <div class="col-2">Sexe :{{$employer->sexe}}</div>
          <div class="col-10"> {{$employer->statut }} {{$employer->nombre_enfant }} Enfant dont {{$employer->nombre_charge }} charge Né(e) en {{$employer->naissance }}</div>
        </div>
      </div><br><br>
    <span style="border-right:1px solid black;padding-left:12px;padding-right:12px;border-top:1px solid black;"><b>Formation Académique</b></span>
      <div class="formation">
        <div class="row">
          @foreach ($formations as $formation)
            <div class="col-md-6">{{$formation->annee }} {{$formation->diplome }} </div>
            <div class="col-md-6"> {{$formation->lieu }} {{$formation->genre }} </div>
          @endforeach

        </div><br><br><br><br><br><br><br><br>
        {{-- <div class="row">
          <div class="col-md-6">Ingenieur </div>
          <div class="col-md-6"> Moroni</div>
        </div><br><br><br><br><br><br><br><br> --}}
      <span style="border-right:1px solid black;padding-left:12px;padding-right:12px;border-top:1px solid black;"><b>Statut initial</b></span>

      </div>
      <div class="statut">
        <div class="">Recruté le {{$statut->date_re }} par note {{$statut->note}} du decision {{ $statut->date_dec}}</div>
        <div>Corps:{{$grille->corp }} {{$grille->classe }} Class   Echelon:{{$grille->echelon }}</div>
        <div>indice:{{$grille->indice}}</div>
        <div> Ministere d'origine: {{$statut->ministere}}</div><br>
      <span style="border-right:1px solid black;padding-left:12px;padding-right:12px;border-top:1px solid black;"><b>Statut Actuel</b></span><span style="margin-left:10px">Latos</span>

      </div>
      <div class="avancement">
        @foreach ($avancements as $avancement)
        <div class="">Avancé le {{$avancement->date_avan }} par décision {{$avancement->note}} du {{$avancement->date_dec}}</div>
        <div>Corps: {{$grilles->corp}} {{$grilles->classe }} Class   Echelon:{{$grilles->echelon}}</div>
        <div>indice:{{$grilles->indice}}</div><br><br>
        @endforeach

    <span style="border-right:1px solid black;padding-left:12px;padding-right:12px;border-top:1px solid black;"><b>Affectation</b></span><span style="margin-left:10px">Université des Comores</span>

      </div>
      <div class="affectation">
        <div class="row">
          <div class="col-md-9">

            <div>Composante : {{ $composante->composante }}</div>
            <div>Structure :{{ $composante->service }}</div>
            <div>N° Poste de travail:{{ $composante->numero_post }}</div>
            <div>Fonction: {{ $composante->nom }}</div><br>
            <div>Position : {{ $composante->position }}</div>


            <br><br><br>
             <div>Reglement par virement bancaire sur le compte SNPSF N°:{{$employer->compte_bancaire}}</div>
          </div>
          <div class="col-md-3 aff">
            <div class="signature">Cachet & Cachet du DRH</div>
            <div class="tex">
              <p class="text-center">Hassani Hamada<p>
              <p class="text-center">Certifiée et Conforme<p>
            </div>

          </div>
        </div>
      </div>

    </div>
    <div class="text-center">
      <p style="font-size: 12px"> clamer que le chemin est long ne le raccourcit pas, le raccourcir c'est faire un pas en avant<br>
        <span style="font-size: 12px">udombowa dziya ke yishashiha yowushashiha hawurenga wusoni</span><br>
        <span style="font-size: 12px">Université des comores, rue de la corniche, BP 2585 Mroni- Tel:(+269) 773 42 27/7734243/7739023-couriel:univ-com@comorestelecom-km</span>
      </p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6"><a class="btn btn-primary" href="{{route('accueil') }}">Quittez</a></div>
      <div class="col-md-6"><button class="btn btn-primary">Imprimer</button></div>
  
    </div>
  </div>
  
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
</body>
</html>
