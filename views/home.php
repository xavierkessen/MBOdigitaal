<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require 'templates/head.php' ?>
</head>

<body>
    <?php require 'templates/menu.php' ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white rounded-lg dark:bg-gray-800 mx-auto">

        <h2 class="text-2xl font-bold dark:text-white">Automatisering voor en door studenten</h2>
        <p class="my-4 font-bold text-gray-700">Het project MBO digitaal is een project van de Software Development
            opleiding van het Vista College. Studenten helpen om allerdaagse zaken zoals keuzedelen, beoordelingen en
            examenroosters overzichtelijk te maken voor studenten. Dit doen ze door processen, die veelal door docenten
            worden uitgevoerd, te automatiseren.</p>
        <p class="mb-4 font-normal text-gray-700 dark:text-gray-500">Dit project is een onderdeel van Challenge Based
            Learning (CBL) waarin groepen studenten worden uitgedaagd om het bestaande project MBO Digitaal uit te breiden met
            nieuwe functionaliteiten die van meerwaarde zijn voor studenten en docenten.</p>

        <h3 class="text-xl font-bold dark:text-white">Overzicht van onze opleidingen</h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Crebo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Naam opleiding
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Niveau
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($educations as $education) {
                        ?>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $education["creboNumber"]; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $education["name"]; ?>
                            </td>
                            <td class="px-6 py-4">
                                Niveau <?php echo $education["level"]; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php require 'templates/footer.php' ?>

    </div>


</body>

</html>