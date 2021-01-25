<?php
$pagetitle="Completed";
include "../server.php";
include "../htmlheadjquery.php"; //for jquery animation blink, and css typing

//in this page, there is nothing to be changed.
//all variables in this page are using the previous variables
?>


<?php

//===============================================================================================
//                                halaman ini nggak ada yang perlu diubah
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
