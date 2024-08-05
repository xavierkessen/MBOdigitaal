<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/templates/head.php' ?>
</head>

<body class="bg-stone-950">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/topbar.php' ?>

    <div class="mt-6 mx-auto px-4 bg-stone-950">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/menu.php' ?>
        <div class="p-6 text-medium text-stone-50 rounded w-full min-h-screen">
            <h3 class="text-lg font-bold text-stone-100 text-white mb-2">Rollen beheren</h3>
            <p class="mb-2"></p>
            <br>
            <table class="table-auto w-full bg-gray-800 text-white">
                <thead>
                    <tr class="bg-stone-800">
                        <th class="px-4 py-2 text-left">Delete</th>
                        <th class="px-4 py-2 text-left">Rolnaam</th>
                        <th class="px-4 py-2 text-left">Level (van 0 t/m 100)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="even:bg-stone-900 odd:bg-stone-950">
                        <td class="px-4 py-2">
                            <a href="/admin/roles/delete">
                                <img src="/images/trash.svg" alt="Trash" />
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a class="underline" href="/admin/users/edit">
                                Student
                            </a>
                        </td>
                        <td class="px-4 py-2">10</td>
                    </tr>
                    <tr class="even:bg-stone-900 odd:bg-stone-950">
                        <td class="px-4 py-2">
                            <a href="/admin/roles/delete">
                                <img src="/images/trash.svg" alt="Trash" />
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a class="underline" href="/admin/users/edit">
                                Docent
                            </a>
                        </td>
                        <td class="px-4 py-2">20</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>