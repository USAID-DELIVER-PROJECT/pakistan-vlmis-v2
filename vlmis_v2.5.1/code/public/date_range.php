<?php
$host = 'localhost';
$user = 'vlmisr2user';
$pass = 'Q9f3GMeiP';
$db = 'vlmisr2';
$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db, $conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Date Range</title>
        <?php
        if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            $startDate = $_GET['start_date'];
            $endDate = $_GET['end_date'];
            $begin = new DateTime($startDate);
            $end = new DateTime($endDate);
            $diff = $begin->diff($end);
            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);
            echo "<table>";
            echo "<tr>";
            echo "<th>Asset ID</th>";
            echo "<th>Gross</th>";
            echo "<th>Net Usable</th>";
            echo "<th>Being Used</th>";
            echo "<th>Date</th>";
            echo "</tr>";
            foreach ($period as $date) {
                $qry = "SELECT DISTINCT cold_chain.asset_id,
				 ccm_models.gross_capacity_20 + ccm_models.gross_capacity_4 AS gross,
				 ccm_models.net_capacity_20 + ccm_models.net_capacity_4 AS net_usable,
				 ROUND(
				  SUM(
				   (
					placements.quantity * pack_info.volum_per_vial
				   ) / 1000
				  )
				 ) AS being_used
				FROM
				 cold_chain
				INNER JOIN ccm_asset_types AS AssetSubtype ON cold_chain.ccm_asset_type_id = AssetSubtype.pk_id
				LEFT JOIN ccm_asset_types AS AssetMainType ON AssetSubtype.parent_id = AssetMainType.pk_id
				INNER JOIN placement_locations ON cold_chain.pk_id = placement_locations.location_id
				INNER JOIN ccm_models ON ccm_models.pk_id = cold_chain.ccm_model_id
				LEFT JOIN placements ON placements.placement_location_id = placement_locations.pk_id
				LEFT JOIN stock_batch ON placements.stock_batch_id = stock_batch.pk_id
				INNER JOIN pack_info ON stock_batch.stakeholder_item_pack_size_id = pack_info.pk_id
                                INNER JOIN stakeholder_item_pack_sizes ON pack_info.stakeholder_item_pack_size_id = stakeholder_item_pack_sizes.pk_id
				WHERE
				 cold_chain.warehouse_id = 159
				AND cold_chain.ccm_asset_type_id IN (16)
				AND placement_locations.location_type = 99
				AND DATE_FORMAT(
				 placements.created_date,
				 '%Y-%m-%d'
				) <= '" . $date->format("Y-m-d") . "'
				GROUP BY
				 cold_chain.auto_asset_id
				ORDER BY
				 cold_chain.asset_id,
				 cold_chain.ccm_asset_type_id DESC";
                $qryRes = mysql_query($qry);
                while ($row = mysql_fetch_array($qryRes)) {
                    echo "<tr>";
                    echo "<td>" . $row['asset_id'] . "</td>";
                    echo "<td>" . $row['gross'] . "</td>";
                    echo "<td>" . $row['net_usable'] . "</td>";
                    echo "<td>" . $row['being_used'] . "</td>";
                    echo "<td>" . $date->format("Y-m-d") . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        ?>
    </head>

    <body>
        <form name="frm" method="get">
            <input type="text" name="start_date" placeholder="YYYY-MM-DD" />
            <input type="text" name="end_date" placeholder="YYYY-MM-DD" />
            <input type="submit" value="submit" />
        </form>
    </body>
</html>