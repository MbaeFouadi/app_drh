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
            <p><strong><span>Article</span>  1: Engagement et affectation</strong>
            <p>L'employeur s'engage à recruter ,pour les besoins de l'Université des Comores, Monsieur <strong>{{$employer->nom}} {{$employer->prenom}} </strong>, en qualité d'agent sécurité. <br> <strong>{{$employer->nom}} {{$employer->prenom}} </strong> est placé sous l'autorité et le contrôle hiéarchique du Chef de Service de la Prévention et Sécurité Universitaire lequel organisera et procédera à son affectation en fonction des besoins des différents sites de l'Université des Comores. <br>La carrière du contractant évolue dans la catégorie C correspondant à des emplois spécialisés. Il requiert un niveau minimum de formation de BEPC , assorti d'une formation professionnelle. Le contractant est soumis aux dispositions du manuel du Service de la Prevention et de la Sécrurité Universitaire ainsi qu'à celles des délibérations relatives aux statuts du cadre du personnel IATOS, notamment celle liées aux sanctions disciplinaires. <br> L'admission à la retraite qui marque la fin normale d'activité du contractuel est fixée à 55 ans.</p>
            <p><strong><span>Article</span> 2: Missions</strong>
            <p>Le contractant sera entre autres chargés notamment des missions générales suivantes: <br>- Exécuter toutes les missions émanant de son supérieur hiérarchique; <br>- Assurer d'une manière générale, toutes les tâches visant à améliorer la sécurité des sites où il est affecté qui seront sous sa supervision; <br>-Utiliser à bon escient le matériel mis à sa disposition; <br>-Effectuer des rondes de sécurité; <br>- Signaler au chef de groupe toute manquementu aux consignes générales, particulière ou autre infraction ou incident survenus lors de son service; <br>-Assister et orienter les visiteurs autorisés ou signalés désirant accéder dans le liste; <br>-Porter secours à toute personne évoluant sur le site et se trouvant en situation d'une quelconque détresse; <br>-Seconder ou remplacer n'importe quel agent de surveillance, dans le cadre des besoins de service; <br>Etre disponible à tout moment.</p>
            <p><strong><span>Article</span> 3: Prise d'effet et Durée</strong>
            <p>Le présent contrat est conclu pour une durée indéterminée à compter de la date de prise de service. Cependant le contractant est soumis à un période probatoire de trois (03) mois avant d'être titularisé dans le corps des agents de surveillance de la Catégorie C précité à l'article 1, alinéa 3 du présent contrat. <br>La période probatoire n'est pas renouvelable. Le non respect de consigne de quelque nature que ce soit pendant cette période de stage est consigné dans un rapport mensuel. La récidive des faits de même nature peut constituer un facteur éliminatoire. <br> La titularisation du contractant est subordonnée à une évaluation positive des performances, notamment celles qui sont liées au respect scrupuleux de l'ensemble des dipositions des textes qui régissent son service et sa carrière</p>
            <p><strong><span>Article</span> 4: Mandant et Conduite</strong></p>
            <p>Le contractant s'engage à consacrer son temps de travail, dans la limité de la reglementation en vigeur, à l'exercice des fonctions liées à la mission qui lui est confié exigeant une présence affective et continue. <br> </p>
            <p>La non observation de cette disposition , accompagné de preuves manifestement irréfutable, peut entrainer la resiliation automatique du présent contrat.</p>
            <p>Il s'abstient de toute acte , de toute manifestation et de tout type de déclaration publique pouvant compromettre les objectifs de développement que s'assigne l'institution universitaire.</p>
            <p><strong><span>Article</span> 5: rémunération </strong>
            <p>Le contractuel bénéficie d'un salaire mensuel de base 50 000 fc auquel l'on ajoute mensuellement une indemnité de 10 0000 fc. <br>Le contractant ne peut prétendre à aucune autre indemnité, allocation qui ne soit pas expressément prévue dans le présent contrat. <br> Un "rapport mensuel de service fait" doit obligatoirement être établi par le Chef se service de la Prévention et de la Sécurité Universitaire et transmis à la Direction des Ressources Humaines impérativement entre le 20 et le 25 de chaque mois pour l'élaboration des états de salaires éventuellement pour les dispositions disciplinaires à prendre.<br></p>
            <p><strong><span>Article</span> 6: Congés</strong></p>
            <p>Le contractant a droit aux congés et repos au même titre que les agents appartenant à son corps professionnel. <br> En cas de maladie dûment constaté mettant le contractant dans l'impossibilité d'exercer ses fonctions, il est placé en congé maladie. Pendant la durée du congé maladie, il conserve le bénéfice de l'intégralité de sa rémunération au taux prévu à l'article 5 du présent contrat. <br>Ainsi que l'ensemble des accessoires de salaires y afférents. <br> La jouisance du congé maladie, qui ne doit excéder la durée d'un mois, est accordée sur demande écrite et accomapgnée d'un certificat médical, adressé par voie hiérarchique au Chef du service de la Prévention et Sécurité Universitaire qui émet son avis et y appose sa signature avant l'envoyer chez le président de l'Université des Comores qui , in fine, la transmet à la Direction des Ressources Humaines pour compétence et traitement. <br>Le contractant bénéficiaire de la jouissance du congé maladie et qui a épuisé, à quelque titre que ce soit, la période rémunérée à plein traitement, et se trouvant dans l'impossibilité d'exercices ses fonctions, est placé en congé longue durée. Il peut être remplacé temporairement dans son poste. Le congé de longue durée est privatif de la totalité de la rémunération</p>
            <p><strong><span>Article</span> 7: Secret professionnel</strong></p>
            <p>Le contractant s'abstient de communiquer à toute personne ou entité étrangère à l'Université des Comores les informations non publiées dont il aura connaissance dans l'exercice de ses fonctions.</p>
            <p><strong><span>Article</span> 8: Règlement de différends</strong></p>
            <p>Toute réclamation ou tout differend concernant l'interpretation ou l'exécution du présent contrat se fait à l'amiable. A défaut de consensus, les différends seront soumis à la juridiction compétente en matière de droit de travail en vigueur en Union des Comores</p>
            <p><strong><span>Article</span> 9: Résiliation</strong></p>
            <p>L'une des parties peut résilier le present contrat à tout moment en adressant à l'autre partie, un préavis de trente (30) jours. <br> Si un renvoi pour faute lourde est jugé nécessaire en application des articles 2,4 et 7 ci-dessus, l'Employeur peut suspendre le présent contrat avec effet immédiat et moyennant notification en attendant la tenue du conseil de discipline tel qu'il est prévu au paragraphe 4 de l'article 1 du présent contrat.</p>
            <p>Si un renvoi pour faute lourde est jugé nécessaire en application de l'article 5 c-dessus, l'Employeur peutb résilier le present contrat avec effet immediat et moyennant notification; en pareil cas , aucune indéminité n'est due.</p>
            <p><strong><span>Article</span> 10: Révision</strong></p>
            <p>Toute modification des termes du présent contrat doit être convenue et acceptée par consentement ecrit et signé des parties contractantes.</p><br><br>
            <p class="text-right"> Fait à moroni, le 00/00/0000</p><br><br><br>
            <p class="text-center">LU ET APPROUVE</p><br><br><br><br><br><br><br><br><br><br><br><br> <br>
            <div class="row">
                <div class="col-md-6"><p> Le contractant <br><br> <br> <br> <br><br> <br> <strong>{{$employer->nom}} {{$employer->prenom}}</strong></p></div><br><br><br><br>
                <div class="col-md-6"> <p class="right">L'Administrateur</p> <br><br><br> <br> <br> <br>  <strong>Ibouroi ALI TABIBOU</strong> </div>

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