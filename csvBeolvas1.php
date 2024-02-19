<?php
// Adatbázis kapcsolat létrehozása
$con = new mysqli("localhost", "root", "", "megyek");
if ($con->connect_error) { 
    die("Connection Error: " . $con->connect_error); 
}

// Funkciók kezelése
    if (isset($_POST['county'])) {
        $selectedCounty = $_POST['county'];
        
        // Megye és hozzá tartozó megyeszékhely és lakosság lekérdezése az adatbázisból
        $query = "SELECT megye, szekhely, lakossag FROM megyek WHERE megye = '$selectedCounty'";
        $result = mysqli_query($con, $query);
        
        // Adatok összegyűjtése tömbbe
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data['megye'] = $row['megye'];
            $data['szekhely'] = $row['szekhely'];
            $data['lakossag'] = $row['lakossag'];
        }
        
        // Adatok JSON formátumba alakítása és visszaküldése
        echo json_encode(array('data' => $data));
    }



























    
    /*if (!empty($data)) {
        echo "<h2>{$data['megye']}</h2>";
        echo "<p>Megyeszékhely: {$data['megyeszekhely']}</p>";
        echo "<p>Lakosság: {$data['lakossag']}</p>";
    } else {
        echo "Nincs adat a megadott megyéhez.";
    }*/

    /* Törlési funkció
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
    }*/

/*
// Adatbázis kapcsolat létrehozása
$con = new mysqli("localhost", "root", "", "megyek");
if ($con->connect_error) { 
    die("Connection Error: " . $con->connect_error); 
}

// Funkciók kezelése
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ha a kiválasztott megye értéke érkezik a POST kéréssel
    if (isset($_POST['county1'])) {
        $selectedCounty = $_POST['county1'];
        
        // Megye településeinek lekérdezése az adatbázisból
        $query = "SELECT Lakossag FROM megyek WHERE Megye = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $selectedCounty);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Megye címéről elérési út lekérdezése
        $lakossag = "SELECT Lakossag FROM megyek WHERE Megye = {$selectedCounty}";
        $szekhely = "SELECT Szekhely FROM megyek WHERE Megye = {$selectedCounty}";
        
        // Adatok összegyűjtése tömbbe
        $data2 = array();
        while ($row = $result->fetch_assoc()) {
            $dat2[] = $row['Szekhely'];
            //$data1[] = $row['ZIP codes'];

        }
        $data1 = array();
        while ($row = $result->fetch_assoc()) {
            $data1[] = $row['Lakossag'];
            //$data1[] = $row['ZIP codes'];

        }
        
        // Adatok és megye címerének JSON formátumba alakítása és visszaküldése
        echo json_encode(array('lakossag' => $data1, 'szekhely' => $data2));
    }

    /*if (isset($_POST['deleteCity'])) {
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
    
    // Hozzáadás funkció
    if (isset($_POST['county']) && isset($_POST['cityName'])) {
        $selectedCounty = $_POST['county'];
        $cityName = $_POST['cityName'];
    
        // Település hozzáadása az adatbázishoz
        $query = "INSERT INTO zip_codes (County, City) VALUES ('$selectedCounty', '$cityName')";
        $result = mysqli_query($con, $query);
    
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Hiba a település hozzáadása közben.'));
        }
        exit; // Kilépés a scriptből a válasz elküldése után
    }*/
