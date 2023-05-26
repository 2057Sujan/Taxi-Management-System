<?php 
    require_once '../include/dbconnect.php';
    $query = "SELECT * FROM driver";
    $result = mysqli_query($conn,$query);

    $html='<table><tr><th>Driver Name</th><th>Driver Email</th><th>Driver Type</th><th>Driver Expereince</th><th>Driver Status</th></tr>';
    foreach($result as $i=> $data){
        if($data['status'] == 1){
            $status = "N/A";
        }
        else{
            $status = "Available";
        }
        $html.='<tr><td>'.$data['driver_name'].'</td><td>'. $data['email'].'</td><td>'. $data['type'].'</td><td>'.$data['experience'].'</td><td>'.$status.'</td></tr>';
    }
    $html.='</table>';
    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename=driver.xls');
    echo $html;
?>