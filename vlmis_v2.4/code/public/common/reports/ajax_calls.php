<?php
include("../../html/adminhtml.inc.php");

		// Show provinces
		if (isset($_REQUEST['pId']))
		{
			$sel_province = $_REQUEST['pId'];

		
		$qry = "SELECT  PkLocID, LocName
				FROM    tbl_locations
				WHERE   LocLvl = 2 AND ParentID IS NOT NULL";
		$qryRes = mysql_query($qry);
		?>
		<span class="sb1NormalFont">Province:</span>
		<select name="province" id="province" class="input_select" onchange="showDistricts()">
			<option value="">-Select-</option>
		<?php
		while ( $row = mysql_fetch_array($qryRes) )
		{
		?>
			<option value="<?php echo $row['PkLocID'];?>" <?php echo ($sel_province == $row['PkLocID']) ? 'selected=selected' : ''?>><?php echo $row['LocName'];?></option>
		<?php
		}
		?>
		</select>
		<?php
}else 
		{
			$sel_province = '';
		}

// Show districts
if (isset($_REQUEST['provinceId']))
{

	if (isset($_REQUEST['dId']))
	{
		$sel_district = $_REQUEST['dId'];
	}else 
	{
		$sel_district = '';
	}
				$stk== ($_REQUEST['stk']);
	$sel_district=($_REQUEST['wh']);
//print $sel_district."---".$_REQUEST['provinceId']."--stk=".$stk;

$qry  = "SELECT stakeholder.stkname, tbl_warehouse.wh_id, tbl_warehouse.wh_name, tbl_dist_levels.lvl_name FROM tbl_warehouse
INNER JOIN stakeholder ON stakeholder.stkid = tbl_warehouse.stkid 
INNER JOIN stakeholder AS Office ON Office.stkid = tbl_warehouse.stkofficeid Inner join 
tbl_dist_levels ON  Office.lvl = tbl_dist_levels.lvl_id WHERE tbl_warehouse.stkid=".$stk." and tbl_warehouse.prov_id=".$_REQUEST['provinceId']." Order by stakeholder.stkname,wh_name";

	/*$qry = "SELECT
				tbl_locations.PkLocID,
				tbl_locations.LocName
			FROM
				tbl_locations
			WHERE tbl_locations.LocLvl = 3 AND tbl_locations.ParentID = '".$_REQUEST['provinceId']."'
			ORDER BY tbl_locations.LocName";*/
	$qryRes = mysql_query($qry);
	?>
	<span class="sb1NormalFont">District:</span>
	<select name="district" id="district" class="input_select">
		<option value="">-Select-</option>
	<?php
	while ( $row = mysql_fetch_array($qryRes) )
	{
	?>
		<option value="<?php echo $row['wh_id'];?>" <?php echo ($sel_district == $row['wh_id']) ? 'selected=selected' : ''?>><?php echo $row['wh_name'];?></option>
	<?php
	}
	?>
	</select>
	<?php
}

?>