<?php
$pagetitle="Completed";
include "../server.php";
include "../htmlheadjquery.php"; //for jquery animation blink, and css typing

//in this page, there is nothing to be changed.
//all variables in this page are using the previous variables
?>


<?php

//===============================================================================================
//                                               1 of 2 
//                                   di dalam ini nggak perlu diubah
//                              karena semua data diambil dari recycler.php
//===============================================================================================

            include "../config.php";

            $id         = @$_GET['id'];
            $table      = @$_GET['table'];
            $columnID   = @$_GET['columnID'];

            $sqlDelete="DELETE FROM $table WHERE $columnID='$id'";
            $queryDelete=mysqli_query($con,$sqlDelete);



            echo "<center>";

            echo "<div class='typewriter2'>";
            echo "<h1 style='color:#24936b;'>";
            echo "Transfer Completed";
            echo "</h1>";

            echo "<br><p>";
            echo $id;
            echo "<br>";
            echo $table;
            echo "</p></div>";

            header( "refresh:1.9; url=index.php" ); 

//===============================================================================================
//                                         2 of 2
//                                   ReCreate Constraint
//                  buat SQL setiap relasi dari table ini ke table lainnya
//===============================================================================================
            
        //relasi 'factory.styletable' --> 'factory.colortable'

        $relation1      = "colortable";                 // 5. relasi yang menuju ke table ini 
        $foreignKey     = $relation1."_".$table;

            $sqlRel="ALTER TABLE $relation1 
            ADD CONSTRAINT $foreignKey 
            FOREIGN KEY ($columnID) 
            REFERENCES $table($columnID) 
            ON DELETE SET NULL 
            ON UPDATE CASCADE;";

            $queryRel=mysqli_query($con,$sqlRel);


//-----------------------------------------------------------------------------------------------
