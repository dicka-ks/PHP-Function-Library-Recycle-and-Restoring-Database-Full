<?php

include "config.php";
include "../htmlhead.php"; //page title on config.php    
include "../menu.php";     
include "../searchbodyorand.php";      


//contents

echo "<table id='kolom'>";

    echo "<tr>";
        echo "<th>Style</th>";
        echo "<th>CM</th>";
        echo "<th>Buyer / Vendor</th>";
        echo "<th>Action</th>";
    echo "</tr>";


    $sql="SELECT StyleID, Style, Description, CM, buyertable.NickName AS NN, vendortable.NickName AS VNN 
    FROM ((styletable
    LEFT JOIN buyertable 
    ON styletable.BuyerID=buyertable.BuyerID)
    LEFT JOIN vendortable
    ON styletable.VendorID=vendortable.VendorID) 
    ";
    $query=mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_assoc($query))
    {
    echo "<tr>";
        
        echo "<td><b>".$row['Style']."</b><br><font style='color:#878787 !important;margin-left:0em;'>".$row['Description']."</font></td>";
        
            $cmrupiah=($row['CM'])*$kurs;
            $cmrupiahformatted=number_format($cmrupiah,2,",",".");
        echo "<td>US$ ".$row['CM']."<br><font style='color:#878787 !important;margin-left:0em;'>Rp ".$cmrupiahformatted."</font></td>";
        echo "<td>".$row['NN']." / <br><font style='color:#878787 !important;margin-left:0em;'>".$row['VNN']."</font></td>";
        echo "<td>";

            echo "<div class=''><a href='update.php?updateid=".$row['StyleID']."'>";
            echo "<img src='http://".$server."/factory/erp/icon/edit1.png' height='13'>";
            echo "</a>";

            echo " | ";
            
            echo "<a href='delete.php?deleteid=".$row['StyleID']."' onclick='return confirm(\"Tekan OK untuk melanjutkan delete?\");'>";
            echo "<img src='http://".$server."/factory/erp/icon/delete.png' height='13'>";
            echo "</a>";

            echo " | ";
            
            echo "<a href='recycler.php?recycleid=".$row['StyleID']."' onclick='return confirm(\"Tekan OK untuk melanjutkan delete?\");'>";
            echo "<img src='http://".$server."/factory/erp/icon/recycle2.png' height='13.5'>";
            echo "</a>";

            echo " | ";
            
            echo "<a href='../createTable.php?createid=".$row['StyleID']."' onclick='return confirm(\"Tekan OK untuk melanjutkan delete?\");'>";
            echo "Create";
            echo "</a></div>";


        echo "</td>";
    echo "</tr>";
    }


echo "</table>";





echo "</div>";

?>

</body>
</html>
