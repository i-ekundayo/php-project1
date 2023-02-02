<?php include 'inc/header.php'; ?>

<?php
    // Getting the id from the url and selecting all elements with the id
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $query = $conn->query("SELECT * FROM profile WHERE id = '$id'");
    
        $user = $query->fetch_assoc();
    }
?>

<?php

    if(isset($_POST['submit'])) {
        
        $id= $_POST['id'];

        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $middlename = filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $lga = filter_input(INPUT_POST, 'lga', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $institution = filter_input(INPUT_POST, 'institution', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $field = filter_input(INPUT_POST, 'field', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);

        // Update the database
        $sql = $conn->query("UPDATE profile SET surname='$surname',firstname='$firstname',middlename='$middlename',email='$email',gender='$gender',lga='$lga',state='$state',dob='$dob',institution='$institution',field='$field',level='$level',phonenumber='$phonenumber' WHERE id='$id'") or die($conn->error);
   
        header('Location: data.php');  
    }
?>
    <div class="main">
        <img src="logo.svg" alt="logoIcon">
    </div>
    <br>

    <!-- Creating the form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="surname">Surname</label>
        <input type="text" name="surname" value="<?= $user['surname']?>" placeholder="Enter your surname" required>
        
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="<?= $user['firstname']?>" placeholder="Enter your first name" required>
        
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" value="<?= $user['middlename']?>" placeholder="Enter your middle name" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $user['email']?>" placeholder="Enter your email" required>
        
        <label for="gender">Gender</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>
        
        <label for="lga">L.G.A</label>
        <input type="text" name="lga" value="<?= $user['lga']?>" placeholder="Enter your local government" required>

        <label for="state">State of origin</label>
        <select name="state">
        <option value="Abia">Abia</option>
            <option value="Adamawa">Adamawa</option>
            <option value="Akwa ibom">Akwa Ibom</option>
            <option value="Anambra">Anambra</option>
            <option value="Bauchi">Bauchi</option>
            <option value="Bayelsa">Bayelsa</option>
            <option value="Benue">Benue</option>
            <option value="Borno">Borno</option>
            <option value="Cross river">Cross River</option>
            <option value="Delta">Delta</option>
            <option value="Ebonyi">Ebonyi</option>
            <option value="Edo">Edo</option>
            <option value="Ekiti">Ekiti</option>
            <option value="Enugu">Enugu</option>
            <option value="Gombe">Gombe</option>
            <option value="Imo">Imo</option>
            <option value="Jigawa">Jigawa</option>
            <option value="Kaduna">Kaduna</option>
            <option value="ano">Kano</option>
            <option value="Katsina">Katsina</option>
            <option value="Kebbi">Kebbi</option>
            <option value="Kogi">Kogi</option>
            <option value="Kwara">Kwara</option>
            <option value="Lagos">Lagos</option>
            <option value="Nasarawa">Nasarawa</option>
            <option value="Niger">Niger</option>
            <option value="Ogun">Ogun</option>
            <option value="Ondo">Ondo</option>
            <option value="Osun">Osun</option>
            <option value="Oyo">Oyo</option>
            <option value="Plateau">Plateau</option>
            <option value="Rivers">Rivers</option>
            <option value="Sokoto">Sokoto</option>
            <option value="Taraba">Taraba</option>
            <option value="Yobe">Yobe</option>
            <option value="Zamfara">Zamfara</option>
            <option value="FCT">FCT</option>
        </select>

        <label for="dob">D.O.B</label>
        <input type="date" name="dob" value="<?= $user['dob']?>" required> 

        <label for="institution">Institution</label>
        <input type="text" name="institution" value="<?= $user['institution']?>" placeholder="Enter the name of your school" required>
        
        <label for="field">Field</label>
        <select name="field">
            <option value="Frontend">Frontend Development</option>
            <option value="Backend">Backend Development</option>
            <option value="Fullstack">Fullstack Development</option>
            <option value="Game dev">Game development</option>
            <option value="Pentesting">Pentesting</option>
            <option value="Others">Others</option>
        </select>
        
        <label for="level">Level</label>
        <select name="level">
            <option value="ND1">ND1</option>
            <option value="ND2">ND2</option>
            <option value="HND1">HND1</option>
            <option value="HND2">HND2</option>
            <option value="100L">100L</option>
            <option value="200L">200L</option>
            <option value="300L">300L</option>
            <option value="400L">400L</option>
            <option value="500L">500L</option>
        </select>
        
        <label for="phonenumber">Phone Number</label>
        <input type="tel" name="phonenumber" value="<?= $user['phonenumber']?>" placeholder="Enter your phone number" required>


        <input type="hidden" name="id" value="<?= $_GET['edit'] ?>"> <!-- Storing the id in a hidden input -->

        <input type="submit" name="submit" value="Update">
    </form>

    
    <style>
        input[type='submit']:hover{
            background-color: red;
            cursor: pointer;
        }
    </style>

<?php include 'inc/footer.php'; ?>