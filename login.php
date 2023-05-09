    <?php
        include 'connect.php';
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $sql = "SELECT  *  FROM users WHERE email = '$email' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count == 1){
            $fname= $row['fname'];
            $lname = $row['lname'];
            header('location:display.php');
        }
        else{
            // echo 'Invalid Username or Password😥!!';
            echo '<script type="text/javascript"> window. = function () { alert("Invalid Username or Password"); } </script>';

        }
    ?>
</body>
</html>