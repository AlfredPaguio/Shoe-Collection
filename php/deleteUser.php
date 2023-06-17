<?php  

if(isset($_POST['deleteuser'])){
   include "../auth/connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = $_POST['id'];
	$sql = "DELETE FROM users
	        WHERE userid='".$id."'";
   $result = mysqli_query($con, $sql);
   if ($result) {
   	  header("Location: ../usermanager.php?success=successfully deleted");
   }else {
      header("Location: ../usermanager.php?error=unknown error occurred&$user_data");
   }

}else {
	header("Location: ../usermanager.php");
}