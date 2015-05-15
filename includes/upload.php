<?php
    function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };

    if (isset($_POST['submit-upload'])) {
        // New database connection
        $dbh = new PDO("mysql:host=$hostname; dbname=mlant_GT", $username, $password);
        $user_check = $_SESSION['login_session'];
        $fileName = before('@', $_SESSION['login_session']);

        $target_dir = "img/profile/";
        $imageFileType = pathinfo($target_dir . basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);
        $target_file = $target_dir . $fileName . '.' . $imageFileType;
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
         $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
                $uploadOk = 1;
        } else {
                $uploadOk = 0;
                exit("That's not an image! <br>");
        }
        // Check file size
        if ($_FILES["image"]["size"] > 3000000) {
            $uploadOk = 0;
            exit("Sorry, that image file is too large. <br>");
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
            exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>");
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            exit("Sorry, your image file was not uploaded. <br>");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded. <br>";
            } else {
                echo "Sorry, there was an error uploading your image file. <br>";
            }
        }

        try {
            $stmt = $dbh->prepare("UPDATE account SET picture = :picture WHERE email = '$user_check'");
            $stmt->bindParam(':picture', $target_file, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            
        }
    }
?>

