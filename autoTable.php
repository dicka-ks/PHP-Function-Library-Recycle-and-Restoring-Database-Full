<?php

include "../configrecycler.php";


function autoTable($conRecycler,$dbTable){

$sqlPrimary="SELECT * FROM ".$dbTable."";
$queryPrimary=mysqli_query($conRecycler, $sqlPrimary);
$row=mysqli_fetch_array($queryPrimary);

if(! $row){
    echo "<center>your recycle bin is empty</center>";
}
else{
//=====================================================================================
//                           ini untuk column
//=====================================================================================
    $sql2="SELECT * FROM ".$dbTable."";
    $query2=mysqli_query($conRecycler, $sql2);
    $data2=mysqli_fetch_array($query2);
            // print_r($data2);

    $data2Unique=array_unique($data2);
            // echo "<br>";
            // echo "<br>";
            // print_r($data2Unique);

    $data2Key=array_keys($data2);
            // echo "<br>";
            // echo "<br>";
            // print_r($data2Key);

    $data2UniqueKey=array_keys($data2Unique);
            // echo "<br>";
            // echo "<br>";
            // print_r($data2UniqueKey);

    $dataDiff=array_diff($data2Key,$data2UniqueKey);
            // echo "<br>";
            // echo "<br>";
            //print_r($dataDiff);

    $dataDiffForeach="";
    foreach($dataDiff as $loopData2){
        $dataDiffForeach .= "<th>".$loopData2."</th>";
    }
            //echo $dataDiffForeach;
    

//=====================================================================================


//=====================================================================================
//                           ini untuk content
//=====================================================================================
    $sql="SELECT * FROM ".$dbTable."";
    $query=mysqli_query($conRecycler, $sql);


    echo "<table id='kolomRecycle'>"; //id kolomRecycle hanya untuk CSS

        echo "<tr>";
            echo "<th>No</th>";
            echo $dataDiffForeach;
            echo "<th>Action</th>";
        echo "</tr>";
    
        echo "<tr>";
            $i=0;
            while($data=mysqli_fetch_array($query)){
            $i++;
            //    echo "<br>";
            //    echo "<br>";    
            //    print_r($data);

            $dataUnique=array_unique($data);
            //    echo "<br>";
            //    echo "<br>";
            //    print_r($dataUnique);

            $dataUniqueForeach="";
            foreach($dataUnique as $loopData){
            $dataUniqueForeach .= "<td>".$loopData."</td>";}
            //    echo "<br>";
            //    echo "<br>";
                echo "<tr>";
                    echo "<td>$i</td>";
                    echo $dataUniqueForeach;
                    echo "<td><a href='restore.php?id=".$data[0]   ."'>Restore</a></td>";
                echo "</tr>";
            }

        echo "</tr>";
    echo "</table>";
    }
}   
//=====================================================================================


// while($data=mysqli_fetch_array($query)){
//     //print_r($data);

//     $dataUnique=array_unique($data);
//     //print_r($dataUnique);

//     echo "<tr>";

//         $dataTabled="";
//         foreach($dataUnique as $loopData){
//             $dataTabled .= "<td>".$loopData."</td>";
//         }
//         echo "$loopData";

//     echo "</tr>";

// }



// echo "<table id='kolom'>";
//     echo "<tr>";
//         echo "<th>ColorID</th>";        //1
//         echo "<th>StyleID</th>";        //2
//         echo "<th>Color</th>";          //3
//         echo "<th>FabricationID</th>";  //4
//         echo "<th>FOB</th>";            //5
//         echo "<th>ImageName</th>";      //6
//         echo "<th>CreatedOn</th>";      //7
//         echo "<th>Action</th>";         //8

//     echo "</tr>";

//     while($data=mysqli_fetch_array())
//     echo "<tr>";

//     echo "</tr>";


// echo "</table>";
