<?php 

    $errorMsg = array ('phone'=>'', 'ssn'=>'',);
    $recordAdded ='';

    if(isset($_POST['submit'])){


        $firstname =  $_POST['fname'];
        $middlename = $_POST['mi'];
        $lastname  = $_POST['lname'];
        $gender = $_POST['gender'];
        $maritalStatus = $_POST['maritalStatus'];
        $phone = $_POST['phone'];
        $email =  $_POST['email'];
        $dob = $_POST['dob'];
        $ssn = $_POST['ssn'];
        $id = $_POST['idNum'];
        $state = $_POST['state'];
        $expDate =  $_POST['expDate'];

   

    $phoneFormat = "/^[(][0-9]{3}[)][\s]{0,1}[0-9]{3}[-][0-9]{4}$/";
    $ssnFormat = "/^[0-9]{3}[-][0-9]{2}[-][0-9]{4}$/";
     if (!preg_match($phoneFormat,$phone)) {
        $errorMsg['phone'] = "Phone Number format should be (000)000-0000";
    }

    if (!preg_match($ssnFormat,$ssn)) {
        $errorMsg['ssn'] = "SSN format should be ***-**-****"; 
    }



    if(!array_filter($errorMsg)){
        $servername = "losserver.cg3c0d96kv0z.us-west-2.rds.amazonaws.com";
        $username = "admin";
        $password = "password";
        $dbname = "LOS";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);

        }

        
        $sql = "insert into PersonalInfo (FirstName, MiddleInitial, LastName, Gender, MaritalStatus, PhoneNum, Email, DOB, SSN, IdNum, State, ExpirationDate) 
            values ('$firstname', '$middlename', '$lastname', '$gender', '$maritalStatus', '$phone', '$email', '$dob', '$ssn', '$id', '$state', '$expDate')"; 

            
        
        if ($conn->query($sql) === TRUE) {
          $recordAdded = "The record is added";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        }
}


    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Personal Info</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css">
        
    </head>
    
    <body>
        <div class="container">
        <div>
            <img src = "images/otrl.jpeg" id="otrlImg"> </img>
            <h1>Personal Information</h1>
        </div>
        <div>
             <form class="form" action="index.php" method="post">

            <div class="form-content">
                <label class='req'>First name:  </label>
                <input type="text" placeholder="John" name="fname" value="" required>
                <br>
            </div>

            <div class="form-content">
                <label>MI:</label>
                <input type="text" name="mi" value="" >
                <br>
            </div> 

            <div class="form-content">
                <label class='req'>Last name:</label>
                <input type="text" name="lname" placeholder="Doe" value="" required>
                <br>
            </div>  

            <div class="form-content">
                <label class='req'for="gender">Gender:</label>
                <select name="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>
                <br>
            </div>

            <div class="form-content">
                <label class='req' for="maritalStatus">Marital Status:</label>
                <select name="maritalStatus" name="maritalStatus" required>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>
                <br>
            </div>

            <div class="form-content">
                <label class='req'>Phone Number:</label>
                <input type="text" name="phone" placeholder="(000)000-0000" value="" required><br>
                <small style = "color: red"> <?php echo $errorMsg['phone'] ?></small>

                <br>
            </div>

            <div class="form-content">
                <label class= 'req'>Email:</label>
                <input type="email" name="email" placeholder="johndoe@gmail.com" value="" required>
                <br>
            </div>

            <div class="form-content">
                <label class='req'>Date of Birth:</label>
                <input type="date" name="dob" required>
                <br>
            </div>

            <div class="form-content">
                <label class='req'>SSN:</label>
                <input type="text" name="ssn" placeholder="***-**-****" value="" required><br>
                <small style = "color: red"> <?php echo $errorMsg['ssn'] ?></small>
                <br>
            </div>

            <div class="form-content">
                <label class='req'>Driver license/ Govt. Id #:</label>
                <input type="text" name="idNum" value="" required>
                <br>
            </div>

            <div class="form-content">
                <label class='req' for="state">State:</label>
                <select name="state" name='state'>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>	                
                <br>
            </div>

            <div class="form-content">
                <label class='req'>Exp Date:</label>
                <input type="date" name="expDate" value="" required>
                <br>
            </div>
            <br>            
            <input type="submit"  name= "submit" id="submit" value="Submit">
            </form>
            <?php 
                    echo $recordAdded;
            ?>

        </div>
        </div>
    </body>  
</html>


