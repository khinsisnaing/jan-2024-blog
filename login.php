<?php 
    
    session_start();
    // include("header.php"); 
    include("db.php"); 
    // include ("sidebar.php");

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = [];

        empty(trim($email)) ? ($error[] = 'Email is required'):'';
        empty(trim($password)) ? ($error[] = 'Password is required'):'';

        if(!$error){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn,$query);
            if ($result){
                if(mysqli_num_rows($result)==0){
                    $error[] = 'Email or Password is wrong';
                }else{
                    $_SESSION['user'] = mysqli_fetch_assoc($result);
                    $_SESSION['auth'] = true;
                    header('location:index.php');
                }
            }else{
                echo mysqli_connect_error();
            }
        }

    }

    
?>

<?php 
    // include("header.php");
    include("sidebar.php"); 

?>



<h1>Login</h1>
<form action="#" method="post">
    <input type="email" placeholder="Your email" name="email" class="form-control mb-3">
    <input type="password" placeholder="Your Password" name="password" class="form-control mb-3">
    <input type="submit" value="login" name="login" class="btn btn-success">
</form>


