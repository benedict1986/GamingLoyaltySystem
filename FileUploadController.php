<?php

require_once 'LoyaltyModel.php';
require_once 'DatabaseAdapter.php';


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

        $table = explode(".", $_FILES["file"]["name"])[0]; //Get the file name as the table name
        $csv = array_map('str_getcsv', file("./" . $_FILES["file"]["name"]));
        $database_adapter = new DatabaseAdapter();
        if ($table == 'Loyalty') {
            for ($i = 1; $i < sizeof($csv); $i++) {
                if ($csv[$i][0] == '')
                {
                    break;
                }
                $item = new LoyaltyModel();
                $item->id = $i;
                $item->patron_id = $csv[$i][0];
                $item->date = $csv[$i][1];
                $item->turnover = str_replace(",", "", $csv[$i][2]);
                $item->floor_position = $csv[$i][3];
                $item->insertItem($table, $database_adapter);
            }
        }
        else if ($table == 'EGB')
        {
            for ($i = 1; $i < sizeof($csv); $i++) {
                if ($csv[$i][0] == '')
                {
                    break;
                }
                $item = new EGBModel();
                $item->id = $i;
                $item->floor_position = $csv[$i][0];
                $item->game_number = explode(" ", $csv[$i][1])[1];
                $item->serial = $csv[$i][2];
                $item->denomination = $csv[$i][3] == 'Multi'?'-1':$csv[$i][3];
                $item->date = $csv[$i][4];
                $item->turnover = $csv[$i][5];
                $item->revenue = $csv[$i][6];
                $item->theme = $csv[$i][7] == 'None'?'0':explode(" ", $csv[$i][7])[1];
                $item->insertItem($table, $database_adapter);
            }
        }
    }
}



