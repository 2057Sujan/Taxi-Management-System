<?php 
    require_once '../include/dbconnect.php';
    $query = "SELECT driver.driver_id,earnings.earning_id,driver.driver_name, SUM(earnings.earning) as total_earnings 
    FROM driver 
    JOIN earnings on earnings.driver_id = driver.driver_id 
    GROUP BY earnings.driver_id;";
    $result = mysqli_query($conn,$query);

    $html='<table><tr><th>#</th> <th>Driver Name</th> <th>Driver Total Earnings</th></tr>';
    foreach($result as $i=> $data){
        $html.='<tr><td>'.++$i.'</td><td>'.$data['driver_name'].'</td><td>'. $data['total_earnings'].'</td></tr>';
    }
    $html.='</table>';
    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename=earning-report.xls');
    echo $html;
?>