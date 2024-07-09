<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require 'templates/head.php' ?>
</head>

<body>
    <?php require 'templates/menu.php' ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white rounded-lg dark:bg-gray-800 mx-auto">

        <h2 class="text-3xl font-bold dark:text-white">Automatisering voor en door studenten</h2>
        <p class="my-4 font-bold text-lg text-gray-700">Het project MBO digitaal is een project van de Software Development opleiding van het Vista College. Studenten helpen op allerdaagse zaken zoals keuzedelen, beoordelingen en examenroosters overzichtelijk te maken voor studenten. Dit doen ze door processen, die veelal door docenten worden uitgevoerd, te automatiseren.</p>
        <p class="mb-4 text-lg font-normal text-gray-700 dark:text-gray-500">Dit project is een onderdeel van Challenge based learning waarin groepen studenten worden uitgedaagd om het bestaande project MBO Digitaal uit te breiden met nieuwe functionaliteiten die van meerwaarde zijn voor studenten en docenten.</p>
        <a href="#" class="inline-flex items-center text-lg text-blue-600 dark:text-blue-500 hover:underline">
            Lees verder
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>

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
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            25604
                        </th>
                        <td class="px-6 py-4">
                            Software Development
                        </td>
                        <td class="px-6 py-4">
                            Niveau 4
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            25605
                        </th>
                        <td class="px-6 py-4">
                            Allround medewerker IT Systems and Devices
                        </td>
                        <td class="px-6 py-4">
                            Niveau 3
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            25606
                        </th>
                        <td class="px-6 py-4">
                            Expert IT Systems and Devices
                        </td>
                        <td class="px-6 py-4">
                            Niveau 4
                        </td>
                    </tr>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            25607
                        </th>
                        <td class="px-6 py-4">
                            Medewerker ICT Support
                        </td>
                        <td class="px-6 py-4">
                            Niveau 2
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php require 'templates/footer.php' ?>
    
    </div>


</body>

</html>