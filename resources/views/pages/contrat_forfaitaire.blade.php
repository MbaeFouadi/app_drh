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
            <h4 class="text-center">CONTRAT DE TRAVAIL A DUREE DETERMINEE</h4>
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
            <p>Il est convenu et arrêté ce qui suit:</p>
            <p><strong><span>Article</span>  1: Engagement</strong>
            <p>L'employeur recrute Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> </p>
            <p><Strong><span>Article</span> 2: Affectation</Strong>
            <p>Le contractant est affécté {{ $composante->composante }} où il est chargé {{ $composante->numero_post }}. <br> Il est placé sous l'autorité hiérachique du Directeur de l'Institut. </p>
            <p><strong><span>Article</span> 3: Prise d'effet et Durée</strong>
            <p>Le présent contrat est conclu pour la période du {{$contrat->semestre}} de l'année académique {{$contrat->année_academique}}, qui prend effet à compter de la date prise de service jusqu'au terme du semestre.</p>
            <p><strong><span>Article</span> 4: rémunération </strong>
            <p>L'Université des Comores s'engage à verser , en contrepartie et à titre de rémunération, une indemnité compensatrice mensuelle d'un montant de cent mille francs (KMF 100 000) au contractant pour service rendu.<br> Le contractant ne pourra, en raison de travail, ne prétendre à aucune indémnité, ou allocation qui ne soit pas expressément prévue par le présent contrat.</p>
            <p><strong><span>Article</span> 5: Missions et activités</strong>
            <p>Le contractant s'engage en sa qualité d'enseignant, à assurer des activités et missions d'enseignement, d'encadrement, d'évaluation et de recherche objet du présent contrat.</p>
            <p><strong><span>Article</span> 6:Secret professionnel</strong></p>
            <p>Le contractant s'abstient de communiquer à toute personne ou entité étrangère à l'Université des Comores les informations non publiées dont il aura eu connaissance dans l'exercice de ses fonctions.</p>
            <p><strong><span>Article</span> 7: Règlement de differends</strong></p>
            <p>Toute litige portant sur l'interprétation ou l'exécution du présent contrat se règle à l'amiable par les deux parties. <br> A défaut de consensus, le différend sera soumis aux lois et règlements en vigueur en Union des Comores.</p>
            <p><strong><span>Article</span> 10: Révision</strong></p>
            <p>Toute modification des termes du présent contrat doit être convenue et acceptée par consentement ecrit et signé des parties contractantes.</p><br> <br> <br>
            <p class="text-right"> Fait à moroni, le 00/00/0000</p><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            <p class="text-center">LU ET APPROUVE</p><br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br>
            <div class="row">
                <div class="col-md-6"><p> Le contractant <br><br> <br> <br> <br> <br> <br>  <strong>{{$employer->nom}} {{$employer->prenom}}</strong></p></div><br><br>
                <div class="col-md-6"> <p class="right">L'Administrateur</p> <br><br><br> <br> <br> <br> <br>  <strong>Ibouroi ALI TABIBOU</strong> </div>

            </div>
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