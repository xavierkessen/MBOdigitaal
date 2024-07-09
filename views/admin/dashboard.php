<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/templates/head.php' ?>
</head>

<body class="bg-indigo-950">
    <?php require 'templates/menu.php' ?>

    <div class="container mt-6 mx-auto px-4">
        <div class="md:flex">
            <ul
                class="flex-column space-y space-y-4 text-sm font-medium text-gray-50 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                <li>
                    <a href="#"
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-50 bg-indigo-800 hover:bg-indigo-500 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-4 h-4 me-2 text-gray-50 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Gebruikers
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-50 bg-indigo-800 hover:bg-indigo-500 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-4 h-4 me-2 text-gray-50 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Rollen
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-50 bg-indigo-800 hover:bg-indigo-500 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-4 h-4 me-2 text-gray-50 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Gebruikers
                    </a>
                </li>

            </ul>
            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full min-h-screen">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Profile Tab</h3>
                <p class="mb-2">This is some placeholder content the Profile tab's associated content, clicking another
                    tab
                    will toggle the visibility of this one for the next.</p>
                <p>The tab JavaScript swaps classes to control the content visibility and styling.</p>
            </div>
        </div>
    </div>



</body>

</html>