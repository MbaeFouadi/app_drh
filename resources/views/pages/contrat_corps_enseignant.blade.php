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
            <p><strong> <span>Article</span></strong> 1: Dispositions générales</p>
            <p>Dans le cadre des missions d'enseignement universitaire, le Contrat à durée déterminée est, dans l'entendement de l'Université des Comores et en application des dispositions de l'article 34, alinéa 2 du code de travail en vigueur en Union des Comores, l'exécution effective d'une mission d'enseignement de deux semestres succesifs, les grandes vacances exclues. <br> Les dipositions du Code du travail mentionnées dans le paragraphe précédent ne s'appliquent ni au contrat de vacation ni au contrat à durée determinée, limité expressément à un ou plusieurs semestres qui ne se succèdent pas. <br>  Le contractant bénéficiaire des dipositions du présent contrat doit, dans les cinq premières semaines qui suivent sa prise de service, remettre à la Direction des Ressources Humaines une copie de son plan de cours annuel validé à la fois par le chef de la composante d'affectation et le chef du département dont il relève. Le plan du cours doit être découpé en deux semestres. <br> L'absence de plan de cours validé par les responsables compétents de la composante et son dépôt à la Direction des Ressources Humaines dans les délais impartis entrainent suspension de salaire.<p>
            <p><strong><span>Article</span>  2: Engagement</strong>
            <p>L'employeur recrute Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> titulaire d'une {{$formations->genre }} en , obtenu à , année académique {{$formations->lieu }}, pour les besoins de l'Université des Comores. <br> Cependant, le post occupé par le contractant est considéré comme un poste vacant en application des dispositions de la décision N°17-15/UDC/PR/CAB fixant certains principes liés aux services demandésaux enseignants en exercice à l'UDC du 05 septembre 2017</p>
            <p><Strong><span>Article</span> 3: Affectation</Strong>
            <p>Le contractant est affécté {{ $composante->composante }} en qualité {{ $composante->numero_post }} <br>Il est placé sous l'autorité hiérarchique du Doyen de la composante et travaille sous le contrôle direct du chef de département concerné. <br> <br> Au besoin le contractant peut être affecté à tout autre composante de l'Université des Comores ou être chargé d'assurer d'autres missions. </p>
            <p><strong><span>Article</span> 4: Prise d'effet et Durée</strong>
            <p>Le present contrat est conclu pour l'année académique 2021-2022, à compter de la date de prise de service jusqu'au terme du 2eme semestre.</p>
            <p><strong> <span>Article</span> 5:Renouvellement du contrat</strong></p>
            <p>Le renouvellement du contrat n'est pas automatique. Il est subordonné tant à une évaluation des pérformance et des resultats des services rendus qu'à des besoins eventuels qui seraient préalablement exprimés par écrit par une des composantes de l'Université des Comores avant le début des cours.</p>
            <p><strong> <span>Article</span> 6:Missions</strong></p>
            <p>Le contractant s'engage en sa qualité d'enseignant à assurer des activités d'enseignement , d'encadrement et d'évaluation , objet du présent contrat. <br> Le contractant s'engage à consacrer tout son temps, dans la limite de la réglementation en vigueur, à l'exercice des fonctions liées à la mission qui lui est confiée exigeant une présence effective et continue durant les jours ouvrables et heures de service à sa charge, définies par l'administration de l'Université des Comores.</p>
            <p> <strong> <span>Article</span> :7 Conduite</strong></p>
            <p>Le contractant ne peut exercer une autre activité professionnelle lucrative de manière permanente pendant la durée du présent contrat. <br> La non-observation de cette disposition , accompagnée de preuves manifestement irréfutables, peut entrainer la résiliation automatique du présent contrat.<br> Il s'abstient de toute acte , de toute manifestation et de toute type de déclaration publique pouvant compromettre les objectifs de développement que s'assigne l'Université Des Comores. <br> S'il n'est pas censé renoncer à ses convictions politiques, le contractant ne doit cependant pas perdre de vue la réserve qu'éxigent ses fonctions au sein de l'Institution.</p>
            <p><strong><span>Article</span>8 : Rémunération </strong>
            <p>Le contractuel sera rémunéré sur la base de la grille indiciaire du corps des Administrateurs appartenant au cadre du personnel IATOS. a ce titre et dans le respect de la réglementationen vigeur de l'Union des Comores en matière de travail, l'Employeur s'engage à verser au contractant, à titre de rénumération, un salaire bruit mensuel, calculé sur la base de l'indice @if(isset($grilles)) {{$grilles->indice}} @else {{$grille->indice}} @endif. Il s'ajoute une indemnité mensuelle de cinquante pour cent (50%) du salaire de base lorsque le contractant affectue des missions d'enseignement. <br> Le contractant ne peut prétendre à aucune autre indemnité ou allocation qui ne soit pas expréssement prévue dans le présent contrat.</p>
          
            <p><strong><span>Article</span> 9: congés</strong></p>
            <p>Le contractant a droit aux congés intermédiaires, quelque soit  son statut au même titre que les agents appartenant à son corps professionnel. <br> En cas de maladie dûment constatée mettant le contractant dans l'impossibilité d'exercer ses fonctions, Il est placé en congé maladie.Pendant la durée du congé maladie, il conserve le bénéfice de l'intégralité de sa rémunération aux taux prévu à l'article 8 du présent contrat. <br> La jouissance du congé maladie, qui ne doit excéder la durée d'un mois, est accordé sur demande écrite et accompagnée d'un certificat médical, adressée par voie hiérarchique au Président de l'Université des Comores qui ,in fin , le transmet à la Direction des Ressources Humaines pour compétance,traitement et suivi. Le service utilisateur et la Direction des Etudes et de la Scolarité  en reçoivent copie pour, respectivement, toutes fins utiles et information.</p>
            <p><strong><span>Article</span> 10: Secret professionnel</strong></p>
            <p>Le contractant s'abstient de comuniquer à toute personne ou entité étrangère l'Université des Comores les informations non publées dont il aura eu connaissance dans l'exercice de ses fonctions</p>
            <p><strong><span>Article</span> 11: Règlement de differends</strong></p>
            <p>Toute réclamation ou tout différend concernant l'interprétation ou l'exécution du présent contrat se fait à l'amiable. A défaut de reglement à l'amiable, le litige est réglé conformément à la législation nationale en vigueur</p>
            <p><strong><span>Article</span> 12: Résiliation</strong></p>
            <p>L'une des parties peut résilier le présent contrat à tout moment en adressant à l'autre partie , un prévis d'un (01) mois.<br> En cas de faute lourde , l'Employeur peut resilier le présent contrat avec des effets immédiat et moyennant notification en application des articles 1,5,6,7 et 10 ci-dessus. En pareil cas , aucune indémnité n'est due.</p>
            <p><strong><span>Article</span> 13: Révision</strong></p>
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