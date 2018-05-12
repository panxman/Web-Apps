<?php

    session_start();
    
    $error = "";

    if (array_key_exists("id", $_SESSION) AND $_SESSION['id'] ) {
        
        header("Location: loggedinpage.php");
        
    }

    if (array_key_exists("submit", $_POST)){
        
        include("connection.php");

        if (!$_POST['email']){
            $error .= "An email address is required<br>";
        }
        if (!$_POST['password']){
            $error .= "A password is required<br>";
        }

        if ($error != ""){
            $error = "<p>There were errors in your form: </p>".$error;
        } else {
            
            if ($_POST['signUp'] == '1') {
            
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {

                    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".password_hash($_POST['password'], PASSWORD_DEFAULT)."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            //there were cookies here in the past... fuck cookies!

                        } 

                        header("Location: loggedinpage.php");

                    }

                } 
                
            } else {
                    
                    $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);

                
                    if (isset($row)) {
                        
                    
                        if (password_verify($_POST['password'], $row['password'])) {
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                //there were cookies here in the past... fuck cookies!

                            } 

                            header("Location: loggedinpage.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
                }
            
        }
    }

?>

<?php include("header.php"); ?>
  
    
    <div class="container" id="homePageContainer">
        <h1>Secret Diary</h1>
        <p><strong>Store your thoughts permanently and securely!</strong></p>

        <div id="error"><?php if($error != ""){
            echo '<div class="alert alert-danger" role="alert">
            '.$error.'
            </div>';
        } ?></div>

        <form method="post" id="signUpForm">
            <p>Interested? Sign Up now!</p>
            <fieldset class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email">
            </fieldset>
            <fieldset class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </fieldset>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stayLoggedIn" value=1> Stay logged in
                </label>
            </div>
            
            <fieldset class="form-group">
                <input type="hidden" name="signUp" value=1>
                <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
            </fieldset>
            <p><a href="#" class="toggleForms">Log In</a></p>           
        </form>
        <form method="post" id="logInForm">
            <p>Log In using your username and password.</p>
            <fieldset class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email">
            </fieldset>
            <fieldset class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </fieldset>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stayLoggedIn" value=0> Stay logged in
                </label>
            </div>
        
            <fieldset class="form-group">
                <input type="hidden" name="signUp" value=0>
                <input class="btn btn-success" type="submit" name="submit" value="Sign In!">
            </fieldset> 
            <p><a href="#" class="toggleForms">Sign Up</a></p>      
        </form>
        
    </div>


        
    <?php include("footer.php"); ?>