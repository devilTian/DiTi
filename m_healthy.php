<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var_dump($_POST);
$dbh = new PDO('mysql:dbname=diti;host=192.168.1.103;', 'spidertianye', 'root');
var_dump($dbh->query('SELECT * FROM weight')->fetch(PDO::FETCH_ASSOC));
