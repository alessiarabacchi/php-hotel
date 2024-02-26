<?php
include 'data.php';
include 'functions.php';

$parkingFilter = isset($_GET['parking']);
$voteFilter = isset($_GET['vote']) ? (int)$_GET['vote'] : 0;

// Filtraggio degli hotel
$filteredHotels = filterHotels($hotels, $parkingFilter, $voteFilter);

foreach ($filteredHotels as $hotel) {
    echo "<div class='card mb-3'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . htmlspecialchars($hotel['name']) . "</h5>";
    echo "<p class='card-text'>" . htmlspecialchars($hotel['description']) . "</p>";
    echo "<p class='card-text'>Parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "</p>";
    echo "<p class='card-text'>Voto: " . htmlspecialchars($hotel['vote']) . "</p>";
    echo "<p class='card-text'>Distanza dal centro: " . htmlspecialchars($hotel['distance_to_center']) . " km</p>";
    echo "</div>";
    echo "</div>";
}
?>