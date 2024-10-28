<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestione</title>
</head>
<body>
    <?php
        $camerieri = array("Matteo", "Gabriel", "Mattia", "Davide", "Federo");
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $orario = $_POST["orario"];
        $note = $_POST["note"];
        $numTavolo = $_POST["numTavolo"];
        $piatti = [];
        $totale = 0;
        if(isset($_POST['check1']) && (isset($_POST['check2']) == false && isset($_POST['check3']) == false)) {
            $piatti = "Non è possibile ordinare solo l'antipasto<br>";
            echo "$piatti<br><a href='prenotazione.html'>Torna Indietro</a>";
        } else if (!isset($_POST['check1']) && !isset($_POST['check2']) && !isset($_POST['check3'])) {
            $piatti = "ERRORE DATI MANCANTI<br>";
            echo "$piatti<br><a href='prenotazione.html'>Torna Indietro</a>";
        } else {
            if(isset($_POST['check1'])){
                $piatti[] = $_POST['check1'];
                $totale += 5;
            }     
            if(isset($_POST['check2'])){
                $piatti[] = $_POST['check2'];
                $totale += 6;
            }    
            if(isset($_POST['check3'])){
                $piatti[] = $_POST['check3'];
                $totale += 7;
            }
            if(count($piatti) == 3) {
                $totale = $totale - ($totale*0.15);  
            } elseif ($piatti[0] == "Primo" && $piatti[1] == "Secondo") {
                $totale = $totale - ($totale*0.10);  
            }
            if(isset($_POST['radio'])) {
                $parcheggio = $_POST['radio'];
                if($parcheggio == "Parcheggio Custodito") {
                    $totale += 5;
                } elseif($parcheggio == "Parcheggio non Custodito") {
                    $totale += 3;
                }
            } else {
                $parcheggio = "No Parcheggio";
            }   
            $piatti = implode(",",$piatti);
            echo "Piatti Ordinati : $piatti<br>
            Tavolo : num.$numTavolo<br>
            Parcheggio : $parcheggio<br>
            Totale : $totale euro<br>
            Nome : $nome<br>
            Cognome : $cognome<br>
            Orario : $orario<br>
            Eventuali Note : $note";
        }
        ?>
</body>
</html>