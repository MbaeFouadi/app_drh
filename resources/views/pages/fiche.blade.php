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
  <link rel="shortcut icon" href="images/udc.png">


</head>

<body>
  <div class="container" id='sectionAimprimer'>
    <div class="row bloc1"  >
      <div class="col- logo " >
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
        <div class="col-md-9"><span style="border-right:2px solid black;padding-left:12px;padding-right:12px;font-size:23px"><i><b>Etat Civil</b></i></span></div>
        <div class="col-md-3 da" style="border-left:2px solid black;padding-left:12px;padding-right:12px;"><span>Date d'édition:{{$date}}</span></div>
      </div>
      <div class="etat"><br>
        <div class="row">
          <div class="col-6">
            <h2>{{$employer->nom }} {{$employer->prenom }}</h2>
          </div>
          <div class="col-4 " style="text-align:right;font-size:23px"> <span><strong>Matricule N°</strong></span> @if ($employer->mat_fop==NULL)
          {{$employer->matricule }}
          @else
          {{$employer->mat_fop }}
          @endif </div>
        </div>
        <div class="row"  id="taille">
          <div class="col-2">Ne(é) le</div>
          <div class="col-10"> {{\Carbon\Carbon::parse($employer->date_naissance)->translatedFormat('d/m/Y')}} à {{$employer->lieu_naissance}}</div>
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
        @if($formations->count()>0)
      </div><br><br>
      <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Formation Académique</b></i></span>
      <div class="formation">
        <div class="row"  id="taille">
          @foreach ($formations as $formation)
          <div class="col-md-6">{{$formation->annee }} {{$formation->diplome }} </div>
          <div class="col-md-6"> {{$formation->lieu }} {{$formation->genre }} </div>
          @endforeach

        </div><br><br>
        @endif

        {{-- <div class="row">
          <div class="col-md-6">Ingenieur </div>
          <div class="col-md-6"> Moroni</div>
        </div><br><br><br><br><br><br><br><br> --}}
        @isset($statut)

        <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Statut initial</b></i></span>

      </div>
      <div class="statut"  id="taille">
        <div class="">Recruté(e) le {{\Carbon\Carbon::parse($statut->date_re)->translatedFormat('d/m/Y')}} par {{$statut->type}} N°: {{$statut->note}} du {{\Carbon\Carbon::parse($statut->date_dec)->translatedFormat('d/m/Y')}}</div>
        <div>
          <div class="row">
            <div class="col-md-4">Corps: {{$grille->corp }}</div>
            <div class="col-md-4">{{$grille->classe }} Classe</div>
            <div class="col-md-4">Echelon:{{$grille->echelon }}</div>


          </div>
                 </div>
        <div>Indice:{{$grille->indice}}</div>
        <div> Ministere d'origine: {{$statut->ministere}}</div><br>
        @endisset

        @if($avancements->count()>0)
        <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Statut Actuel</b></i></span><span style="margin-left:10px">{{$employer->agent }}</span>

      </div>

      <div class="avancement"  id="taille">
        @foreach ($avancements as $avancement)
        <div class="">{{$avancement->type_av}} le {{\Carbon\Carbon::parse($avancement->date_avan)->translatedFormat('d/m/Y')}} par {{$avancement->type}}  {{$avancement->note}} du {{\Carbon\Carbon::parse($avancement->date_dec)->translatedFormat('d/m/Y')}}</div>
        <div class="row">
        <div class="col-md-4">Corps: {{$avancement->corp }}</div>
            <div class="col-md-4">{{$avancement->classe }} Classe</div>
            <div class="col-md-4">Echelon:{{$avancement->echelon }}</div>
        </div>
        <div>Indice:{{$avancement->indice}}</div><br><br>
        @endforeach
        @endif

        @isset($composante)
        <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Affectation</b></i></span><span style="margin-left:10px">Université des Comores</span>


      </div>
      <div class="affectation"  id="taille">
        <div class="row">
          <div class="col-md-9">

            <div>Composante : {{ $composante->composante }}</div>
            <div>Structure :{{ $composante->service }}</div>
            <div>N° Poste de travail:{{ $composante->numero_post }}</div>
            <div>Fonction: {{ $composante->nom }}</div><br>
            <div>Position : {{$employers->position}}</div>


            <br>
            @endisset

            <div  id="taille">Reglement par virement bancaire sur le compte SNPSF N°: {{$employer->compte_bancaire}}</div>
          </div>

          <div class="col-md-3 aff"  id="taille">
            <div class="signature">Signature & Cachet du DRH</div>
            <div class="tex">
              <p class="text-center"> <strong>Hassani Hamada</strong> <br> <br> 
            
               Certifiée et Conforme
              <p>
            </div>

          </div>
        </div>
      </div>

    </div>
    <div class="text-center">
      <p style="font-size: 12px"> Clamer que le chemin est long ne le raccourcit pas, le raccourcir c'est faire un pas en avant<br>
        <span style="font-size: 12px">udombowa dziya ke yishashiha yowushashiha hawurenga wusoni</span><br>
        <span style="font-size: 12px">Université des Comores, rue de Mavingouni BP 2585 Moroni- Tel:+269,7734243-7739023- Email:contact@univ-comores.km</span>
      </p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6"><a class="btn btn-primary" href="{{route('accueil') }}">Quittez</a></div>
      <div class="col-md-6"><button class="btn btn-primary"  onClick="imprimer('sectionAimprimer')">Imprimer</button></div>

    </div>
  </div>

  <script>
            function imprimer(divName){
                var restorepage=document.body.innerHTML;
                var printContent=document.getElementById(divName).innerHTML;

                document.body.innerHTML=printContent;
                window.print();
                document.body.innerHTML=restorepage;
            }
    </script>

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
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>