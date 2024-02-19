$(document).ready(() => {
    
  $('#cityNameFormGroup, #addCityBtn, #cityNameLabel, #searchBtn, #searchInput').hide();

  $('#countySelect').change(() => {
    const selectedCounty = $('#countySelect').val();

    if (selectedCounty) {
      
      $('#cityNameFormGroup, #addCityBtn, #cityNameLabel, #searchBtn, #searchInput').show();

      
      $.ajax({
        url: 'csvBeolvas.php', // javítás: helyes fájlnév
        method: 'POST',
        data: { county: selectedCounty },
        dataType: 'json',
        success: response => {
          if (response.cities.length > 0) {
            var cityList = '<div class="city-list">';
            response.cities.forEach(city => {
              cityList += `<div class="city">${city}             <div class="delete-container"><button class="deleteBtn" data-city="${city}">Törlés</button></div></div>`; // javítás: deleteBtn osztály hozzáadva
            });
            cityList += '</div>';
            $('#cityList').html(cityList).show();            
          } else {
            $('#cityList').hide();
          }
          
          $('#countyImageContainer').html(`<img src="${response.countyImage}">`).show();
          //$('#countyData').html('<p megyeszékhely:Budapest lakosság:100').show();
        }
      });
    } else {
      
      $('#cityNameFormGroup, #addCityBtn, #cityNameLabel, #searchBtn').hide();
      $('#countyData').hide();

      
      $('#cityList, #countyImageContainer').hide();
    }

    $.ajax({
      url: 'csvBeolvas1.php', 
      method: 'POST',
      data: { county: selectedCounty },
      dataType: 'json',
      success: response => {
        let data = response.data;
        let text1 = '<p> Megyeszékhely: ';
        let result = text1.concat(data.szekhely, " Lakosság: ", data.lakossag, '</p>');
        $('#countyData').html(result).show();
      }
    });
  });

  
  $(document).on('click', '.deleteBtn', function(e) { // javítás: eseménykezelő hozzáadva
    e.preventDefault();
    var cityName = $(this).data('city');

    
    $.ajax({
      url: 'cityDelete.php', // javítás: helyes fájlnév
      method: 'POST',
      data: { cityName: cityName }, // javítás: cityName helyes kulcsnév
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          // Település sikeresen eltávolítva
          console.log('Település sikeresen eltávolítva: ' + cityName);
          // Újra betöltjük a településeket
          $('#countySelect').trigger('change');
        } else {
          // Hiba történt a törlés során
          console.error('Hiba történt a település törlésekor: ' + response.message);
        }
      },
      error: function(xhr, status, error) {
        // Hibakezelés AJAX hiba esetén
        console.error('AJAX hiba:', status, error);
      }
    });
  });

  
  $('#addCityBtn').click(() => {
    const selectedCounty = $('#countySelect').val();
    const cityName = $('#cityName').val();

    
    $.ajax({
      url: 'cityAdd.php', // feltételezem, hogy van egy cityAdd.php fájl is a város hozzáadásához
      method: 'POST',
      data: { county: selectedCounty, cityName },
      dataType: 'json',
      success: response => {
        if (response.success) {
          
          const newCity = `<div class="city">${cityName}</div><div class="delete-container"><button class="deleteBtn" data-city="${cityName}">Törlés</button></div>`; // javítás: deleteBtn osztály hozzáadva
          $('#cityList').append(newCity);
        } else {
          alert('Error adding city.');
        }
      }
    });
  });
  
});
  
/*

$('#searchInput').change(() => {
    const searchCity = $('#searchInput').val();





    $(document).on('click', '.deleteBtn', function(e) { // javítás: eseménykezelő hozzáadva
    e.preventDefault();
    var cityName = $(this).data('city');

  $('#searchBtn').click(() => {
    const searchCity = $('#searchInput').val();
    const cityName = $('#cityName').val();

    
    $.ajax({
      url: 'citySearch.php',
      method: 'POST',
      data: { county: searchCity, cityName },
      dataType: 'json',
      success: response => {
          if (response.cities.length > 0) {
            var cityList = '<div class="city-list">';
            response.cities.forEach(city => {
              cityList += `<div class="city">${city}             <div class="delete-container"><button class="deleteBtn" data-city="${city}">Törlés</button></div></div>`; // javítás: deleteBtn osztály hozzáadva
            });
            cityList += '</div>';
            $('#cityList').html(cityList).show();            
          } else {
            $('#cityList').hide();
          }
        }
    });
  });

*/














