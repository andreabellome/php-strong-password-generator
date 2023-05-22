<?php

$lunghezzaPassword = $_GET['lunghezzaPass'];
$ripetizioni = $_GET['options'];

$selectedPassOpts = $_GET['passoption'];

/* if (isset($_GET['passoption'])) {
    $passOpts = $_GET['passoption'];
    foreach ($passOpts as $opt) {
      var_dump($opt);
    }
  } else {
    echo "No fruits selected.";
} */


if (empty($lunghezzaPassword)) {
    $lunghezzaPassword = '10';
}

if (empty($ripetizioni)) {
    $ripetizioni = '1';
}

/* get integer number */
$lunghezzaPassword = intval($lunghezzaPassword);

/* start: generare la password in base alla lunghezza e alle ripetizioni */
function generateRandomString($lunghezzaPassword, $ripetizioni, $selectedPassOpts) {
    
    /* start: extract the password options */
    if (isset($selectedPassOpts)) {

        $alphabet = [];
        foreach ( $selectedPassOpts as $opt ) {
            
            if ( $opt == 'lettere' ) {
                $alphabet = array_merge($alphabet, range('A', 'Z'), range('a', 'z'));
            } elseif ( $opt == 'numeri' ) {
                $alphabet = array_merge($alphabet, range('0', '9'));
            } elseif ( $opt == 'simboli' ) {
                $symbols = range('!', '@');
                array_splice($symbols, 15, 10);
                $alphabet = array_merge($alphabet, $symbols);
            }
            
        }  

    } else { /* please check at least one box --> default is lower and upper case letters */
        $alphabet = array_merge(range('A', 'Z'), range('a', 'z'));
    }
    /* end: extract the password options */

    /* start: generate the password */
    if ($ripetizioni == '1' || $lunghezzaPassword > count($alphabet) ){ /* allow repetitions */

        $randomString = '';
        for ($i = 0; $i < $lunghezzaPassword; $i++) {
            $randomKey = array_rand($alphabet);
            $randomString .= $alphabet[$randomKey];
        }

    } else { /* do not allow repetitions */
        
        shuffle($alphabet);
        $randomString = implode('', array_slice($alphabet, 0, $lunghezzaPassword));
        
    }
    /* end: generate the password */

    return $randomString;
}
/* end: generare la password in base alla lunghezza e alle ripetizioni */

generateRandomString($lunghezzaPassword, $ripetizioni, $selectedPassOpts);

var_dump(generateRandomString($lunghezzaPassword, $ripetizioni, $selectedPassOpts));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- media query -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/library.css">

    <!-- title -->
    <title>Password Generator</title>
</head>
<body>
    
    <div class="container align-it-center debug">

        <!-- start: title and subtitle -->
        <h1 class="debug text-center">
            Strong Password Generator
        </h1>

        <h2 class="debug text-center">
            Genera una password sicura
        </h2>
        <!-- end: title and subtitle -->

        
        <!-- start: form -->
        <form action="index.php" method="GET" class="debug flex flex-dir-row just-cont-evenly flex-wrap">

            <div class="debug padd-5" style=" width: 70% ">
                <span>
                    Lunghezza password:
                </span>
            </div>

            <div class="debug padd-5" style=" width: 30% ">
                <input type="number" name="lunghezzaPass" class="form-control" placeholder="Inserire lunghezza (default: 10)" aria-label="Username" aria-describedby="basic-addon1">
            </div>


            <div class="debug padd-5" style=" width: 70% ">
                <span>
                    Consenti ripetizioni di uno o più caratteri:
                </span>
            </div>


            <div class="debug padd-5" style=" width: 30% ">

                <!-- start: radio buttons -->
                <div class="debug">
                    <input type="radio" id="option1" name="options" value="1">
                    <label for="option1">Si</label>

                    <br>
                    
                    <input type="radio" id="option2" name="options" value="2" checked>
                    <label for="option2">No</label>
                </div>
                <!-- end: radio buttons -->

                <div class="debug">
                    <label>
                        <input type="checkbox" name="passoption[]" value="lettere" checked> Lettere
                    </label> <br>
                    <label>
                        <input type="checkbox" name="passoption[]" value="numeri"> Numeri
                    </label> <br>
                    <label>
                        <input type="checkbox" name="passoption[]" value="simboli"> Simboli
                    </label> <br>
                </div>

            </div>

            <!-- start: buttons -->
            <div class="debug padd-5" style="width: 100%">

                <button type="submit" class="btn btn-primary mr-5">Invia</button>
                <button type="submit" class="btn btn-secondary">Annulla</button>

            </div>
            <!-- end: buttons -->


        </form>
        <!-- end: form -->

        

    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

