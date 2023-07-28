<?php
    
include 'koneksi.php';
    //daftar
    if (isset($_POST['registerbtn'])){
        
        $usn = $_POST['username'];
        $psw = $_POST['password'];

        $epsw = md5($psw);

        $insert = mysqli_query($connect, "INSERT INTO user (usn,psw) values ('$usn','$epsw')");
        
        if ($insert){
            $check = mysqli_query($connect, "SELECT * FROM user where usn='$usn'");
            $count = mysqli_num_rows($check);
            $nowpw = mysqli_fetch_array($check, MYSQLI_ASSOC);
            $_SESSION['data'] = $nowpw;
            $_SESSION['login'] = true;
            echo '
            <script>
                alert("Register Success");
                window.location.href="index.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Register Failed");
                window.location.href="daftar.php";
            </script>
            ';
        }        
    }
        
    //login
    if (isset($_POST['loginbtn'])){

        $usn = $_POST['username'];
        $psw = $_POST['password'];


        $check = mysqli_query($connect, "SELECT * FROM user where usn='$usn'");
        $count = mysqli_num_rows($check);
        $nowpw = mysqli_fetch_array($check, MYSQLI_ASSOC);

        if($count>0){
            if(md5($psw) == $nowpw['psw']){
                $_SESSION['data'] = $nowpw;
                $_SESSION['login'] = true;
                echo '
                <script>
                    alert("Login Success");
                    window.location.href="index.php";
                </script>
                ';
                // header('Location: index.php');
            } else {
                echo '
                <script>
                    alert("Wrong Password");
                    window.location.href="login.php";
                </script>
                ';
            }
        }
    }
    
    
?>