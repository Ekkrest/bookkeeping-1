<!DOCTYPE html>
<html>
    <head>
        <link href="../css/Css.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="../js/JavaScript.js"></script>
        <meta charset="utf-8">
        <title>temp-1</title>
        <script>
            document.addEventListener('DOMContentLoaded',changeToBookkeeping1())
        </script>
      </head>

    <body >
    <?php
      session_start();
      header("Content-Type: text/html; charset=utf-8");
      ini_set('display_errors','off');
      $db_host = "localhost";
      $link = @mysqli_connect($db_host, "root", "rootroot", "final_project");
      mysqli_set_charset($link, 'utf8');
      if($link) {
        $select = @mysqli_select_db($link, "final_project");
        if($select){
          if(isset($_POST["submit"])){

            $username=$_POST["username"];
            $password=$_POST["password"];

            if($username==""||$password==""){
              echo"<script>"."window.alert"."("."\""."請填寫正確的資訊！"."\"".")".";"."</script>";
              header("Refresh:1;url=loginPage.html");
              exit;
            }
            $str= "SELECT *\n". "FROM userlogin\n". "WHERE userlogin.UserName = \"$username\"";
            mysqli_set_charset($link, 'utf8');     
            $result = mysqli_query($link, $str);
            $pass = mysqli_fetch_row($result);
            $pa=$pass[1];
            if($pa==$password){              
              $_SESSION["one"]=$username;
              $_SESSION["two"]=$password;
              echo"登入成功！";
              header("Refresh:1;url=bookkeeping.php");
            }
            else{  
              echo"<script>"."window.alert"."("."\""."登入失敗，請重新登入！"."\"".")".";"."</script>";
              header("Refresh:1;url=loginPage.html");
            }
          }
        }
      }
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    </body>
</html>