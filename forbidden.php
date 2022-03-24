<?php 
if ($_SESSION['userid']!==1) {  
    echo '<script>alert("You are not authorized to access this page!");
                window.location.href="index.php";
    </script>';
}
?>