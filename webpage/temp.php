<!DOCTYPE html>
<html>
  <head>
    <link href="../css/Css.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../js/JavaScript.js"></script>
    <meta charset="utf-8">
    <title>temp</title>
    <script>
      document.addEventListener('DOMContentLoaded',changeToLogin())
    </script>
    </head>

    <body >
      <?php		
	    $db_link= @mysqli_connect("localhost", "root", "rootroot", "final_project");

	    $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
			
	    $sql = "INSERT INTO userlogin (UserName, UserPassword, UserEmail, UserApproved) VALUES ('$username','$password','$email','N')";
	    mysqli_query($db_link, $sql);
			
	    mysqli_close($db_link);
        ?>
        註冊成功!!!

    </body>
</html>
