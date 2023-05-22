<?php



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
                <input type="number" class="form-control" placeholder="Inserire lunghezza (ad es. 10)" aria-label="Username" aria-describedby="basic-addon1">
            </div>


            <div class="debug padd-5" style=" width: 70% ">
                <span>
                    Consenti ripetizionidi uno o più caratteri:
                </span>
            </div>


            <div class="debug padd-5" style=" width: 30% ">

                <!-- start: radio buttons -->
                <div class="debug">
                    <input type="radio" id="option1" name="options" value="1" checked>
                    <label for="option1">Si</label>

                    <br>
                    
                    <input type="radio" id="option2" name="options" value="2">
                    <label for="option2">No</label>
                </div>
                <!-- end: radio buttons -->

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

