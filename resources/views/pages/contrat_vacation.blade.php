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
    <link rel="stylesheet" href="{{ asset('contrat.css') }}">
    <link rel="shortcut icon" href="images/udc.png">


</head>

<body>
    <div>
        <div class="container"><br>
            <h2 class="text-center"><strong>UNION DES COMORES</strong></h2>
            <h6 class="text-center"><strong><i class="text-center" id="trait"> Unité-solidarité-Developpement</i></strong></h6>
            <p class="text-center entete" >MINISTERE DE L'EDUCATION NATIONALE, DE L'ENSEIGNEMENT,<br>DE LA RECHERCHE SCIENTIFIQUE, DE LA FORMATION <br> ET DE L'INSERTION PROFESSIONNELLE</p>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/udc.png')}}" alt="" width="70px" height="70px">
                </div>
                <div class="col-md-">
                    <h3 class="text-center">UNIVERSITE DES COMORES</h3>
                </div>
            </div>
            <h4 class="text-center">CONTRAT DE TRAVAIL A TITRE DE VACATION</h4>
            <div class="row">
                <div class="col-2">
                    <p><strong>N°22-</strong></p>
                </div>
                <div class="col-2"><strong>/UDC/ADM/DRH/CJ</strong></div>
            </div>
            <p class="text-center">Entre</p>
            <p>L'Université des Comores(UDC) representée par son Administrateur <strong>Ibouroi ALI TOIBIBOU </strong><br>ci-après dénommé "l'Employeur", d'une part;<br></p>
            <p class="text-center">Et</p>
            <p>Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> ci-après désignée "Le contractant" d'autre part;</p>
            <p>Il est conclu un contrat à titre de vacation conformément à la législation et réglementation en vigueur en Union des Comores.</p>
            <p>Il est convenu et arrêté ce qui suit:</p>
            <p><strong><span>Article</span>  1: Engagement</strong>
            <p>Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> titulaire d'une {{$formations->genre }} en {{$formations->diplome }}, obtenu à {{$formations->lieu }}, année académique {{$formations->annee }}, est engagé en qualité d'enseignant vacataire pour assurer les cours xxxxx à la {{ $composante->composante }}. <br> Cependant, le post occupé par le contractant est considéré comme un poste vacant en application des dispositions de la décision N°17-15/UDC/PR/CAB fixant certains principes liés aux services demandésaux enseignants en exercice à l'UDC du 05 septembre 2017</p>
            <p><strong><span>Article</span> 2: Durée et Volume horaire</strong></p>
            <p>La durée du présent contrat ouvre le 2ème semestre de l'année académique 2021-2022 conformement au calendrier universitaire  applicable , pour un volume horaire total de quatre vignt douze heures (92h).</p>
            <p><strong><span>Article</span> 3: Missions</strong><br>
            Le contractant s'engage, en qualité d'enseignement vacataire: <br>
            -A dispenser un enseignement conformément au programme qui lui sera donné dans les lieux qui lui seront indiqués par la scolarité. <br>- A remettre au près du chef de département un plan detaillé de son cours. <br> -A remplir à la fin de chaque séance la fiche de suivi de son cours. Cette dernière est établie par la scolarité <br> -A soumettre des sujets de contrôle des connaissances pour la première et la deuxième session. <br>-A surveiller ses examens <br>-A remettre les copies d'examens corrigées dans les délai requis. <br>-A participer à la déliberation des resultats.</p>
            <p><strong><span>Article</span>4 : Rémunération </strong>
            <p>L'Université des Comores s'engage à verser à l'intéressé à titre de rémunération cin mille sept cent cinquante francs Comoriens (5750FC) par heure de travail effectif. <br>Ne seront payées que les heures d'enseignements effectives qui seront effectuées par le contractant. <br>Aucune indemnité n'est dûe en cas de résiliation du présent contrat pour faute lourde commise par le contractant dans l'exercice de ses services.</p>
          
            <p><strong><span>Article</span> 5: Secret professionnel</strong></p>
            <p>Le contractant s'engage à la discrétion la plus absolue sur les informations non publiées qu'il pourra recueillir du fait de sa présence ou à l'occasion de ses services à l'Université des Comores.</p>
            <p><strong><span>Article</span> 6: Règlement de differends</strong></p>
            <p>Toute réclamation ou tout differend concernant l'interprétation ou l'exécution du présent contrat se fait à l'amiable. A défaut de règlement à l'amiable, le litige est réglé conformement à la législation nationale en vigueur sur le territoire de l'Union des Comores</p>
            <p><strong><span>Article</span> 7: Résiliation</strong></p>
            <p>L'une des parties peut résilier le présent contrat à tout moment en adressant à l'autre partie , un préavis d'un (01) mois.</p>
            <p><strong><span>Article</span> 8: Révision</strong></p>
            <p>Toute modification des termes du présent contrat doit être convenue et acceptée par consentement ecrit et daté des parties contractantes.</p> <br><br>
            <p class="text-right"> Fait à moroni, le 00/00/0000</p> <br> <br> <br> <br> <br> <br> <br> <br>
            <p class="text-center">LU ET APPROUVE</p> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            <div class="row">
                <div class="col-md-6"><p> Le contractant <br><br> <br> <br> <br>  <strong>{{$employer->nom}} {{$employer->prenom}}</strong></p></div><br>
                <div class="col-md-6"> <p class="right">L'Administrateur</p> <br><br> <br> <br>  <strong>Ibouroi ALI TABIBOU</strong> <br> <br> </div>

            </div> <br> 
            <hr>
            <p class="text-center pied">
                Clamer que le chemin est long ne le raccourcit pas le raccourcir c'est faire un pas en avant <br>
                Udomboawandziya ke yishashiha yowushashiha hawurenga wusoni <br>
                <i><strong>Université des Comores, rue de Mavingouni BP 2585 Moroni-Tél:+269 773 90 23</strong></i> <br>
                Site web: <span>www.univ-comores.km</span>  email: <span>contact@univ-comores.km</span>
            </p>

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
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>