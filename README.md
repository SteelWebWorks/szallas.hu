Egyszerű API a szallas.hu próbafeladat megoldásának <br>
<br>
Frontend nem lett implementálva, de a routing kezelni tud nem api hívásokat is. Az API felhasználó autentikációval van védve, így a companies végpontok használata elött regisztrálni és belépni kell. Belépéskor válaszüzenetban az API ad egy access_token-t, amivel az azonosítás történik. Ez egy Bearer típusu token.<br>
<br>
A következő API végpontok érhetőek el:<br>
POST api/v1/register -> új felhasználó regisztrálása<br>
POST api/v1/login -> felhasználó beléptetés<br>
POST api/v1/logout -> felhasználó kiléptetét<br>
<br>
GET api/v1/companies -> kilistázza a teljes companies táblát<br>
POST api/v1/companies -> egy új Company felvétele<br>
GET api/v1/companies/{company} -> visszaad egy company-t az adott ID alapján<br>
GET api/v1/copmanies/?id={companies} -> visszaad egy vagy több company-t a megadott ID-k alapján<br>
PUT api/v1/companies/{company} -> módosít egy company-t a megadott paraméterek alapján<br>
DELETE api/v1/companies/{company} -> törli a megadott company-t<br>
<br>
SQL lekérdezések:<br>
<br>
activity.sql<br>
companyFoundationDate.sql<br>
