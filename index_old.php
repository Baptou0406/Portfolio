<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <title>competences Port</title>
</head>

<body>
    <h1>PORTFOLIO</h1>
    <table id="portfolio">
    </table>
    <table>
        <script>
            $(document).ready()
            {
                console.log('appelajax')
                $.ajax({
                    url: "receive.php",
                    dataType: "json",
                    data: {
                        
                    },
                    success: function (data) {
                        
                        console.log(data)
                    }
                });
            }
            let competences = [
                { "head": "Realisation", "lib": "" },
                { "head": "Gérer le patrimoine informatique", "lib": "Recenser et identifier les ressources numériques. Exploiter des référentiels, normes et standards adoptés par le prestataire informatique. Mettre en place et vérifier les niveaux d’habilitation associés à un service. Vérifier les conditions de la continuité d’un service informatique. Gérer des sauvegardes. Vérifier le respect des règles d’utilisation des ressources numériques." },
                { "head": "Répondre aux incidents et aux demandes d’assistance et d’évolution", "lib": "Collecter, suivre et orienter des demandes. Traiter des demandes concernant les services réseau et système, applicatifs. Traiter des demandes concernant les applications." },
                { "head": "Développer la présence en ligne de l’organisation", "lib": "Participer à la valorisation de l’image de l’organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques. Référencer les services en ligne de l’organisation et mesurer leur visibilité. Participer à l’évolution d’un site Web exploitant les données de l’organisation." },
                { "head": "Travailler en mode projet", "lib": "Analyser les objectifs et les modalités d’organisation d’un projet. Planifier les activités. Évaluer les indicateurs de suivi d’un projet et analyser les écarts." },
                { "head": "Mettre à disposition des utilisateurs un service informatique", "lib": "Réaliser les tests d’intégration et d’acceptation d’un service. Déployer un service. Accompagner les utilisateurs dans la mise en place d’un service." },
                { "head": "Organiser son développement professionnel", "lib": "Mettre en place son environnement d’apprentissage personnel. Mettre en œuvre des outils et stratégies de veille informationnelle. Gérer son identité professionnelle. Développer son projet professionnel." },
            ];
            let realisations = [
                "Réalisation 1",
                "Réalisation 2",
                "Réalisation 3"
            ];

        
            // Création des en-têtes de colonne pour les compétences
            $('#portfolio').append("<tr></tr>");
            competences.forEach(function (element) {
                $('#portfolio tr').append("<td>" + element.head + "</td>");
            });

            // Ajout des libellés de compétence dans des cellules de données
            $('#portfolio').append("<tr></tr>");
            competences.forEach(function (element) {
                $('#portfolio tr').last().append("<td>" + element.lib + "</td>");
            });

            // Ajout des réalisations dans des cellules de données
            realisations.forEach(function (element) {
                $('#portfolio').append("<tr></tr>");
                $('#portfolio tr').last().append("<td>" + element + "</td>");
            });
        </script>
    </table>
</body>

</html>