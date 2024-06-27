<!-- Descrizione
Partiamo da questo array di hotel: https://www.codepile.net/pile/OEWY7Q1G .
Milestone 1

Stampare tutti i nostri hotel con tutti i dati disponibili. Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Milestone 2
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

Milestone 3 
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

NOTA:
deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e
che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
</head>
<body>

    <form action="./index.php" method="GET">
        <label for="">Con parcheggio o senza?</label>
        <div>
            <label for="">Yes</label>
            <input type="radio" name="parkplace" id="parkplace" value='first'>
        </div>
        <div>
            <label for="">No</label>
            <input type="radio" name="parkplace" id="parkplace" value='second'>
        </div>
    </form>

    <?php

        include_once __DIR__ . '/hotel.php';
        $parkingButton = $_GET['parkplace']; 
    ?>

    <ul>
        <?php foreach ($hotels as $hotel) { ?>
        
        <?php if (($parkingButton == 'first') || ($hotel['parking'] == true)) { ?>
            <li>
                <h1>
                    <?php echo $hotel['name']; ?>
                </h1>

                <h3>
                    <?php echo $hotel['description']; ?>
                </h3>

                <p>
                    <?php echo $hotel['vote']; ?> Stelle/a
                </p>

                <p>
                    Distanza dal centro: <?php echo $hotel['distance_to_center']; ?> Km
                </p>
            </li>
        <?php } elseif (($parkingButton == 'second') || ($hotel['parking'] == false)) { ?>
            <li>
                <h1>
                    <?php echo $hotel['name']; ?>
                </h1>

                <h3>
                    <?php echo $hotel['description']; ?>
                </h3>

                <p>
                    <?php echo $hotel['vote']; ?> Stelle/a
                </p>

                <p>
                    Distanza dal centro: <?php echo $hotel['distance_to_center']; ?> Km
                </p>
            </li>
        <?php } ?>

            
        <?php } ?>

    </ul>
</body>
</html>



