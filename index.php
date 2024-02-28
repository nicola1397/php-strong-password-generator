<?php 
$uppercase="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$lowercase="abcdefghijklmnopqrstuvwxyz";
$number="0123456789";
$symbol="!@#$%^&*()-_+={}[]|:;.?/";
$characters= $lowercase;

$selected = !empty($_GET);
    if ($selected) {
        echo ("selected ". $selected);
$length= (int) $_GET["length"];
echo ("lunghezza " . $length);

    // IF
    if ( $length > 8 ){ 
        $include_symbols=$_GET["symbols"];
        echo("simboli " . $include_symbols);
        $include_numbers=$_GET["numbers"];
        echo("numeri " . $include_numbers);
        $include_uppercase=$_GET["uppercase"];
        echo("maiuscole " . $include_uppercase); 
        $generated = generate_password($length,$characters,$symbol,$number,$uppercase,$include_symbols,$include_numbers,$include_uppercase);
        var_dump("Generata", $generated);
    }};
    
// FUNZIONE
function generate_password($length,$characters,$symbol,$number,$uppercase,$include_symbols,$include_numbers,$include_uppercase) {
    $password=[];
    if ( $include_symbols == "on" ) {  
        echo ("simboli");
        $characters .= $symbol;
    };
    if ( $include_numbers == "on" ) {
        echo ("numbers");
        $characters .= $number;
    };
    if ( $include_uppercase == "on" ) {
        echo ("uppercase");
        $characters .= $uppercase;
    };
    
    echo ("caratteri consentiti " . $characters);
    
        while (count($password) < $length) {
            $random = rand(0, strlen($characters) - 1);
            $password[] = $characters[$random];
        };

    echo $password;
    return implode("",$password);    
};






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Password Generator</title>
     <!-- LINK BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- SCRIPT BOOTSRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
<form action="./index.php" method="GET" >
      <div>
      <div class="m-3 ">

    <label for="length">Numero di caratteri:</label>
<input class="form-control" type="number" name="length" id="length" placeholder="Inserisci la lunghezza della password. Minimo 8 caratteri."/></div>
<div class="m-3 form-check">

<input class="form-check-input" type="checkbox" name="symbols" id="symbols">
    <label class="form-check-label" for="symbols">Includi simboli</label></div>

    <div class="m-3 form-check">
<input class="form-check-input" type="checkbox" name="numbers" id="numbers">
    <label class="form-check-label" for="numbers">Includi numeri</label></div>

    <div class="m-3 form-check">
<input class="form-check-input" type="checkbox" name="uppercase" id="uppercase">
    <label class="form-check-label" for="uppercase">Includi lettere maiuscole</label>
</div>

</div>
    <button type="submit" class="m-3" >INVIA</button>
    </form>

</body>
</html>