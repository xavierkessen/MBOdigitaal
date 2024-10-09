<?php
// Databaseconfiguratie
$servername = "mysql";
$username = "mbogodigitalUser";
$password = "Vrieskist@247";
$dbname = "mbogodigital";

// Maak verbinding met MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Als er een zoekopdracht is, voeg filters toe aan de query
$whereClauses = [];
if (isset($_GET['cohort']) && !empty($_GET['cohort'])) {
    $cohort = $conn->real_escape_string($_GET['cohort']);
    $whereClauses[] = "jaar = '$cohort'";
}

if (isset($_GET['klas']) && $_GET['klas'] != 'alle') {
    $klas = $conn->real_escape_string($_GET['klas']);
    $whereClauses[] = "klas = '$klas'";
}

$whereSQL = '';
if (count($whereClauses) > 0) {
    $whereSQL = 'WHERE ' . implode(' AND ', $whereClauses);
}

// Query om de studenten op te halen
$sql = "SELECT id, profielFoto, firstName, prefix, lastName, studentnummer, klas, jaar, opleiding, keuzedeel FROM studenten $whereSQL";
$result = $conn->query($sql);

// Haal alle unieke klassen op voor de filteropties
$klassenResult = $conn->query("SELECT DISTINCT klas FROM studenten");
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800">Studenten Overzicht</h2>
        <p class="my-4 font-bold text-gray-700">Hieronder staat het overzicht van studenten per klas en cohort binnen het systeem van mbogodigital.nl.</p>

        <!-- Filterformulier voor cohort en klas -->
        <form class="filter-form mb-8" method="GET" action="mentor.php">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="cohort" class="block text-gray-700 font-bold">Cohort (jaar):</label>
                    <input type="text" id="cohort" name="cohort" placeholder="Bijv. 2022" value="<?php echo isset($_GET['cohort']) ? htmlspecialchars($_GET['cohort']) : ''; ?>" class="mt-2 p-2 border border-gray-300 rounded w-full">
                </div>

                <div>
                    <label for="klas" class="block text-gray-700 font-bold">Klas:</label>
                    <select id="klas" name="klas" class="mt-2 p-2 border border-gray-300 rounded w-full">
                        <option value="alle">Alle</option>
                        <?php
                        if ($klassenResult->num_rows > 0) {
                            while ($row = $klassenResult->fetch_assoc()) {
                                $selected = (isset($_GET['klas']) && $_GET['klas'] == $row['klas']) ? 'selected' : '';
                                echo "<option value='" . htmlspecialchars($row['klas']) . "' $selected>" . htmlspecialchars($row['klas']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <input type="submit" value="Filteren" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">
            </div>
        </form>

        <!-- Tabel met studenten -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4">Profielfoto</th>
                        <th class="py-2 px-4">Naam</th>
                        <th class="py-2 px-4">Studentnummer</th>
                        <th class="py-2 px-4">Klas</th>
                        <th class="py-2 px-4">Jaar</th>
                        <th class="py-2 px-4">Opleiding</th>
                        <th class="py-2 px-4">Keuzedeel</th>
                        <th class="py-2 px-4">Details</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='border-b'>";
                        // Profielfoto
                        if (isset($row['profielFoto']) && !empty($row['profielFoto'])) {
                            echo "<td class='py-2 px-4'><img src='/views/images/" . htmlspecialchars($row["profielFoto"]) . "' alt='Profielfoto' class='w-12 h-12 rounded-full object-cover'></td>";
                        } else {
                            echo "<td class='py-2 px-4'><img src='/views/images/default.png' alt='Standaard Profielfoto' class='w-12 h-12 rounded-full object-cover'></td>";
                        }

                        // Naam inclusief prefix
                        $naam = htmlspecialchars($row["firstName"]) . " " . (isset($row["prefix"]) ? htmlspecialchars($row["prefix"]) . " " : "") . htmlspecialchars($row["lastName"]);
                        echo "<td class='py-2 px-4'>$naam</td>";
                        echo "<td class='py-2 px-4'>" . htmlspecialchars($row["studentnummer"]) . "</td>";
                        echo "<td class='py-2 px-4'>" . htmlspecialchars($row["klas"]) . "</td>";
                        echo "<td class='py-2 px-4'>" . htmlspecialchars($row["jaar"]) . "</td>";
                        echo "<td class='py-2 px-4'>" . htmlspecialchars($row["opleiding"]) . "</td>";
                        echo "<td class='py-2 px-4'>" . htmlspecialchars($row["keuzedeel"]) . "</td>";

                        // Link naar de individuele student
                        echo "<td class='py-2 px-4'><a href='student_detail.php?id=" . $row["id"] . "' class='text-blue-500 hover:underline'>Bekijk</a></td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='py-4 text-center'>Geen studenten gevonden</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Terug Knop -->
        <a href="beveiligde_pagina.php" class="mt-8 inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Terug naar hoofdpagina</a>

    </div>

</body>

</html>

<?php
// Sluit de databaseverbinding
$conn->close();
?>
