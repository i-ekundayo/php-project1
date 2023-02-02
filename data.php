<!-- Including the header file -->
<?php include 'inc/header.php'; ?>

<!-- Fetch all data from the database -->
<?php 
    $sql = 'SELECT * FROM profile';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

    <div class="main">
        <img src="logo.svg" alt="logoIcon">
    </div>
    <br>

    <h2>Student Data</h2>
    <br>

    <?php if(empty($feedback)): ?>
        <p style>There is no student's data</p>
    <?php endif; ?> 

    <!-- Creating a table for the data -->
    <table style="width:100%; border:2px solid black; margin-bottom:5px">
        <thead>
            <tr>
                <th></th>
                <th>Surname</th>
                <th>First Name</th>
                <th>Email</th>
                <th>D.O.B</th>
                <th>Institution</th>
                <th>Field</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($feedback as $item): ?>
                <tr>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post"><button name="delete" style="background-color:black; color:white; width:fit-content; margin-top: 1px; margin-right: 10px; margin-left:-10px;" value="<?php echo $item['id']; ?>">Delete</button>
                        </form>
                    </td>
                    <td><?php echo $item['surname'];?></td>
                    <td><?php echo $item['firstname'];?></td>
                    <td><?php echo $item['email'];?></td>
                    <td><?php echo $item['dob'];?></td>
                    <td><?php echo $item['institution'];?></td>
                    <td><?php echo $item['field'];?></td>
                    <td><a href="profile.php?id=<?= $item['id']; ?>">
                        <button name="button" style="background-color:black; color:white;" id="<?php echo $item['id']; ?>">View Full Profile</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <style>
        button:hover{
            cursor: pointer; 
        }

        table, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    
    <br>
    <br>

    <?php 
        if(isset($_POST['delete'])) {
            // Deleting a data
            $id = $_POST['delete'];
            $delete = $conn->query("DELETE FROM profile WHERE id='$id'");

            header('Location: data.php');   
        }
    ?>

<script src="data.js"></script>   
<?php include 'inc/footer.php'; ?>
