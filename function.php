
<?php 
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function pwdMatch($password, $rpassword){
    $result;
    if($password !== $rpassword){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function uidExists($mysqli, $username ,$email){
    $sql="SELECT * FROM user WHERE username = ? OR email = ?;";
    $statement = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($statement,$sql)){
        header("location:./register.php?error=statementfailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ss", $username ,$email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($statement);
}
function createUser($mysqli, $fullname,$email,$username,$password){
    $sql="INSERT INTO user (fullname,email,username,password) VALUES(?,?,?,?);";
    $statement = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($statement,$sql)){
        header("location:./register.php?error=statementfailed");
        exit();
    }
    $hashedPassword = md5($password);
    mysqli_stmt_bind_param($statement, "ssss", $fullname,$email,$username,$hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location:./register.php?error=none");
    exit();
}
function loginUser($mysqli,$username,$password){
    $usernameExists = uidExists($mysqli, $username ,$username);

    if($usernameExists === false){
        header("location:./register.php?error=usernotexists");
        exit();
    }

    $hashedPassword = $usernameExists['password'];
    if($hashedPassword !== md5($password)){
        header("location:./register.php?error=wrongpassword");
    }else if($hashedPassword == md5($password)){
        session_start();
        $_SESSION["userid"] = $usernameExists['user_id'];
        header("location:./index.php");
        exit();
    }
}
?>