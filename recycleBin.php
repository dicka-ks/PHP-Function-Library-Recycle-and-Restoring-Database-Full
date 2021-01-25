<?php
$pagetitle="ERP: Style";


include "../configrecycler.php";    //$conRecycler dapat dari sini
include "../htmlhead.php";          //page title on config.php    
include "../menutoggled.php";     
include "../searchbodyorand.php";  


include "../phpFunctionLibrary/autoTable.php";  
$dbTable = "recycler.styletable";
autoTable($conRecycler,$dbTable);