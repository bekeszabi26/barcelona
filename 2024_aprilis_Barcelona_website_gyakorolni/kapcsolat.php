<?php
// utf8 "ipari standard" beállítása, hogy az ékezetes karakterek megfelelően jelenjenek meg
header("Content-Type:text/html; charset-utf-8");
/* ha constal kell definiálni a változókat, akkor a define()-t hívjuk meg, 
az első paraméter a konstans neve, amit rendszerint csupa nagy betűvel adunk meg,
a második paraméter az értéke, itt a xampp adatai kerülnek megadásra */
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
//ezt az egy értéket kell csak mindig átírni, az aktuálisan használt adatbázis nevére!!!!!!!
define("DBNAME","barcelona");
// ha a feladat constansal kéri akkor ne így add meg !!!
//$server = 'localhost';
//kapcsolat létrehozása
$dbconn=@mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die ("Hiba az adatbázis kapcsolatban");
mysqli_set_charset($dbconn,"utf8");
//kapcsolat ellenőrzése, ha nincs adat a $dbconn változóba, akkor ez igaz értéket kap, és kiírja a hibát
if(!$dbconn)
{
    die("kapcsolat sikertelen:". mysqli_connect_error());
}
