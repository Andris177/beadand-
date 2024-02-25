<?php

// Adatbázis kapcsolódás
$conn = new PDO("mysql:host=localhost;dbname=zip_codes", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$searchText = $_POST['searchText'];
$response = [];

// Ellenőrzés, hogy a keresett szöveg szám-e vagy szöveg
if (is_numeric($searchText)) {
    // Irányítószám keresése a zipcodes táblában
    $stmt = $conn->prepare("SELECT zip_code FROM zipcode WHERE city_zip = ?");
    $stmt->execute([$searchText]);
    $city = $stmt->fetchColumn();
} else {
    // Városnév keresése a cities táblában
    $stmt = $conn->prepare("SELECT city_name FROM Cities WHERE city_name = ?");
    $stmt->execute([$searchText]);
    $city = $stmt->fetchColumn();
}

// Ellenőrzés, hogy van-e város a megadott keresés alapján
if ($city) {
    $response['city'] = $city;
} else {
    $response['error'] = 'Nincs ilyen város az adatbázisban.';
}

// JSON válasz elküldése
header('Content-Type: application/json');
echo json_encode($response);



/*


$con = mysqli_connect("localhost", "root", "", "zip_codes");
if (!$con) {
    die("Connection Error");
}


if (isset($_POST['city'])) {
        $searchCity = $_POST['city'];

        $query = "SELECT DISTINCT City FROM zip_codes WHERE County = VALUE('$searchCity')";
        //$searchCity.value
        $result = mysqli_query($con, $query);


        if ($result) {
        echo json_encode(array('success' => true, 'message' => 'Található település .'));
            } else {
                echo json_encode(array('success' => false, 'message' => 'Hiba történt a település lekérdezése során: ' . mysqli_error($con)));
            }
        } 

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['City'];
            //$data1[] = $row['ZIP codes'];

        }
    
        mysqli_close($con);


