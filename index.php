<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking_requested = false;

    if(isset($_GET['parking']) && $_GET['parking']=="on"){
        $parking_requested = true;
    }

    $minVote = 0;
    if(isset($_GET['minVote']) && is_numeric($_GET['minVote']) && $_GET['minVote'] > 0 && $_GET['minVote'] <= 5){
        $minVote = (int) $_GET['minVote'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="">
        <div>
            <input type="checkbox" id="parking" name="parking">
            <label for="parking">Clicca qui per avere solo gli hotel con il parcheggio</label>
        </div>

        <div>
            <input type="number" id="minVote" name="minVote" min=1 max=5>
            <label for="minVote">Voto minimo?</label>
        </div>


        <button>Applica filtri</button>
    </form>
  <?php 

    foreach ($hotels as $hotel) {
        if($parking_requested){
            if(!$hotel['parking']){
                continue; // salta solo l'iterazione corrente ma poi procede a controllare gli altri hotel. Per questo non posso utilizzare break
            }
        }

        if($hotel['vote'] < $minVote){
            continue;
        }

        echo '<h2>' . $hotel['name'] . '</h2>';
        echo '<p>' . $hotel['description'] . '</p>';
        echo '<p>Parcheggio: ' . ($hotel['parking'] ? 'Si' : 'No') . '</p>';
        echo '<p>Voto: ' . $hotel['vote'] . '</p>';
        echo '<p>Distanza dal centro: ' . $hotel['distance_to_center'] . ' km</p>';
}
  
  ?>
</body>
</html>