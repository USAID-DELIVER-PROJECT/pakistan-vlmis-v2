<?PHP
include ("../../plmis_inc/common/CnnDb.php");
include ("../../plmis_inc/classes/cCms.php");


	$db = new Database();
	$db->connect();
	$db1 = new Database();
	$db1->connect();
	
	/** Room object **/
	
	$pid = ($_REQUEST['pid']);//exit ;
	$result = "";
	$objCat = new cCms();
	
	
	$result .= " <select name = \"districts\" id = \"districts\" size = \"5\" style = \"width:200px;\">";
	
	$qry  = "SELECT PkLocID as whrec_id, LocName as wh_name FROM tbl_locations
							WHERE ParentID =".$pid." ORDER BY wh_name";
	$rsfd = mysql_query($qry) or die(mysql_error()); 

	
		/*if($db->query($qry) && $db->get_num_rows() > 0)
		{
			for($j=0;$j<$db->get_num_rows();$j++)
			{
				$row = $db->fetch_row_assoc();*/				
				while($row = mysql_fetch_array($rsfd)){
					$result .="<option value=\"".$row['whrec_id']."\">".$row['wh_name']."</option>";
				}	
					
		/*	}
		}*/
	$result .="</select>";
	echo $result;	
	$db->close();
?>