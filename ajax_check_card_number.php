<?php 
/*======================================================================+
 File name   : ajax_check_card_number.php
 Begin       : 2018-02-16
 Last Update : 2018-02-16

 Description : Check card with double number.php

 Author: Marco Pedrazzi

 (c) Copyright:
               Sergio Capretta
             
               ITALY
               www.sinx.it
               info@sinx.it

Sinx for Association - Gestionale per Associazioni no-profit
    Copyright (C) 2011 by Sergio Capretta

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
=========================================================================+*/
include ('./dati_db.inc');
$connect = mysqli_connect("$host", "$username", "$password", "$db_name", $port ) or die("cannot connect DB");

$numeroCarta=$_POST['numeroCarta'];
if (isset($numeroCarta)){Check_card_number($numeroCarta,$connect);}

function Check_card_number($numeroCarta,$connect)
{   
    $queryGetNumbers="SELECT COUNT(*) FROM tb_anagrafe WHERE ntessera='$numeroCarta'";
    $result=mysqli_query($connect,  $queryGetNumbers) or die("<b>Errore:</b> Impossibile eseguire la query GetNumbers");
    echo $result->fetch_row()[0];
}