<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require '../../views/templates/head.php'; ?>
</head>

<body>
    <?php require '../../views/templates/menu.php'; ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto">

        <?php
            $text = "Dit is een voorbeeldzin.";
            $zoekwoord = "/voorbeeld/";

            // Controle of het woord 'voorbeeld' in de string zit
            if (preg_match($zoekwoord, $text)) {
                echo "<p>Iets voor jou?<br>
                Heb je altijd al de ambitie gehad om je te specialiseren op het gebied van gamedevelopment? Dan is deze cursus iets voor jou!</p>

                <h3>De cursus</h3>
                <p>Deze cursus is een onderdeel van een volledige mbo-opleiding. We noemen dit een keuzedeel. In het kader van Leven Lang Ontwikkelen kunnen keuzedelen vaak als losse cursus gevolgd worden. Na afronding van de cursus/het keuzedeel ontvangt de cursist een mbo-verklaring als bewijs van deelname.</p>

                <h3>Voor wie</h3>
                <p>Deze cursus is voor iedereen die gefascineerd is door games en graag wil leren hoe ze zelf games kunnen maken. Of je nu een beginner bent in programmeren of al wat ervaring hebt, deze cursus is een geweldige kans om je vaardigheden te ontwikkelen en je eigen games te creëren.</p>

                <h3>Inhoud cursus</h3>
                <p>Tijdens deze cursus leer je de basisprincipes van programmeren voor het maken van games. We gaan aan de slag met het begrijpen van programmeertalen en concepten die nodig zijn om interactieve en boeiende spelervaringen te ontwikkelen.</p>";
            } else {
                echo "<p>Het woord 'voorbeeld' zit niet in de zin.</p>";
            }
        ?>

    </div>
    cs  f

    <?php require '../../views/templates/footer.php'; ?>

</body>

</html>
