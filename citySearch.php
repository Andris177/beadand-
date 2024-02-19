<?php
$con = mysqli_connect("localhost", "root", "", "zip_codes");
if (!$con) {
    die("Connection Error");
}


if (isset($_POST['city'])) {
        $searchCity = $_POST['city'];

        $query = "SELECT DISTINCT City FROM zip_codes WHERE County = VALUE('$searchCity')/*$searchCity.value*/";
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


    