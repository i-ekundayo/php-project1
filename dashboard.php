<!-- Including the header file -->
<?php include 'inc/header.php'; ?>


<?php

?>
<?php
    $surname = $firstname = $email = $gender = $state = $dob = $institution = $field = $level = $phonenumber = '';
    
    $surnameErr = $firstnameErr = $emailErr = $genderErr = $stateErr = $dobErr = $institutionErr = $fieldErr = $levelErr = $phonenumberErr = '';

    if(isset($_POST['submit'])) {
        // Validate surname
        if(empty($_POST['surname'])) {
            $surnameErr = 'Surname is required';
        } else {
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate firstname
        if(empty($_POST['firstname'])) {
            $firstnameErr = 'First Name is required';
        } else {
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate middlename
        $middlename = filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate email
        if(empty($_POST['email'])) {
            $emailErr = 'Email is required';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

        // Validate gender
        if(empty($_POST['gender'])) {
            $genderErr = 'Gender is required';
        } else {
            $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate lga
        $lga = filter_input(INPUT_POST, 'lga', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Validate state
        if(empty($_POST['state'])) {
           $stateErr = 'state of origin is required';
        } else {
            $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate date of birth
        if(empty($_POST['dob'])) {
            $dobErr = 'Date of birth is required';
        } else {
            $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate insititution
        if(empty($_POST['institution'])) {
            $institutionErr = 'Institution is required';
        } else {
            $institution = filter_input(INPUT_POST, 'institution', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate field
        if(empty($_POST['field'])) {
            $fieldErr = 'Field is required';
        } else {
            $field = filter_input(INPUT_POST, 'field', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate level
        if(empty($_POST['level'])) {
            $levelErr = 'Level is required';
        } else {
            $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validate phone number
        if(empty($_POST['phonenumber'])) {
            $phonenumberErr = 'Phone number is required';
        } else {
            $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_NUMBER_INT);
        }

        // Add to database
        if(empty($surnameErr) && empty($firstnameErr) && empty($emailErr) && empty($genderErr) && empty($lgaErr) && empty($stateErr) && empty($dobErr) && empty($institutionErr) && empty($fieldErr) && empty($levelErr) && empty($phonenumberErr)) {
            $sql = "INSERT INTO profile (surname, firstname, middlename, email, gender, lga, state, dob, institution, field, level,  phonenumber) VALUES ('$surname', '$firstname', '$middlename', '$email', '$gender', '$lga', '$state', '$dob', '$institution', '$field', '$level', '$phonenumber')";
            if(mysqli_query($conn, $sql)) {
                // Success
                header('Location: data.php');
            } else {
                // Error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
?>
    <div class="main">
        <img src="logo.svg" alt="logoIcon">
    </div>
    <br>
    <!-- Creating the form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Enter your surname">
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $surnameErr; ?>
        </div>
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" placeholder="Enter your first name">
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $firstnameErr; ?>
        </div>
        <label for="middlename">Middle Name</label>
        <input type="text" name="middlename" placeholder="Enter your middle name">

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $emailErr; ?>
        </div>
        <label for="gender">Gender</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $genderErr; ?>
        </div>
        <label for="lga">L.G.A</label>
        <input type="text" name="lga" placeholder="Enter your local government">

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
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $stateErr; ?>
        </div>

        <label for="dob">D.O.B</label>
        <input type="date" name="dob"> 
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $dobErr; ?>
        </div>

        <label for="institution">Institution</label>
        <input type="text" name="institution" placeholder="Enter the name of your school">
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $institutionErr; ?>
        </div>
        <label for="field">Field</label>
        <select name="field">
            <option value="Frontend">Frontend Development</option>
            <option value="Backend">Backend Development</option>
            <option value="Fullstack">Fullstack Development</option>
            <option value="Game dev">Game development</option>
            <option value="Pentesting">Pentesting</option>
            <option value="Others">Others</option>
        </select>
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $fieldErr; ?>
        </div>
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
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $levelErr; ?>
        </div>
        <label for="phonenumber">Phone Number</label>
        <input type="tel" name="phonenumber" placeholder="Enter your phone number">
        <div style="color:red; margin-top:-10px; text-align:left; margin-bottom: 10px">
            <?php echo $phonenumberErr; ?>
        </div>
        
        <input type="submit" name="submit" value="Sign Up">
    </form>

    <style>
        input[type='submit']:hover{
            background-color: red;
            cursor: pointer;
        }
    </style>

<!-- Including the footer file -->
<?php include 'inc/footer.php'; ?>