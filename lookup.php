
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Student Record Lists</title>
        <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h3> Student Records </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Registration Date</th>
                    </tr>
                </thead>
            
        </div>
    </body>
<?php 
        $mysqli= new mysqli('localhost','root', '', 'it15_database') or die('Cannot connect to datebase');
        $search = $_POST['search'];


        if($_POST['submit']){
            $result = $mysqli->query("SELECT * FROM users_tbl WHERE firstname LIKE '%".$search."%'") or die($mysqli->error);
            if(isset($search)){
                
                while ($row = $result -> FETCH_ASSOC()){?>
                  <tr> 
                    <td><?php echo $row['firstname'] ?> </td>
                    <td><?php echo $row['lastname'] ?> </td>
                    <td><?php echo $row['gender'] ?> </td>
                    <td><?php echo $row['email'] ?> </td>
                    <td><?php echo $row['birthdate'] ?> </td>
                    <td><?php echo $row['address'] ?> </td>
                    <td><?php echo $row['regs_date'] ?> </td>
                </tr>   
                
    <?php
                }
              }}else if(isset($_POST['back'])){
                header('Location:search.php');
            }
    ?><a class = "btn btn-info" href="search.php">Back
        <a class = "btn btn-info" href="view.php">Edit
        </table>
    </html>