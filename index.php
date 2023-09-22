<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title> VPF Entry </title>
  <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>


<body>

    <?php
      global $con;
      $con=mysqli_connect("sql12.freesqldatabase.com","sql12647865","swC7yDKF1Q","sql12647865") or die("Failed to connect");
    ?>




  <div class="wrapper">
    <div class="title">
      Update Entry
    </div>
    <form action="#" method="POST">
      <div class="field">
        <input type="number" <?php if(isset($_POST['cno'])){ global $cno; $cno=$_POST['cno'];echo "value='".$cno."'";}?> name="cno" minlength="10" maxlength="10" required>
        <label>Contact Number</label>
      </div>
      <div class="field">
        <input type="submit" name="Search" value="Search">
      </div>

      <?php
        if(isset($_POST['Search']))
        {
          $query="SELECT * FROM `visitors` WHERE Mobile_Number=".$_POST['cno'].";";
  
          if($result=mysqli_query($con,$query))
          {
            if(mysqli_num_rows($result)>0)
            {
              $row=mysqli_fetch_assoc($result);
              echo "
                <div class='field'>
                  <input type='text' value='".$row['Name']."' name='name' required>
                <label>Name</label>
                </div>
                <div class='field'>
                  <input type='text' value='".$row['Company_Name']."' name='cname' required>
                <label>Company Name</label>
                </div>
                <div class='field'>
                  <label>Company Type</label>
                </div>
                <div style='margin-left: 10%;'> 
              ";

              if($row['Company_Type']=="Sole Proprieter")
              {
                echo"<input type='radio' name='ctype' value='Sole Proprieter' checked>Sole Proprieter<br>";
                echo"<input type='radio' name='ctype' value='Partnership' >Partnership<br>";
                echo"<input type='radio' name='ctype' value='Employee' >Employee<br>";
              }
              if($row['Company_Type']=="Partnership")
              {
                echo"<input type='radio' name='ctype' value='Sole Proprieter' >Sole Proprieter<br>";
                echo"<input type='radio' name='ctype' value='Partnership' checked>Partnership<br>";
                echo"<input type='radio' name='ctype' value='Employee' >Employee<br>";
              }
              if($row['Company_Type']=="Employee")
              {
                echo"<input type='radio' name='ctype' value='Sole Proprieter' >Sole Proprieter<br>";
                echo"<input type='radio' name='ctype' value='Partnership' >Partnership<br>";
                echo"<input type='radio' name='ctype' value='Employee' checked>Employee<br>";
              }

              echo"</div>
                <div class='field'>
                  <input type='text' name='city' value='".$row['City']."' required>
                  <label>City</label>
                </div>
                <div class='field'>
                  <input type='number' name='pincode' value='".$row['Pincode']."'minlength='6' maxlength='6' required>
                  <label>Pincode</label>
                </div>
                <div class='field'>
                  <input type='email' name='email' value='".$row['Email']."' required>
                  <label>Email</label>
                </div>
          
                <div class='field'>
                  <label>Status</label>
                </div>
                <div style='margin-left: 10%;'>
              ";

              if($row['Status']=="Attended")
              {
                   echo "<input type='radio' name='status' id='Attended' value='Attended' checked required> <label for='Attended'> Attended </label> <br>";
                  echo "<input type='radio' name='status' id='not' value='Not Attended' required> <label for='not'> Not Attended </label> <br>";
              }
              if($row['Status']=="Not Attended")
              {
                 echo "<input type='radio' name='status' id='Attended' value='Attended' required> <label for='Attended'> Attended </label> <br>";
                  echo "<input type='radio' name='status' id='not' value='Not Attended' checked required> <label for='not'> Not Attended </label> <br>";
              }

              echo "</div>
              <div class='field'>
                <input type='submit' name='update' value='Submit'>
            </div>";
            }
            else{
              echo "
                <div class='field'>
                  <input type='text' name='name' required>
                <label>Name</label>
                </div>
                <div class='field'>
                  <input type='text' name='cname' required>
                <label>Company Name</label>
                </div>
                <div class='field'>
                  <label>Company Type</label>
                </div>
                <div style='margin-left: 10%;'> 
              ";

                echo"<input type='radio' name='ctype' value='Sole Proprieter' required>Sole Proprieter<br>";
                echo"<input type='radio' name='ctype' value='Partnership' required>Partnership<br>";
                echo"<input type='radio' name='ctype' value='Employee' required>Employee<br>";
              
              echo"</div>
                <div class='field'>
                  <input type='text' name='city'  required>
                  <label>City</label>
                </div>
                <div class='field'>
                  <input type='number' name='pincode' minlength='6' maxlength='6' required>
                  <label>Pincode</label>
                </div>
                <div class='field'>
                  <input type='email' name='email' required>
                  <label>Email</label>
                </div>
          
                <div class='field'>
                  <label>Status</label>
                </div>
                <div style='margin-left: 10%;'>
              ";

                  echo "<input type='radio' name='status' id='Attended' value='Attended' required> <label for='Attended'> Attended </label> <br>";
                  echo "<input type='radio' name='status' id='not' value='Not Attended' required> <label for='not'> Not Attended </label> <br>";
                  echo "</div>
                  <div class='field'>
                    <input type='submit' name='insert' value='Submit'>
                </div>";
            }
          }
        }
              if(isset($_POST['update']))
              {
                
                  $query="UPDATE `visitors` SET `Name`='".$_POST['name']."',`Mobile_Number`=".$_POST['cno'].",`Company_Name`='".$_POST['cname']."',`Company_Type`='".$_POST['ctype']."',`City`='".$_POST['city']."',`Pincode`=".$_POST['pincode'].",`Email`='".$_POST['email']."',`Status`='".$_POST['status']."' WHERE `Mobile_Number`=".$cno.";";

                  if($result=mysqli_query($con,$query))
                  {
                    echo "<div class='field'><label>Updated</label></div>";
                  }
                  else
                  {
                    echo "<div class='field'><label>Error</label></div>";
                  }
                }
                if(isset($_POST['insert']))
                {
                  date_default_timezone_set('Asia/Kolkata');
                  $date=date('m/d/Y H:i:s');

                  $query="INSERT INTO `visitors`(`Timestamp`, `Name`, `Mobile_Number`, `Company_Name`, `Company_Type`, `City`, `Pincode`, `Email`, `Status`) VALUES ('".$date."','".$_POST['name']."',".$_POST['cno'].",'".$_POST['cname']."','".$_POST['ctype']."','".$_POST['city']."',".$_POST['pincode'].",'".$_POST['email']."','".$_POST['status']."');";

                  if($result=mysqli_query($con,$query))
                  {
                    echo "<div class='field'><label>Inserted</label></div>";
                  }
                  else
                  {
                    echo "<div class='field'><label>Error</label></div>";
                    echo mysqli_error($con);
                  }
                }
                
              ?>
      <!-- <div class="field">
        <input type="text" name="cname" required>
        <label>Company Name</label>
      </div>
      <div class="field">
        <label>Company Type</label>
      </div>
      <div style="margin-left: 10%;">
        <input type="radio" name="ctype" value="Sole Proprieter" required>Sole Proprieter<br>
        <input type="radio" name="ctype" value="Partnership" required>Partnership<br>
        <input type="radio" name="ctype" value="Employee" required>Employee<br>
      </div>
      <div class="field">
        <input type="text" name="city" required>
        <label>City</label>
      </div>
      <div class="field">
        <input type="number" name="pincode" minlength="6" maxlength="6" required>
        <label>Pincode</label>
      </div>
      <div class="field">
        <input type="email" name="email" required>
        <label>Email</label>
      </div>

      <div class="field">
        <label>Status</label>
      </div>
      <div style="margin-left: 10%;">
        <input type="radio" name="status" value="Visited" required>Visited<br>
        <input type="radio" name="status" value="Not Visited" required>Not Visited<br><br>
      </div>
      <div class="field">
        <input type="submit" value="Submit">
      </div> -->
      
    </form>
  </div>
</body>

</html>