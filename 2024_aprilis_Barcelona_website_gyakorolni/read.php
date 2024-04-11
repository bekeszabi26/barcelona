<?php
// végpont létrehozása
require_once "kapcsolat.php";
// megvizsgálom van e get  kérés, mivel az url-be utazik
if($_SERVER['REQUEST_METHOD']=='GET'){
    try{
        $sql = "SELECT * FROM landmarks";
        $result = mysqli_query($dbconn,$sql);
        //lekérdezési hiba keresése
        if(!$result)
        {
            http_response_code(500); //belső server hiba 
            die("Hiba a kiválasztásban". mysqli_error($dbconn));
        }
        //fetch minden sort asszociativ tömbként
        $barceelona = array();
        while($row = mysqli_fetch_assoc($result)){
            $barceelona[] = $row;
        }
        //lezárjuk az adatbázis kapcsolatot
        mysqli_close($dbconn);

        //elküldjük a JSON választ
        header('Content-Type: application/json; charset=utf-8'); 
        //végpont kiiratása
        echo json_encode($barceelona, JSON_UNESCAPED_UNICODE);
    }catch(Exception $e){
        //kezelje a többi kivételt
        http_response_code(500);
        echo "Hiba:". $e->getMessage();
    }
}else{
    //érvénytelen kérési módszer van
    http_response_code(405);
}