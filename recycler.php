<?php

$pagetitle="Recycling...";
//Inclusion for Recycler Function
        include_once "../server.php";                //for call the server
        include_once "../htmlheadjquery.php";        //for jquery animation blink, and css typing
        include_once "../config.php";                //for connecting into primary database
        include_once "../configrecycler.php";        //for connecting into secondary database
        include_once "../phpFunctionLibrary/moveToRecycler.php";        
?>


<center><img src="http://<?php echo $server; ?>/factory/erp/icon/recycling.gif" >
<h1 style='color:#24936b;'>Recycling...</h1>
<div style="font-size:11px;">


<!--
//===============================================================================================
//                                        1 of 2
//                                    Fungsi Recycle
//                include_once "../phpFunctionLibrary/moveToRecycler.php";
//                                  ubah point 1 s.d 4
//===============================================================================================
-->
<div class="typewriter"><!--For CSS Typewriting Efect-->
        <?php
        //calling Recycler Function
                $id             = @$_GET['recycleid'];          // 1. isi dengan 'id' yang mau direcycle
                $columnID       = 'StyleID';                    // 2. isi dengan 'nama kolom' dari id yang mau direcycle
                $table          = 'factory.styletable';         // 3. database asal
                $tableRecycler  = 'recycler.styletable';        // 4. database tujuan        

                moveToRecycler($id,$table,$tableRecycler,$columnID,$con,$conRecycler);
        ?>
</div>
<!--
//-----------------------------------------------------------------------------------------------
-->



<!--
//===============================================================================================
//                                        2 of 2
//                                   Delete Constraint
//                  buat SQL setiap relasi dari table ini ke table lainnya
//===============================================================================================
-->
        <?php
        //relasi 'factory.styletable' --> 'factory.colortable'

                $relation1      = "colortable";                 // 5. relasi yang menuju ke table ini 
                $foreignKey     = $relation1."_".$table;

                $sqlRel="ALTER TABLE `colortable` DROP FOREIGN KEY $foreignKey";
                $queryRel=mysqli_query($con,$sqlRel);
        ?>
<!--
//-----------------------------------------------------------------------------------------------
-->




<script>
$(document).ready(function(){  //jQuery for blink blink in Recycling 
    $("h1").fadeIn().fadeOut() //1x
           .fadeIn().fadeOut() //2x
           .fadeIn().fadeOut() //3x
           .fadeIn().fadeOut() //4x
           .fadeIn().fadeOut() //5x
           .fadeIn().fadeOut().fadeIn();
});
</script>