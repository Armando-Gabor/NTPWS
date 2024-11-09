<?php

function isHoliday($date) {
    //Nema praznika zbog jednostavnosti, ali ako bi htjeli tu ih implementiramo
    return false;
}

$currentTime = date("H:i");
$currentDay = date("w");

function isStoreOpen($currentTime, $currentDay) {
    if ($currentDay == 0 || isHoliday(date("Y-m-d"))) { // Nedjelja ili praznici
        return false;
    } elseif ($currentDay == 6) { // Subota
        return ($currentTime >= "09:00" && $currentTime < "14:00");
    } else { // Radni dani
        return ($currentTime >= "08:00" && $currentTime < "20:00");
    }
}

$isOpen = isStoreOpen($currentTime, $currentDay);
echo $isOpen ? "Dućan je otvoren" : "Dućan je zatvoren";

?>