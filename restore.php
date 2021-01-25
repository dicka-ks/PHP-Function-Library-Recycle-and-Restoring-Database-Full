<?php
//Inclusion for Recycler Function
$pagetitle= "Restoring...";
        include_once "../server.php";                //for call the server
        include_once "../htmlheadjquery.php";        //for jquery animation blink, and css typing
        include_once "../config.php";                //for connecting into primary database
        include_once "../configrecycler.php";        //for connecting into secondary database
        //===============================================================================================
        //                                 Fungsi Recycle
        //             include_once "../phpFunctionLibrary/moveToRecycler.php";
        //                         ubah point inclusion di bawah ini
        //===============================================================================================
        include_once "../phpFunctionLibrary/moveFromRecycler.php";        
?>


<center><img src="http://<?php echo $server; ?>/factory/erp/icon/recycling.gif" >
<h1 style='color:#24936b;'>Recycling...</h1>
<div style="font-size:11px;">


<!--
//===============================================================================================
//                                 Fungsi Recycle
//             include_once "../phpFunctionLibrary/moveToRecycler.php";
//                               ubah point 1 s.d 4
//===============================================================================================
-->

<!--For CSS Typewriting Efect-->
<div class="typewriter">
        <?php
        //calling Recycler Function
                $id             = @$_GET['id'];          // 1. isi dengan 'id' yang mau direcycle
                $columnID       = 'StyleID';                    // 2. isi dengan 'nama kolom' dari id yang mau direcycle
                $table          = 'recycler.styletable';         // 3. database asal
                $tableRecycler  = 'factory.styletable';        // 4. database tujuan        

                moveFromRecycler($id,$table,$tableRecycler,$columnID,$con,$conRecycler);
        ?>
</div>
<!--
//===============================================================================================
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