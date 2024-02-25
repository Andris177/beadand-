<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <form id="countyForm" class="county-form">
                <div class="form-group">
                    <label for="countySelect"></label>
                    <select id="countySelect" name="county" class="form-control">
                        <option value="">Megyék:</option>
                        <?php
                        // Adatbázis kapcsolat létrehozása
                        $con=mysqli_connect("localhost","root","","zip_codes");
                        if(!$con) { die("Connection Error"); }

                        // Megyék lekérdezése az adatbázisból
                        $query = "SELECT DISTINCT County FROM zip_codes";
                        $result = mysqli_query($con, $query);

                        // Mezők feldolgozása és megjelenítése a legördülő menüben
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['County'].'">'.$row['County'].'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-group" id="cityNameFormGroup" style="display:none;">
                        <label for="cityName" id="cityNameLabel"></label>
                        <input type="text" id="cityName" name="cityName" class="form-control" placeholder="Település neve">
                        <input type="number" id="cityZip" name="cityZip" class="form-control" placeholder="Irányítószáma">
                        <button type="button" id="addCityBtn" class="btn btn-primary" style="display:none;">Hozzáadás</button>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="searchInput" class="sr-only">Search</label>
                        <input type="text" id="searchInput" name="city" class="form-control" placeholder="Keresés ZIP vagy név alapján: ">
                        <button type="button" id="searchBtn" class="btn btn-primary" style="display:none;">Keresés</button>

                    </div>
                    -->

                    <div class="form-group">
                        <label for="searchCity">Keresés Városra</label>
                        <input type="text" id="searchCity" name="city" class="form-control" placeholder="Keresés név alapján: ">
                        <br>
                        <button type="button" id="searchCityBtn" class="btn btn-primary">Keresés</button>
                    </div>
                    
                    <div id="cityNameResult"></div>
                  
s


                </div>
                <div id="countyData" class="data"></div>
                <div id="countyImageContainer"></div> 
                <div id="cityList"></div>
                <div id="searchResults"></div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="index.js"></script>
</body>
</html>
