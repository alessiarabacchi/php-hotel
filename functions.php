<?php

function filterHotels($hotels, $parkingFilter, $voteFilter) {
    return array_filter($hotels, function($hotel) use ($parkingFilter, $voteFilter) {
        if ($parkingFilter && !$hotel['parking']) return false;
        if ($hotel['vote'] < $voteFilter) return false;
        return true;
    });
}
?>