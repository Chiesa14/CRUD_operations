<?php
include 'connect.php';
$output = '';
if(isset($_POST['download'])){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $output .='<table class="table" border="1">
                    <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Password</th>
                    </tr>';
        while($row = mysqli_fetch_assoc($result)){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $gender = $row['gender'];
            $password = $row['password'];
           $output.= '<tr>
                        <td>'.$fname.'</td>
                        <td>'.$lname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$gender.'</td>
                        <td>'.$password.'</td>
                 </tr>';
        }
        echo '</table>';
        echo $output;
        if(true){
            header('Content-type: application/xls');
            header('Content-Disposition: attachment; filename=reports.xls');
        }else{
            header('Content-type: application/doc');
            header('Content-Disposition: attachment; filename=reports.doc');
        }
    } else {
        echo 'No data was found';
    }
}
?>