<?php 
$errors = array();
foreach ($errors as $error) {
	echo $errors;
}

if (isset($_POST['login'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
	$password = md5($password);
	$result = $dbh->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' ");
		if ($result->rowCount() == 1) {
			$row = $result->fetch(PDO::FETCH_OBJ);
			// `userid`, `name`, `email`, `password`, `u_type`, `date_registered`
			$_SESSION['userid'] = $row->userid;
			$_SESSION['name'] = $row->name;
			$_SESSION['email'] = $row->email;
			$_SESSION['u_type'] = $row->u_type;
			$_SESSION['date_registered'] = $row->date_registered;
			$_SESSION['status'] = '<div class=" card card-body alert alert-success text-center">
			Login Successful.</div>';
			$_SESSION['loader'] = '
			<div class="spinner-grow bg-primary" role="status">
			<span class="sr-only"></span></div>';

			header("refresh:2; url=".HOME_URL);
		}else{
			$_SESSION['status'] = '<div class=" card card-body alert alert-warning text-center">
			Invalid account, Try again.</div>';
		}

	}else{
			$_SESSION['status'] = '<div class=" card card-body alert alert-danger text-center">
			Wrong Token inserted</div>';
	}
}elseif(isset($_POST['register_btn'])){
	    trim(extract($_POST));
    if (count($errors) == 0) {
        // `userid`, `token`, `surname`, `othername`, `gender`, `phone`, `email`, `password`, `country_id`, `branch_id`, `address`, `nin_number`, `date_registered`, `account_status`, `u_type`
        $check = $dbh->query("SELECT phone FROM users WHERE (phone='$phone' ) ")->fetchColumn();
      if(!$check){
      	$pass= sha1($password);
        $userid = rand(11111111,99999999);
        $sql = "INSERT INTO users VALUES('$userid','','$surname','$othername','$gender','$phone','$email','$pass','$country_id','$branch_id','$address','$nin_number','$today','ACTIVE','$u_type')";
        $result = dbCreate($sql);
        if($result == 1){
        	$message = "Hi ".$surname.', your Login details is: Phone '. $phone.' Password: '.$password;
	        $nums = array("+256".$phone);
	        {
	        $recipients = "".implode(',', $nums);
	        $message = "GREMBASI INVESTMENTS LTD : ".$message;
	        $gateway    = new AfricasTalkingGateway($username, $apikey);
	        try 
	        { 
	          $results = $gateway->sendMessage($recipients, $message);
	          foreach($results as $result) {
	          echo '';
	          }
	        }
	        catch ( AfricasTalkingGatewayException $e )
	        {
	          echo "Encountered an error while sending: ".$e->getMessage();
	        }
	        }
            echo "<script>
                alert('Registration is Successful');
                window.location = '".SITE_URL."?users';
                </script>";
        }else{
            echo "<script>
              alert('User registration failed');
              window.location = '".SITE_URL."?users';
              </script>";
        }
     }else{
          echo "<script>
            alert('Username already registered');
            window.location = '".SITE_URL."?users';
            </script>";
        }
    }

}elseif (isset($_POST['category_btn'])) {
	trim(extract($_POST));
	$check = $dbh->query("SELECT * FROM category WHERE cat_name = '$cat_name' ")->fetchColumn(); 
	if (!$check) {
		$sql = $dbh->query("INSERT INTO category VALUES(NULL, '$cat_name') ");
		if ($sql) {
			echo "<script>
            alert('category inserted Successfully');
            window.location = '".HOME_URL."?category';
            </script>";
		}
	}else{
		echo "<script>
            alert('This category already exist');
            window.location = '".HOME_URL."?category';
            </script>";
	}
}elseif (isset($_POST['drug_btn'])) {
	trim(extract($_POST));
// `drug_id`, `cat_id`, `drug_name`, `drug_qnty`, `drug_buying_price`, `drug_selling_price`, `manufacturer_name`, `manufacturer_phone`, `manufacturer_location`, `expiry_date`
	$sql = $dbh->query("INSERT INTO drug_store VALUES(NULL,'$cat_id','$drug_name','$drug_qnty','$drug_buying_price','$drug_selling_price','$manufacturer_name','$manufacturer_phone','$manufacturer_location','$expiry_date') ");
	if ($sql) {
			echo "<script>
            alert('Drug inserted Successfully');
            window.location = '".HOME_URL."?category';
            </script>";
	}
}elseif(isset($_POST['submit_order_btn'])){
	trim(extract($_POST));
	//`order_id`, `drug_id`, `customer_name`, `customer_phone`, `customer_location`, `order_date`
	$sql = $dbh->query("INSERT INTO orders VALUES(NULL,'$drug_id', '$customer_name','$customer_phone','$customer_location','$today') ");
	if ($sql) {
		
	}
}

?>