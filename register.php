<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
             <div class="card">
             <form action="" method="POST">
                <div class="card-header text-center">
                    Register
                </div>
                <div class="card-body">
                <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text"class="form-control" id="username" name="lusername">
                </div>  
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-9">
                    <input type="text"class="form-control" id="password" name="lpassword">
                        </div>  
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" name="register" class="btn btn-success" value="Register">
                </div>
            </div>
        </div>
    </div>
    </form>


    <?php 
session_start();
session_destroy();


?>
<?php include('connect.php');
    if (isset($_POST['register'])) {
        if (!empty($_POST['lusername'])&&!empty($_POST['lpassword'])) {
            $username = $_POST['lusername'];
            $password = $_POST['lpassword'];

            $sql = "SELECT * FROM `member2` WHERE `username` = '".$username."";
            $result = $conn -> query($sql);

            if ($result->num_rows > 0 ) {
                $row = $result ->fetch_assoc();
                if ($username == $row['username']) {
                    echo '<script type="text/javascript">
                    swal("Fail", "username or password invalid!!", "error");
                    </script>';
                }
             }

            $sql = "INSERT INTO `member2` (`id`, `name`, `lastname`) VALUES (NULL, '$username', '$password')";
            
            $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
            mysqli_close($conn);

            if($result){
                echo "<script type='text/javascript'>";
                echo "window.location = 'login.php'; ";
                echo "console.log('hello')";
                echo "</script>";
                }
                else{
                    echo '<script type="text/javascript">
                    swal("Fail", "บันทึกข้อมูลไม่สำเร็จ", "error");
                    </script>';
                    
               
            }
        }else {
            echo '<script type="text/javascript">
            swal("Warning", "กรุณาใส่ข้อมูล!", "warning");
            </script>';  
        }
    }
?>





    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>
</html>     