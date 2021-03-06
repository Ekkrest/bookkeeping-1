<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href='../node_modules/fullcalendar/main.css' rel='stylesheet' />
    <script src='../node_modules/fullcalendar/main.js'></script>
    <link href="../css/bookkeeping.css" rel='stylesheet'/>    
  </head>
  <body>
    <div id='calendar'>
      <script>
        var selectDate = "";
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          let preInfo = "";
          let currentColor = "";
          var calendar = new FullCalendar.Calendar(calendarEl, {
          
          themeSystem: 'bootstrap',

          dateClick: function(info){ 
          selectDate = info.dateStr;          
          document.getElementById("selectDate").value = selectDate;
          console.log(calendar.today());
          if(preInfo === ""){
            info.dayEl.style.backgroundColor = '#c6d9eb';
          }
          else{
            currentColor = info.dayEl.style.backgroundColor;
          if(preInfo.dateStr !== info.dateStr){ 
            info.dayEl.style.backgroundColor = '#c6d9eb';
            preInfo.dayEl.style.backgroundColor = currentColor;
          }
          else{
            info.dayEl.style.backgroundColor = currentColor;
            preInfo.dayEl.style.backgroundColor = "#c6d9eb";
          }
          }
        preInfo = info;
        /*calendar.addEvent(
          { 
            title: 'The Title', // a property!
            start: info.dateStr, // a property!
            allDay: true // a property! ** see important note below about 'end' **
          })*/
          } ,  
              dayMaxEventRows: true, // for all non-TimeGrid views 
            },   
          );  
              calendar.render();  
        });
    </script>
    </div>
    <div id='setForm'>
    <form action="bookkeeping.php" method="post">
    <div class="form-group">
      <input class="form-control" value="2021-06-08" name="selectDate" id="selectDate">
    </div>
    <div class="form-group">
      <label for="varity">????????????</label>
        <select class="form-control" name="type" id="varity">
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
          <option value="??????">??????</option>
        </select>
    </div>
    <div class="form-group">
      <label for="name">????????????</label>
      <input type="text" class="form-control" name="extended">
    </div>
    <div class="form-group">
      <label for="name">????????????</label>
      <input type="number" class="form-control" name="amount">
    </div>
    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
   </form>
   </div>
   <?php
   session_start();
   if($_SESSION["one"]){
    if(isset($_POST["submit"])){
      $date = $_POST["selectDate"];
      $type = $_POST["type"];
      $extended = $_POST["extended"];
      $amount = $_POST["amount"];
      $username = $_SESSION["one"];
        if($date != "" && $type != "" && $extended != "" && $amount != ""){
          require_once("setting.inc");
          $sql = "INSERT INTO userdata (UserName, CostDate, CostType, CostAmount, CostExtended) Values ('$username', '$date', '$type','$amount','$extended')";
          mysqli_query($db_link, $sql);
          mysqli_close($db_link);         
        }
      }      
    }
  else{
    header("Location: ../webpage/loginPage.php");
  }
  
   ?>
  </body>
</html>