<?php
require '../assets/php/connection.php';

if(isset($_POST['submit'])){
    $werkplek = $_POST['rating-1'];
    $werkdruk = $_POST['rating-2'];
    $timenow = date('Y-m-d');

    $mysqli = new mysqli('localhost', 'root', '', 'gezondheidsmeter') or die(mysqli_error($mysqli));
    $result = $mysqli->query("INSERT INTO `arbeid` (`ID`, `werkplek`, `werkdruk`) 
    VALUES ('', '$werkplek', '$werkdruk');") or die($mysqli->error);

    echo "<script>alert('De beroordeling is succesvol verzonden')</script>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="arbeidsomstandigheden.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/index.css">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <h4 class="text">Geef je werkplek een beoordeling</h4>
            <ul class="rating-group">
                <li>
                    <input type="radio" id="rating-1-1" value="1" name="rating-1" />
                    <label class="rating-1" for="rating-1-1">1</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-2" value="2" name="rating-1" />
                    <label class="rating-2" for="rating-1-2">2</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-3" value="3" name="rating-1"/>
                    <label class="rating-3" for="rating-1-3">3</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-4" value="4" name="rating-1" />
                    <label class="rating-4" for="rating-1-4">4</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-5" value="5" name="rating-1" required/>
                    <label class="rating-5" for="rating-1-5">5</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-6" value="6" name="rating-1" />
                    <label class="rating-6" for="rating-1-6">6</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-7" value="7" name="rating-1" />
                    <label class="rating-7" for="rating-1-7">7</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-8" value="8" name="rating-1"/>
                    <label class="rating-8" for="rating-1-8">8</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-9" value="9" name="rating-1" />
                    <label class="rating-9" for="rating-1-9">9</label>
                </li>
                <li>
                    <input type="radio" id="rating-1-10" value="10" name="rating-1" />
                    <label class="rating-10" for="rating-1-10">10</label>
                </li>
            </ul>
            <br><br><br><br>
            <div class="rating-group">
                <h4 class="text">Geef je werkdruk een beoordeling</h4>
                <ul class="rating-group">
                    <li>
                        <input type="radio" id="rating-2-1" value="1" name="rating-2" />
                        <label class="rating-1" for="rating-2-1">1</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-2" value="2" name="rating-2" />
                        <label class="rating-2" for="rating-2-2">2</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-3" value="3" name="rating-2"/>
                        <label class="rating-3" for="rating-2-3">3</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-4" value="4" name="rating-2" />
                        <label class="rating-4" for="rating-2-4">4</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-5" value="5" name="rating-2" required/>
                        <label class="rating-5" for="rating-2-5">5</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-6" value="6" name="rating-2" />
                        <label class="rating-6" for="rating-2-6">6</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-7" value="7" name="rating-2" />
                        <label class="rating-7" for="rating-2-7">7</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-8" value="8" name="rating-2"/>
                        <label class="rating-8" for="rating-2-8">8</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-9" value="9" name="rating-2" />
                        <label class="rating-9" for="rating-2-9">9</label>
                    </li>
                    <li>
                        <input type="radio" id="rating-2-10" value="10" name="rating-2" />
                        <label class="rating-10" for="rating-2-10">10</label>
                    </li>
                </ul>
                <br><br>
                <button class="submit" name="submit" type="submit">Versturen</button>
            </div>
        </form>
    </div>
</body>
</html>
