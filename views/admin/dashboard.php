<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/templates/head.php' ?>
</head>

<body class="bg-indigo-950">
    <?php require 'templates/topbar.php' ?>

    <div class="mt-6 mx-auto px-4">
        <?php require 'templates/menu.php' ?>
        <div
            class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full min-h-screen">
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