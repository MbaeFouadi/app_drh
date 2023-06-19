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
            <h2> &nbsp;{{$employer->nom }} {{$employer->prenom }}</h2>
          </div>
          <div class="col-4 " style="text-align:right;font-size:23px"> <span><strong>Matricule N°</strong></span> @if ($employer->mat_fop==NULL)
          {{$employer->matricule }}
          @else
          {{$employer->mat_fop }}
          @endif </div>
        </div>
        <div class="row"  id="taille">
          @if ($employer->sexe=="M")
          <div class="col-2"> &nbsp; Né le :</div>
          @else($employer->sexe=="F")
          <div class="col-2"> &nbsp; Née le :</div>
          @endif
        
          <div class="col-4"> {{\Carbon\Carbon::parse($employer->date_naissance)->translatedFormat('d/m/Y')}} à {{$employer->lieu_naissance}}</div>
          <div class="col-1"> &nbsp; Email :</div>
          <div class="col-5">{{$employer->email}}</div>
        </div>
        <div class="row">
          <div class="col-2"> &nbsp; Demeurant à :</div>
          <div class="col-4">{{$employer->adresse }}</div>
          <div class="col-1"> &nbsp; Sexe :</div>
          <div class="col-5">{{$employer->sexe}}</div>
        </div>
        <div class="row">
          <div class="col-2">&nbsp; Téléhone :</div>
          <!-- <div class="col-10"> Email:{{$employer->email}}</div> -->
          <div class="col-10">{{$employer->telephone }}</div>
        </div>
        <!-- <div class="row">
          <div class="col-2">&nbsp; Email: </div>
         
          <div class="col-10">{{$employer->email}}</div>
        </div> -->
        <div class="row">
          <!-- <div class="col-2"> &nbsp; Sexe :{{$employer->sexe}}</div> -->
          <div class="col-10">&nbsp; {{$employer->statut }} {{$employer->nombre_enfant }} Enfant dont {{$employer->nombre_charge }} charge Né(e) en {{$employer->naissance }}</div>
        </div>
        @if($formations->count()>0)
      </div><br><br>
      <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Formation Académique</b></i></span>
      <div class="formation">
        <div class="row"  id="taille">
          @foreach ($formations as $formation)
          <div class="col-md-6">&nbsp; {{$formation->annee }} {{$formation->diplome }} </div>
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
        <div class="">&nbsp; @if ($employer->sexe=="M")
        Recruté
        @else($employer->sexe=="F")
        Recrutée
        @endif  le {{\Carbon\Carbon::parse($statut->date_re)->translatedFormat('d/m/Y')}} par {{$statut->type}} N°: {{$statut->note}} du {{\Carbon\Carbon::parse($statut->date_dec)->translatedFormat('d/m/Y')}}</div>
        <div>
          <div class="row">
            <div class="col-md-4">&nbsp; Corps: {{$grille->corp }}</div>
            <div class="col-md-4">&nbsp; Classe: {{$grille->classe }}</div>
            <div class="col-md-4">&nbsp; Echelon: {{$grille->echelon }}</div>


          </div>
                 </div>
        <div>&nbsp; Indice:{{$grille->indice}}</div>
        <div>&nbsp; Ministere d'origine: {{$statut->ministere}}</div><br>
        @endisset

        @if($avancements->count()>0)
        <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Statut Actuel</b></i></span><span style="margin-left:10px">{{$employer->agent }}</span>

      </div>

      <div class="avancement"  id="taille">
        @foreach ($avancements as $avancement)
        <div class="">&nbsp; {{$avancement->type_av}} le {{\Carbon\Carbon::parse($avancement->date_avan)->translatedFormat('d/m/Y')}} par {{$avancement->type}}  {{$avancement->note}} du {{\Carbon\Carbon::parse($avancement->date_dec)->translatedFormat('d/m/Y')}}</div>
        <div class="row">
        <div class="col-md-4">&nbsp; Corps: {{$avancement->corp }}</div>
            <div class="col-md-4">&nbsp; Classe: {{$avancement->classe }} </div>
            <div class="col-md-4">&nbsp; Echelon: {{$avancement->echelon }}</div>
        </div>
        <div>&nbsp; Indice:{{$avancement->indice}}</div><br>
        @endforeach
        @endif

        @isset($composante)
        <span style="border-right:2px solid black;padding-left:12px;padding-right:12px;border-top:2px solid black; font-size:23px"><i><b>Affectation</b></i></span><span style="margin-left:10px">Université des Comores</span>


      </div>
      <div class="affectation"  id="taille">
        <div class="row">
          <div class="col-md-9">

            <div>&nbsp; Composante : {{ $composante->composante }}</div>
            <div>&nbsp; Structure :{{ $composante->service }}</div>
            <div>&nbsp; N° Poste de travail:{{ $composante->numero_post }}</div>
            <div>&nbsp; Fonction: {{ $composante->nom }}</div>
            <div>&nbsp; Corps : {{$composante->corps}}</div>

            <div>&nbsp; Position : {{$employers->position}}</div>



            
            @endisset <br> <br>

            <div  id="taille">&nbsp; Reglement par virement bancaire sur le compte SNPSF N°: {{$employer->compte_bancaire}}</div>
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