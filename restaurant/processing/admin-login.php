<?php
	session_start();
	$_SESSION['admin_id']="";
?>
<?php
	if(isset($_POST['submit'])){
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];

		$conn = mysqli_connect("localhost","root","","restaurant_db");
		$sql = mysqli_query($conn, "SELECT * FROM admin WHERE admin_username= '".$admin_username."' and admin_password = '".$admin_password."'");
		$data = mysqli_fetch_array($sql);
		
		if(mysqli_num_rows($sql)>0){
			echo "admin login successful";
			$_SESSION['admin_id']=$data['id'];
			header('Location: ../admin-home.php');		
		}else{
			//echo "login failed";
			
			header('Location: ../admin-login-failed.php');
		}
	}
?>