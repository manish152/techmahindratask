<?php
if (isset($_POST['submit'])) {
	$r_name=$_POST['name'];
	$r_email=$_POST['email'];
	$r_mobile=$_POST['mobile'];
	if ($r_name=='') {
		echo "<script>window.alert('Name is required');</script>";
		echo "<script>window.history.back();</script>";
	}
	elseif (!preg_match("/^[a-zA-Z ]*$/",$r_name)) {
		echo "<script>window.alert('Only letters and white space allowed');</script>";
		echo "<script>window.history.back();</script>";
	}
	elseif ($r_mobile=='') {
	 	echo "<script>window.alert('Mobile number is required');</script>";
	 	echo "<script>window.history.back();</script>";
	 }
	elseif ($r_email=='') {
		echo "<script>window.alert('E-Mail is required');</script>";
		echo "<script>window.history.back();</script>";
	}
	elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$r_email)) {
		echo "<script>window.alert('Invalid E-Mail formate');</script>";
		echo "<script>window.history.back();</script>";
	}
	elseif (!preg_match("/^[0-9]*$/",$r_mobile)) {
			echo "<script>window.alert('Mobile number only contain number');</script>";
			echo "<script>window.history.back();</script>";
		}
	elseif (strlen($_POST["mobile"]) != '10') {
			echo "<script>window.alert('Mobile number must Contain 10 Number!');</script>";
			echo "<script>window.history.back();</script>";
		}
	else {
		$con=mysqli_connect("localhost","root","","upxacademy") or die("Could not Connect Database");

		$query =mysqli_query($con,"SELECT * FROM `registration` WHERE `email`='$r_email'");
		$count = mysqli_num_rows($query);
		if($count==0) {
			$insert="INSERT INTO `registration`(`name`, `mobile`, `email`) VALUES ('$r_name','$r_mobile','$r_email')";
			$query_insert=mysqli_query($con,$insert);
			if ($query_insert==true) {
				echo "<script>window.alert('Registration has been successful');</script>";
				echo "<script>window.open('index.html','_self')</script>";
			}
			else {
				echo "<script>window.alert('Problem in registration. Try Again!');</script>";
				echo "<script>window.history.back();</script>";
			}
		}
		else {
			echo "<script>window.alert('User Email is already in use.');</script>";
			echo "<script>window.history.back();</script>";
		}
	}

}
?>