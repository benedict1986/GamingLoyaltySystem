<?php

require_once 'LoyaltyModel.php';


if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
} else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("./" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " already exists. ";
    } else {
        move_uploaded_file($_FILES["file"]["tmp_name"], "./" . $_FILES["file"]["name"]);
        
        $table = str_replace(" ","_",$_FILES["file"]["name"]);
        $csv = array_map('str_getcsv', file("./" . $_FILES["file"]["name"]));
        if ($_FILES["file"]["name"] == 'LoyaltyData.csv')
        {
            print_r(sizeof($csv));
                    for($i = 1; $i < sizeof($csv); $i++)
                    {
                        if ($csv[$i][0] == '')
                            break;
                        $item = new LoyaltyModel();
                        $item->id = $i;
                        $item->patron_id = $csv[$i][0];
                        $item->date = $csv[$i][1];
                        $item->turnover = floatval(str_replace(",","",$csv[$i][2]));
                        $item->floor_position = $csv[$i][3];
                        $item->insertItem('Loyalty');
                    }
        }
    }
}
