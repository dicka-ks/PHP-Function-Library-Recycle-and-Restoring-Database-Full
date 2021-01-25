


<?php

/*----------------------------------------------------------

Fungsi ini untuk memindahkan data secara otomatis 
dari table yang berada database ERP ke dalam table yang berada di database


INCLUSION

    include "../server.php";                //for call the server
    include "../htmlheadjquery.php";        //for jquery animation blink, and css typing
    include "../config.php";                //for connecting into primary database
    include "../configrecycler.php";        //for connecting into secondary database
    include "../phpFunctionLibrary/moveToRecycler.php"

VARIABLE
    contoh stating variable:

    $id             = @$_GET['recycleid'];
    $columnID       = 'ColorID';
    $table          = 'factory.colortable';
    $tableRecycler  = 'recycler.colortable';
----------------------------------------------------------*/

function moveFromRecycler($id,$table,$tableRecycler,$columnID,$con,$conRecycler){


//inclusion this must be changed
include_once "../server.php";                //for call the server
include_once "../htmlheadjquery.php";        //for jquery animation blink, and css typing
include_once "../config.php";                //for connecting into primary database
include_once "../configrecycler.php";        //for connecting into secondary database


        echo "<br>";
        echo $id;
        echo "<br>";


$sql="SELECT * FROM $table WHERE $columnID='$id'";
$query=mysqli_query($con,$sql);
$data=mysqli_fetch_array($query);

        echo "<b>Array From SQL Query</b><br>";
        echo "<p>";
        print_r($data);
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini
        $data = Array ( 

            Array Keys         Array Values

            [0]             => COL6006599fe3a79 
            [ColorID]       => COL6006599fe3a79 
            [1]             => STY5ff0fb4bf050b 
            [StyleID]       => STY5ff0fb4bf050b 
            [2]             => Ebony 
            [Color]         => Ebony 
            [3]             => FCO5ffa3a9a4461f 
            [FabricationID] => FCO5ffa3a9a4461f 
            [4]             => 4.92000 
            [FOB]           => 4.92000 
            [5]             => sketch_STY5ff0fb4bf050b_Ebony.png 
            [ImageName]     => sketch_STY5ff0fb4bf050b_Ebony.png 
            [6]             => 2021-01-19 11:26:00 
            [CreatedOn]     => 2021-01-19 11:26:00 
            )
        */


/*kalau kayak begini hasilnya bakalan double
    $forsequel="";
    foreach ($data as $loopdata){
        $forsequel .= "".$loopdata.", ";
    }
    $forsequel=substr($forsequel,0,-2);

    echo "<br>";
    echo $forsequel;
    echo "<br>";
*/

//jadi kita pakai array_unique() untuk remove duplicate data
$dataUnique=array_unique($data);

        echo "<b>Using array_unique() For Removing Duplicate </b><br>";
        echo "<p>";
        print_r($dataUnique);
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini
        $data = Array ( 

            Array Keys         Array Values

            [0]             => COL6006599fe3a79 
            [1]             => STY5ff0fb4bf050b 
            [2]             => Ebony 
            [3]             => FCO5ffa3a9a4461f 
            [4]             => 4.92000 
            [5]             => sketch_STY5ff0fb4bf050b_Ebony.png 
            [6]             => 2021-01-19 11:26:00 
            )
        */

//ini untuk retrieve value dari setiap array, dan digabungkan menjadi sebuah kalimat
$forsequelUnique="";
foreach ($dataUnique as $loopdata){
    $forsequelUnique .= "'".$loopdata."', "; //untuk membuat kalimat
}
$forsequelUnique=substr($forsequelUnique,0,-2); //untuk menghilangkan dua digit huruf terakhir pada kalimat

        echo "<b>For making a sentence by extracting all the array values, then merge/concatenate them by using foreach .=</b><br>";
        echo "<p>";
        echo $forsequelUnique;
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini:
        COL6008aeadc99a1, STY5ff0fb8755e94, Yellow, FCO5ffa3aacbde08, 4.92000, noImage.png, 2021-01-21 05:29:01
        */

$dataColumn2 = array_keys($dataUnique); //array key digunakan untuk mengambil key menjadi value
        echo "<b>This is using array_keys() function to the previous data from array_unique() function </b><br>";
        echo "<p>";
        print_r($dataColumn2);
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini:
        Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 )
        */

$dataColumn = array_keys($data); //array key digunakan untuk mengambil key menjadi value
        echo "<b>This is using array_keys() function to the first SQL data </b><br>";
        echo "<p>";
        print_r($dataColumn);
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini:
        Array ( [0] => 0 [1] => ColorID [2] => 1 [3] => StyleID [4] => 2 [5] => Color [6] => 3 [7] => FabricationID [8] => 4 [9] => FOB [10] => 5 [11] => ImageName [12] => 6 [13] => CreatedOn )
        */


$dataColumnDiff = array_diff($dataColumn, $dataColumn2);
        echo "<b>This is using array_diff from 2 above functions </b><br>";
        echo "<p>";
        print_r($dataColumnDiff);
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini:
        [1] => ColorID [3] => StyleID [5] => Color [7] => FabricationID [9] => FOB [11] => ImageName [13] => CreatedOn        
        */


$column = "";    
foreach ($dataColumnDiff as $loopdata){
$column .= "".$loopdata.", ";
}
$column=substr($column,0,-2);
        echo "<b>For making a sentence by extracting all the array values, then merge/concatenate them by using foreach .=</b><br>";
        echo "<p>";
        echo $column;
        echo "</p>";
        echo "<br>";
        /*
        hasilnya seperti ini:
        ColorID, StyleID, Color, FabricationID, FOB, ImageName, CreatedOn
        */

$sqlRecycler="INSERT INTO $tableRecycler ($column) VALUE ($forsequelUnique)";
$queryRecycler=mysqli_query($conRecycler,$sqlRecycler);

echo "<p>";
echo $sqlRecycler;
echo "</p>";

header( "refresh:1.5; url=restorerRedirect.php?id=".$id."&table=".$table."&columnID=".$columnID."" ); 

}