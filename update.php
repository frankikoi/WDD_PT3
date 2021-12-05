
<?php 
    require_once('connect.php');

    if (isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $ID = $_GET['ID'];

        $query = "UPDATE users_tbl SET firstname = '$firstname', lastname = '$lastname', gender='$gender', birthdate='$birthdate', email = '$email',  address ='$address' WHERE ID ='$ID'";
    
        $res = $con -> query($query);

        if($res == TRUE){
            echo"<script> alert(Record succesfully updated)</script>";
            //header('Location: view.php');
            include('view.php');
            exit();
        }else{
            echo"<script> alert(Error Updating...)</script>".$con-> error;
        }
    }else if(isset($_POST['cancel'])){
        header('Location:view.php');
    }

        if(isset($_GET['ID'])){
            $ID = $_GET['ID'];

            $q = "SELECT * FROM users_tbl WHERE ID ='$ID'";
            $result = $con -> query($q);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $birthdate = $row['birthdate'];
                    $address = $row['address'];
                }             
                ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

                    </head>
                    <body>
                        <div class = "container">
                            <h3> Update Student Record</h3>
                            <form action = "" method = "post">
                                <fieldset class = "container">
                                    <legend>Student information:</legend>
                                    First Name: <input type="text" name="firstname" value = "<?php echo $firstname?>"></br>
                                    Last Name: <input type="text" name="lastname" value = "<?php echo $lastname?>"></br>
                                    Gender: <input type="radio" name="gender" value = "Male"<?php if ($gender=='Male'){echo"checked";}?>> Male &nbsp
                                            <input type="radio" name="gender" value = "Female"<?php if ($gender=='Female'){echo"checked";}?>> Female </br>
                                    Email: <input type="text" name="email" value = "<?php echo $email?>"></br>
                                    Date of Birth: <input type="date" name="birthdate" value = "<?php echo $birthdate?>"></br>
                                    Address <input type="text" name="address" value = "<?php echo $address?>"></br></br>
                            <input type="submit" value="Update" name = "update">
                            <input type="submit" value="Cancel" name = "cancel" href ="view.php">

                        </fieldset>
                    </form>
                    </div>
                </body>
                </html>
            
    <?php
        }
        else{
            header('Location: view.php');
        }
    }
?> 
