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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4>Insérer une nouvelle réalisations</h4>
            <input name="new" />
            <button class="opener" onclick="reali()">envoyer</button>
        </div>
    </div>
    <script>
       $(document).ready(function() {
    console.log('appelajax')
    $.ajax({
        url: "receive.php",
        dataType: "json",
        success: function(datas) {
            console.log(datas)

            $('#portfolio').append("<tr></tr>");
            $('#portfolio tr').append("<td> Réalisations</td>");
            datas.competences.forEach(function(data) {
                $('#portfolio tr').append("<td>" + data.title + "</td>");
            });

            $('#portfolio').append("<tr></tr>");
            $('#portfolio tr').last().append("<td><button id='openPopup'>Nouvelle réalisation</button></td>");
            datas.competences.forEach(function(data) {
                $('#portfolio tr').last().append("<td>" + data.lib + "</td>");
            });
            $('#portfolio').append("<tr></tr>");

            let id = 0;

            for (var i = 0; i < datas.realisations.length; i++) {
                $('#portfolio').append("<tr></tr>");
                $('#portfolio tr').last().append("<td>" + datas.realisations[i].lib + "</td>");
                console.log("datas", datas);

                for (var j = 0; j < datas.competences.length; j++) {
                    console.log("donnée", datas.competences[j].id);
                    $('#portfolio tr').last().append(`<td id="${id}" data-id="${datas.realisations[i].id}" croix="r${datas.realisations[i].id}c${datas.competences[j].id}" onclick="modifier(${id})"></td>`);

                    id++;

                    datas.croix.forEach(function(data) {
                        console.log(`[croix='r${data.realisations_id}c${data.competences_id}']`);
                        $(`[croix='r${data.realisations_id}c${data.competences_id}']`).html("OK").addClass("filled");
                    });
                }
            }

            // Gestion de l'ouverture de la popup
            $("#openPopup").click(function() {
                $("#myModal").css("display", "block");
            });

            // Gestion de la fermeture de la popup
            $(".close").click(function() {
                $("#myModal").css("display", "none");
            });

            // Fermer la popup si l'utilisateur clique en dehors
            $(window).click(function(event) {
                if ($(event.target).is("#myModal")) {
                    $("#myModal").css("display", "none");
                }
            });
        }
    });
});

function modifier(id) {
    var element = document.getElementById(id);
    var id_real = element.getAttribute('croix').substr(1, 1);
    var id_comp = element.getAttribute('croix').substr(3, 3);

    if (element.textContent.trim() === "OK") {
        element.textContent = "";
        element.classList.remove("filled");
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: {
                real: id_real,
                comp: id_comp,
            }
        });
    } else {
        element.textContent = "OK";
        element.classList.add("filled");
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: {
                real: id_real,
                comp: id_comp,
            }
        });
    }
}

function reali(){
    var newRealisation = $("input[name='new']").val(); // Obtenir la valeur de l'entrée
    var encodedRealisation = encodeURIComponent(newRealisation); // Encoder la valeur
    $.ajax({
        type: "POST",
        url: "insert_realisation.php",
        data: {
            realisation: encodedRealisation,  // Envoyer la valeur encodée
        },
        success: function(response) {
            // Exécuter la fonction associée à .close après l'envoi réussi
            $(".close").click();
        }
    });
}


    </script>
  
</body>

</html>
