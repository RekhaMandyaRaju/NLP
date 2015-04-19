<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('echonest', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
	
/*while ($row = mysql_fetch_assoc($result)) {
    echo $row['id'];
    echo $row['artist'];
    echo $row['title'];
    echo $row['artist'];
}*/


$data = $_POST["data"];
foreach ($data as $mood => $value) {
    $details = $data[$mood]["response"]["songs"];
	for($i =0; $i < sizeof($details) ; $i++){
		$query = "insert into song_mood values ('".$details[$i]["id"]."', '".$details[$i]["artist_name"]."', '".$details[$i]["title"]."',  '".$mood."')";
		mysql_query($query);
	}
}

$resp["msg"] = "all done successfully";
echo json_encode($resp);






?>