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

$secondHotels = $hotels;

if (isset($_GET['parking'])) {
    $parking = $_GET['parking'];

    if ($parking == 1) {
        $hotelArray = [];
        foreach ($secondHotels as $hotel) {
            if ($hotel['parking'] == true) {
                $hotelArray[] = $hotel;
            }
        }

        $secondHotels = $hotelArray;
    }
}

if (isset($_GET['stars'])) {
    $stars = $_GET['stars'];

    if ($stars >= 1 && $stars <= 5) {
        $hotelArray = [];
        foreach ($secondHotels as $hotel) {
            if ($hotel['vote'] >= $stars) {
                $hotelArray[] = $hotel;
            }
        }

        $secondHotels = $hotelArray;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="container-fluid">
        <section class="title">
            <h1 class=" text-center">
                PHP HOTEL
            </h1>
        </section>
    </header>
    <main class='container'>
        <section class="row searchbar">
            <div class="col-6">
                <form action="./hotel.php" method="get">
                    <label for="">
                        Parking?
                    </label>
                    <select name="parking" id="parking">
                        <option value="0" selected >No parking</option>
                        <option value="1">With parking</option>
                    </select>
                    <label for="stars">Stars?</label>
                    <input type="number" name="stars" id="stars" min='1' max='5' required>
                    <button type="submit">Filter</button>
                </form>
            </div>
            <div class="col-6">
                
            </div>
        </section>
        <section class="content row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Parking
                        </th>
                        <th>
                            Vote
                        </th>
                        <th>
                            Distance to center
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($secondHotels as $hotel) { ?>
                        <tr>
                            <?php foreach ($hotel as $property) { ?>
                                <td>
                                    <?php echo "$property"  ?>
                                </td>
                           <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>