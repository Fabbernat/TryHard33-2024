<?php
session_start();

$chosen = "";
if (isset($_POST["submit"])) {  // itt a $_POST szuperglobálist használjuk, hiszen az űrlapunk a method="POST" attribútummal rendelkezik
    if (isset($_POST["interests"])) {
        // ha legalább egy opciót kiválasztottak, akkor eltároljuk a bejelölt értékeket egy változóban
        $chosen = $_POST["interests"];   // ez egy tömb lesz, ami a bejelölt jelölőnégyzetek value értékeit tartalmazza
        $uzenet = "Chosen interests: " . implode(", ", $chosen) . "<br/>"; // tömbelemek egyesítése egy stringgé
    }
}
header("Location:../profile.php?process_interests=not_implemented_yet&uzenet=Chosen interests: " ./* urlencode(implode('<br>', $chosen)) .*/ "<br>");