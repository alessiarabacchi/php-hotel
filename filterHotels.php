<?php
include 'data.php';
include 'functions.php';

$parkingFilter = isset($_GET['parking']) ? true : false;
$voteFilter = isset($_GET['vote']) ? (int)$_GET['vote'] : 0;

// Filtraggio degli hotel
$filteredHotels = filterHotels($hotels, $parkingFilter, $voteFilter);

foreach ($hotels as $hotel) {
    if ($parkingFilter && !$hotel['parking']) {
        continue; 
    }

    if ($hotel['vote'] < $voteFilter) {
        continue; 
    }

    // Stampa i dettagli dell'hotel
    echo "<div>";
    echo "<h3>" . htmlspecialchars($hotel['name']) . "</h3>";
    echo "<p>" . htmlspecialchars($hotel['description']) . "</p>";
    echo "<p>Parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "</p>";
    echo "<p>Voto: " . htmlspecialchars($hotel['vote']) . "</p>";
    echo "<p>Distanza dal centro: " . htmlspecialchars($hotel['distance_to_center']) . " km</p>";
    echo "</div>";
}
?>


