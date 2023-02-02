<!-- Including the header file -->
<?php include 'inc/header.php'; ?>

<div class="main">
    <img src="logo.svg" alt="logoIcon">
</div>
<br>

<h2>Student Profile</h2>

<!-- Getting the id from the url and selecting all elements with the id -->
<?php
    $id = $_GET['id'];
    $sql = $conn->query("SELECT * FROM profile WHERE id = $id");

    $prog = $sql->fetch_assoc();
?>

<h3><?='Surname: ' . $prog['surname'] ?></h3>
<h3><?='First Name: ' . $prog['firstname'] ?></h3>
<h3><?='Middle Name: ' . $prog['middlename'] ?></h3>
<h3><?='Email: ' . $prog['email'] ?></h3>
<h3><?='Gender: ' . $prog['gender'] ?></h3>
<h3><?='L.G.A: ' . $prog['lga'] ?></h3>
<h3><?='State of Origin: ' . $prog['state'] ?></h3>
<h3><?='D.O.B: ' . $prog['dob'] ?></h3>
<h3><?='Institution: ' . $prog['institution'] ?></h3>
<h3><?='Field: ' . $prog['field'] ?></h3>
<h3><?='Phone Number: ' . $prog['phonenumber'] ?></h3>
<h3><?='Date Created: ' . $prog['created'] ?></h3>
<h3><?='Last Updated: ' . $prog['updated'] ?></h3>

<!-- Passing the id of the selected button to the edit page url -->
<a href="edit.php?edit=<?php echo $id; ?>"><button style="padding:5px; font-size:20px">Edit</button></a>

<style>
    h3{
        text-align: left;
        margin-left: 20px;
    }
    button:hover{
        background-color: red;
        cursor: pointer;
    }
</style>

<!-- Including the footer file -->
<?php include 'inc/footer.php'; ?>