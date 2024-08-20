<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require '../views/templates/head.php' ?>
</head>

<body>
    <?php require '../views/templates/menu.php' ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white rounded-lg dark:bg-gray-800 mx-auto">

        <h2 class="text-2xl font-bold dark:text-white">Keuzedelen</h2>
        <p class="my-4 font-bold text-gray-700">Hieronder staat het overzicht van die te maken hebben met het
            ontwikkelen van de keuzedelen binnen het systeem van mbogodigital.nl</p>

        <div class="w-full">
            <div class="flex border-b border-gray-300">
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tl-lg focus:outline-none active:bg-gray-200"
                    onclick="openTab(event, 'tab1')">Case</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tl-lg focus:outline-none active:bg-gray-200"
                    onclick="openTab(event, 'tab2')">Challenge 25</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tr-lg focus:outline-none"
                    onclick="openTab(event, 'tab3')">Challenge 26</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tr-lg focus:outline-none"
                    onclick="openTab(event, 'tab4')">Challenge 27</button>
            </div>
            <div id="tab1" class="tabcontent p-4">
                <h2 class="text-lg font-bold text-gray-800">Case</h2>
                <p class="mt-2 text-gray-700">Studenten krijgen veel informatie van de school en de docenten. Deze
                    informatie wordt op veel verschillende manieren aangeboden en is niet altijd even overzichtelijk.
                    Denk hierbij aan <b>examenplanningen</b>, <b>assessmentroosters</b>, <b>keuzedelen</b>, <b>beoordelingssystemen met levels</b>
                    en het <b>aanbieden van Challenges</b>. Tijdens het MBO Go Digital project gaan studenten deze informatie
                    in kaart brengen en digitaliseren. Met als doel een beter overzicht voor de studenten en docenten.
                </p>
                <p class="mt-2 text-gray-700">Tijdens de eerste fase van dit project heeft een werknemer, Niels
                    Cortjens, al een admin-panel ontwikkelt waarin gebruikers kunnen worden aangemaakt. Deze gebruikers
                    kunnen ook al inloggen op het admin-panel (als ze genoeg rechten hebben). Daarnaast kunnen er al
                    verschillende opleidingen worden toegevoegd, bewerkt of verwijderd. Maar Niels heeft ontslag genomen
                    en werkt reeds op een andere plek. Het management heeft wel besloten dat de ontwikkeling verder gaat
                    en dat de reeds gemaakte code wordt gebruikt. Ze zijn tevreden over het werk van Niels.</p>
                <p class="mt-2 text-gray-700">Jij krijgt nu de opdracht om het systeem uit te breiden met nieuwe
                    functionaliteiten. Hoog op het verlanglijstje staan de automatisering van de keuzedelen. Een kort
                    overzicht van de belangrijkste wensen:
                <ul class="my-2 list-disc pl-5">
                    <li class="ml-4">Studenten moeten een overzicht krijgen van de keuzedelen ze kunnen kiezen.</li>
                    <li class="ml-4">Studenten moeten informatie over een keuzedeel kunnen opvragen. Waar gaat een keuzedeel over?</li>
                    <li class="ml-4">Studenten moeten aan kunnen geven welke keuzedelen ze willen kiezen? </li>
                    <li class="ml-4">Ze moeten ook een overzicht krijgen van de keuzedelen die ze reeds gekozen hebben.</li>
                    <li class="ml-4">Docenten moeten alle informatie van de keuzedelen makkelijk kunnen beheren.</li>
                    <li class="ml-4">De bestaande omgeving die Niels gemaakt heeft moet nog getest worden.</li>
                </ul>
                </p>
            </div>
            <div id="tab2" class="tabcontent p-4 hidden">
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div class="h-48 lg:h-auto lg:w-96 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                        style="background-image: url('https://blog.udemy.com/wp-content/uploads/2013/10/shutterstock_108312236.jpg')"
                        title="Woman holding a mug">
                    </div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center italic mb-2">
                                Challenge 25
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan de frontend ontwerpen en maken voor
                                het presenteren en beheren van keuzedeleninformatie op mbogodigital.nl.
                            </div>
                            <p class="text-gray-700 text-base"></p>
                        </div>
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">Vista College</p>
                                <p class="text-gray-600">Software Developer (25904 en 25998)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab3" class="tabcontent p-4 hidden">
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div class="h-48 lg:h-auto lg:w-96 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                        style="background-image: url('https://blog.udemy.com/wp-content/uploads/2013/10/shutterstock_108312236.jpg')"
                        title="Woman holding a mug">
                    </div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center italic mb-2">
                                Challenge 26
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan een database ontwerpen en maken
                                voor het beheren van de keuzedelen en de keuzes van de studenten.
                            </div>
                            <p class="text-gray-700 text-base"></p>
                        </div>
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">Vista College</p>
                                <p class="text-gray-600">Software Developer (25904 en 25998)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab4" class="tabcontent p-4 hidden">
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div class="h-48 lg:h-auto lg:w-96 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                        style="background-image: url('https://blog.udemy.com/wp-content/uploads/2013/10/shutterstock_108312236.jpg')"
                        title="Woman holding a mug">
                    </div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-sm text-gray-600 flex items-center italic mb-2">
                                Challenge 27
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan ervoor zorgen dat keuzedelen
                                beheerd kunnen worden via mbogodigital.nl.
                            </div>
                            <p class="text-gray-700 text-base"></p>
                        </div>
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">Vista College</p>
                                <p class="text-gray-600">Software Developer (25904 en 25998)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                }
                tablinks = document.getElementsByTagName("button");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("active:bg-gray-200");
                }
                document.getElementById(tabName).classList.remove("hidden");
                evt.currentTarget.classList.add("active:bg-gray-200");
            }
        </script>



        <?php require '../views/templates/footer.php' ?>

    </div>


</body>

</html>