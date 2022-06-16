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
            <h4 class="text-center">CONTRAT DE TRAVAIL A DUREE INDETERMINEE</h4>
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
            <p>L'employeur s'engage à recruter Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> titulaire d'une {{$formations->genre }} en {{$formations->diplome }}, obtenu à {{$formations->lieu }}, année académique {{$formations->annee }} pour les besoins de l'Université</p>
            <p><Strong><span>Article</span> 2: Affectation</Strong>
            <p>Le contractant est affécté {{ $composante->composante }} en qualité {{ $composante->numero_post }} où il est placé sous l'autorité hiérarchique du Chef de Service. <br> Au besoin le contractant peut être affecté à tout autre Service de l'Université des Comores. </p>
            <p><strong><span>Article</span> 3: Missions</strong>
            <p>Le contractant est placé sous la supervision du Chef de Service qui determine les missions à lui confier.</p>
            <!-- <p><strong><span>Article</span> 6: Mandant et Conduite</strong></p> -->
            <p><strong><span>Article</span> 4: Durée du Contrat</strong>
            <p>Le present contrat est conclu pour une durée indeterminée, à compter du {{\Carbon\Carbon::parse($contrat->date_debut)->translatedFormat('j F Y')}}</p>
            <p><strong><span>Article</span> 5: rémunération </strong>
            <p>Dans le respect de la reglementation en vigueur en Union des Comores en matière du travail, <br> l'Employeur s'engage à verser au contractant , au titre de rémunération un salaire mensuel calculé sur la base de l'indice @if(isset($grilles)) {{$grilles->indice}} @else {{$grille->indice}} @endif. <br> Le contractant ne pourra prétendre à aucune indémnité, ou allocation qui ne soit pas expréssement prévue dans ce contrat.</p>
            
            <p><strong><span>Article</span> 6: Obligation professionnelle </strong> <br>
                Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong> s'engage à conserver une discrétion absolue sur tous les fichiers et documents internes à l'Université des Comores pendant toute la durée du présent contrat et après la rupture de celui-ci quelle que soit la cause. <br> Par l'obligation de discrétion et de secret professionnel, le contactant s'abstient de communiquer à toute personne ou entité etrangères à l'Université des Comores des informations non publiées dont il a ou aura eu connaissance dans l'exercices de ses fonctions.<br>Le contractant s'engage à consacrer son temps de travail, dans la limite de la reglementation en vigueur, à l'exercice de la fonction liée aux missions qui lui sont confiées exigeant une présence effective et continue. <br> Il est interdit au contractant d'exercer une autre activité professionnelle lucrative de manière permanente pendant la durée du présent contrat. <br> La non-observation de cette disposition, justifiée par une cause réelle et sérieuse manifestement irréfutable, peut entrainer la resiliation automatique du présent contrat. <br> Il s'abstient de toute acte, de toute manifestation et de tout type de déclaration publique pouvant compromettre les objectifs de développement que s'assigne l'institution universitaire.  
            </p>
            <p><strong><span>Article</span> 7: congés</strong></p>
            <p>Le contractant a droit aux congés au même titre que les agents appartenant à son corps professionnel. <br> En cas de maladie dûment constatée mettant le contractant dans l'impossibilité d'exercer ses fonctions, Il est placé en congé maladie pendant la durée du congé maladie, il conserve le bénéfice de l'intégralité de sa rémunération aux taux prévu à l'article 4 du présent contrat. <br> La jouissance du congé maladie, qui ne doit excéder la durée d'un mois, est accordé sur demande écrite et accompagnée d'un certificat médical, adressé par voie hiérarchique au Président de l'Université des Comores qui ,in fine , la transmet à la Direction des Ressources Humaines pour compétance et traitement. Le service utilisateur en reçoit copie pour information.</p>
            <p><strong><span>Article</span> 8: Règlement de différends</strong></p>
            <p>Toute différend lié à l'interpretation ou l'exécution du présent contrat se fait à l'amiable. A défaut de reglèment à l'amiable, le litige est reglé conformement à la législation nationale en vigueur sur le territoire de l'Union des Comores.</p>
            <p><strong><span>Article</span> 9: Rupture du Contrat</strong></p>
            <p>Le présent contrat pourra être rompu: <br>-à l'initative du salarié; <br>-à l'initiative de l'employeur. <br> Dans l'un comme dans l'autre cas , un préavi devra être respecté et observé conformement aux dispositions légales ou règlementaires en vigueur. <br> La rupture du contrat par l'employeur, justifiée par une cause réelle et sérieuse , entrainera le versement d'une indemnité de licenciement si le salarié a au moins un an d'ancienneté. <br> Cette indemnité n'est due en cas de faute grave ou lourde ou en cas de force majeure</p>
            
            <p><strong><span>Article</span> 10: Révision</strong></p>
            <p>Toute modification des termes du présent contrat doit être convenue et acceptée par consentement ecrit et daté des parties contractantes.</p>
            <p class="text-right"> Fait à moroni, le 00/00/0000</p>
            <p class="text-center">LU ET APPROUVE</p> <br>
            <div class="row">
                <div class="col-md-6"><p> Le contractant <br><br> <br>  <strong>{{$employer->nom}} {{$employer->prenom}} </strong></p></div><br>
                <div class="col-md-6"> <p class="right">L'Administrateur</p> <br><br>  <strong>Ibouroi ALI TABIBOU</strong> <br> <br> </div>

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