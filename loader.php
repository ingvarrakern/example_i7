<?php
require_once('./vendor/autoload.php');
require 'connect.php';
use Shuchkin\SimpleXLSX;
//die("<pre>".print_r($_FILES,true )."</pre>");

$uploadpath = 'C:\\wamp64\\www\\practice1\\Practice_SitePHP\\uploaded\\';
$uploadfile = $uploadpath . basename("uploaded_".$_FILES['excelform']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['excelform']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}


if ( $xlsx = SimpleXLSX::parse($uploadfile) ) {
    //echo "<pre>".print_r( $xlsx->rows(),true )."</pre     >";
    $i = 0;
    foreach( $xlsx->rows() as $r ) {
        if($i > 0){
            $query = "INSERT INTO users (username, email, password) VALUES('$r[0]','$r[1]','12345')";
            
//            INSERT INTO OPENROWSET('Microsoft.ACE.OLEDB.12.0','Excel 8.0;Database=C:\temp\temp.xls;', [price$])
//(COL01,COL02,COL03,COL04)
//
//DoCmd.OutputTo acOutputQuery, "ИмяОтчета", acFormatXLSX, ("ИмяОтчета.xlsx")
            // die($query);
            $result = $connection->query($query);
            
            //echo "<pre>".print_r($r,true)."</pre     >";
            //echo $result . "<br>";            
        }
        $i++;
    }
    echo "Success upload file check your database <br> -----------------------------";
} else {
    echo SimpleXLSX::parseError();
    
    
 
} 
 
 
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

