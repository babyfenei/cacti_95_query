<?php
	include 'conn.php';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$DATE = isset($_POST['DATE']) ? mysql_real_escape_string($_POST['DATE']) : '';
	$IMG_ID = isset($_POST['IMG_ID']) ? mysql_real_escape_string($_POST['IMG_ID']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "DATE like '$DATE%' and IMG_ID like '$IMG_ID%'";
	$rs = mysql_query("select count(*) from 95_percnetile");
	$row = mysql_fetch_row($rs);
	
	$result["count"] = $row[0];
	
	$rs = mysql_query("select * from 95_percnetile");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["data"] = $items;
	
	$result = array(  // 拼装成为前端需要的JSON
  	  'code'=>0,
    	  'msg'=>'',
    	  'data'=>$items,
	  'column'=>false,
	  'offset'=>0
	);
	echo json_encode($result);
?>
