<?php
// Array degli hotel fornito
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

$filteredHotels = $hotels;

if (isset($_GET['parking']) || isset($_GET['vote'])) {
    $parkingFilter = isset($_GET['parking']);
    $voteFilter = $_GET['vote'] ?? 0;

    $newFilteredHotels = [];
    for ($i = 0; $i < count($hotels); $i++) {
        $includeHotel = true;

        if ($parkingFilter && !$hotels[$i]['parking']) {
            $includeHotel = false;
        }

        if ($hotels[$i]['vote'] < $voteFilter) {
            $includeHotel = false;
        }

        if ($includeHotel) {
            $newFilteredHotels[] = $hotels[$i];
        }
    }

    $filteredHotels = $newFilteredHotels;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>PHP Hotel</title>
    <!-- Link Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="container mt-4">
        <h1>Elenco Hotel</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($filteredHotels); $i++): ?>
                <tr>
                    <td><?php echo $filteredHotels[$i]['name']; ?></td>
                    <td><?php echo $filteredHotels[$i]['description']; ?></td>
                    <td><?php echo $filteredHotels[$i]['parking'] ? 'Sì' : 'No'; ?></td>
                    <td><?php echo $filteredHotels[$i]['vote']; ?></td>
                    <td><?php echo $filteredHotels[$i]['distance_to_center']; ?> km</td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
