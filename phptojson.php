<?php
$sql = "select * from choices_tak";
$result = mysqli_query($conn,$sql);
$json_file_name = 'questions.json';
$fp = fopen($json_file_name,'w');
fwrite($fp,'[');

$isFirstRow = true;
while ($row = mysqli_fetch_assoc($result)){
    if (!$isFirstRow){
        fwrite($fp,',');
    }
    else{
        $isFirstRow = false;
    }
    fwrite($fp,json_encode($row,JSON_PRETTY_PRINT));
}
fwrite($fp,']');
fclose($fp);
mysqli_close($conn);
?>