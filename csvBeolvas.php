<?php
// Adatbázis kapcsolat létrehozása
$con = new mysqli("localhost", "root", "", "zip_codes");
if ($con->connect_error) { 
    die("Connection Error: " . $con->connect_error); 
}
    // Ha a kiválasztott megye értéke érkezik a POST kéréssel
    if (isset($_POST['county'])) {
        $selectedCounty = $_POST['county'];
        
        // Megye településeinek lekérdezése az adatbázisból
        $query = "SELECT City FROM zip_codes WHERE County = '$selectedCounty'";
        $result = mysqli_query($con, $query);
        
        // Megye címéről elérési út lekérdezése
        $countyImage = "pictures/{$selectedCounty}.jpg"; // feltételezve, hogy a címerek JPG formátumban vannak a pictures mappában
        
        // Adatok összegyűjtése tömbbe
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['City'];
            //$data1[] = $row['ZIP codes'];

        }
        
        // Adatok és megye címerének JSON formátumba alakítása és visszaküldése
        echo json_encode(array('cities' => $data, 'countyImage' => $countyImage, 'szekhely' => 'Budapest', 'lakossag' => 100));
    }

    if (isset($_POST['deleteCity'])) {
        $cityNameToDelete = $_POST['deleteCity'];
        $query = "DELETE FROM zip_codes WHERE City = '$cityNameToDelete'";
        $result = mysqli_query($con, $query);
    
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Hiba a város törlése közben.'));
        }
        exit; // Kilépés a scriptből a válasz elküldése után
    }


    


    