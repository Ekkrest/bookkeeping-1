<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>temp-1</title>
    </head>
    <body>
    <?php
      require_once("setting.inc");
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
              header("Refresh:1;url=loginPage.php");
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
              header("Refresh:1;url=loginPage.php");
            }
          }
        }
      }
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
    </body>
</html>