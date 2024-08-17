<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require '../views/templates/head.php' ?>
</head>

<body>
    <?php require '../views/templates/menu.php' ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white rounded-lg dark:bg-gray-800 mx-auto">

        <h2 class="text-2xl font-bold dark:text-white">Levels</h2>
        <p class="my-4 font-bold text-gray-700">Hieronder staat het overzicht van die te maken hebben met het
            ontwikkelen van de keuzedelen binnen het systeem van mbogodigital.nl</p>

        <div class="w-full">
            <div class="flex border-b border-gray-300">
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tl-lg focus:outline-none active:bg-gray-200"
                    onclick="openTab(event, 'tab1')">Case</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tl-lg focus:outline-none active:bg-gray-200"
                    onclick="openTab(event, 'tab2')">Challenge 16</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tr-lg focus:outline-none"
                    onclick="openTab(event, 'tab3')">Challenge 17</button>
                <button
                    class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 rounded-tr-lg focus:outline-none"
                    onclick="openTab(event, 'tab4')">Challenge 18</button>
            </div>
            <div id="tab1" class="tabcontent p-4">
                <h2 class="text-lg font-bold text-gray-800">Case</h2>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel enim
                    euismod,
                    imperdiet felis vel, ultrices risus. Sed nec quam id elit fringilla blandit a a risus.</p>
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
                                Challenge 16
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan de frontend ontwerpen en maken voor
                                het presenteren en beheren van levelinformatie op mbogodigital.nl.
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
                                Challenge 17
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan een database ontwerpen en maken
                                voor het beheren van de levels en de vorderingen van de studenten.
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
                                Challenge 18
                            </p>
                            <div class="text-gray-900 font-bold text-xl mb-2">Ik kan ervoor zorgen dat levels en de vorderingen van de student beheerd kunnen worden via mbogodigital.nl.
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