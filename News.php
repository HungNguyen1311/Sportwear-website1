
<?php 
while($row=mysqli_fetch_array($data["SV"])){
    $i=1;
    echo $row[$i];
    echo "</br>";
    $i++;
}
?>
