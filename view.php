<?php 
    require_once('connect.php');

    $query = "SELECT * from users_tbl";
    $result = $con-> query($query);
?>
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
                    <th>Action</th>
                </tr>
            </thead>
        
    </div>
</body>

    <?php 
        if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){ ?>
                <tr> 
                    <td><?php echo $row['firstname'] ?> </td>
                    <td><?php echo $row['lastname'] ?> </td>
                    <td><?php echo $row['gender'] ?> </td>
                    <td><?php echo $row['email'] ?> </td>
                    <td><?php echo $row['birthdate'] ?> </td>
                    <td><?php echo $row['address'] ?> </td>
                    <td><?php echo $row['regs_date'] ?> </td>
                    <td><a class = "btn btn-info" href="update.php?ID=<?php echo $row['ID'];?>">Update</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row ['ID'];?>">Delete</a></td>
                </tr>    
    <?php 
            }
        }
        
    ?><a class = "btn btn-info" href="search.php"><input type="submit" name ="submit" value="Back"/></a>
    </table>
</html>