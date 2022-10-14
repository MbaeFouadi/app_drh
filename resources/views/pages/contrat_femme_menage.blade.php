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
            <p>Madame <strong>{{$employer->nom}} {{$employer->prenom}} </strong> ci-après désignée "La contractante" d'autre part;</p>
            <p>Il est convenu et arrêté ce qui suit:</p>
            <p><strong><span>Article</span>  1: Engagement</strong>
            <p>L'employeur recrute Madame <strong>{{$employer->nom}} {{$employer->prenom}} </strong> Pour les besoins de l'Université.</p>
            <p><Strong><span>Article</span> 2: Affectation</Strong>
            <p>La contractante est afféctée {{ $composante->composante }} en qualité de Femme de ménage. <br> Elle est placée sous l'autorité hiérarchique du doyen de composante. <br> Au besoin la contractante peut être affectée à tout autre composante de l'Université des Comores. </p>
            <p><strong><span>Article</span> 3: Prise d'effet et Durée</strong>
            <p>Le présent contrat est conclu pour une durée {{$contrat->Duree}}, qui prend effet à compter du {{\Carbon\Carbon::parse($contrat->date_debut)->translatedFormat('j F Y')}} au {{\Carbon\Carbon::parse($contrat->date_fin)->translatedFormat('j F Y')}}</p>
            <p><strong><span>Article</span> 4: rémunération </strong>
            <p>Dans le respect de la reglementation en vigueur en Union des Comores en matière du travail, <br> l'Employeur s'engage à verser au contractant , à titre de rémunération, un salaire mensuel bruit de cinquante cinq mille Franc Comoriens (55 000FC). <br> Le contractant ne pourra prétendre à aucune indemnité, ou allocation qui ne soit pas expréssement prévue dans ce contrat.</p>
            <p><strong><span>Article</span> 5: Mandant et Conduite</strong></p>
            <p>La contractante s'engage à consacrer son temps de travail, dans la limite de la réglementation en vigeur, à l'exercice des fonctions liées à la mission qui lui est confiée exigeant une présence affective et continue. <br>Elle ne peut exercer aucune autre activité professionnelle  pendant la durée du présent contrat.</p>
            <p>Elle s'abstient de toute acte , de toute manifestation et de tout type de déclaration publique pouvant compromettre les objectifs de développement que s'assigne l'institution universitaire.</p>
            <p>S'elle n'est pas censée renoncer à ses conviction politiques, la contractante ne doit cependant jamais perdre de vue la réserve et le tact qu'exigent ses fonctions au sein de l'Université des Comores.</p>
            <p><strong><span>Article</span> 6:Secret professionnel</strong></p>
            <p>La contractante s'abstient de communiquer à toute personne ou entité étrangère à l'Université des Comores les informations non publiées dont elle aura eu connaissance dans l'exercice de ses fonctions.</p>
            <p><strong><span>Article</span> 7: Règlement de différends</strong></p>
            <p>Toute réclamation ou tout différend concernant l'interprétation ou l'exécution du présent contrat se fait à l'amiable. A défaut de consensus, le différend sera soumis à la juridiction compétente en matière de droit de travil en vigueur en Unin des Comores.</p>
            <p><strong><span>Article</span> 8: Rupture du Contrat</strong></p>
            <p>Le présent contrat pourra être rompu:</p>
            <p>- à l'initiative du salarié; <br>- à l'initiative de l'employeur .<br> Dans l'un comme dans l'autre cas, un préavis devra être respecté et observé conformémment aux dispositions légales ou règlementaires en vigueur. <br> La rupture du contrat par l'employeur, justifiée par une cause réelle et sérieuse, entrainera le versement d'une indémnité de licenciement si le salarié a au moins un an d'ancienneté. <br> Cette indemnité n'est due en cas de faute grave ou lourde ou en cas de force majeure</p>
            <p><strong><span>Article</span> 9: Révision</strong></p>
            <p>Toute modification des termes du présent contrat doit être convenue et acceptée par consentement ecrit et signé des parties contractantes.</p> <br> <br> <br>
            <p class="text-right"> Fait à moroni, le 00/00/0000</p><br> <br> <br> <br> <br>
            <p class="text-center">LU ET APPROUVE</p><br><br> <br> <br> <br> <br> <br> <br> 
            <div class="row">
                <div class="col-md-6"><p> Le contractant <br><br> <br> <br> <br> <br>  <strong>{{$employer->nom}} {{$employer->prenom}}</strong></p></div><br><br>
                <div class="col-md-6"> <p class="right">L'Administrateur</p> <br><br><br> <br> <br> <br> <strong>Ibouroi ALI TABIBOU</strong> </div>

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