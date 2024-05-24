<?php
include "connect.php";
session_start();
$id = $_GET['editid'];
$sql = "SELECT * from c_table WHERE id =$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$fname = $row['fname'];
$phone = $row['phone'];
$dropdown = $row['dropdown'];
$email = $row['email'];
$address = $row['address'];
$gender = $row['gender'];
$file = $row['file'];

if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name_error = "Name is required !";
    }
    if (isset($_POST['fname']) && !empty($_POST['fname'])) {
        $fname = $_POST['fname'];
    } else {
        $fname_error = "Fathername is required !";
    }
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $phone_error = "Phone is required !";
    }
    if (isset($_POST['dropdown']) && !empty($_POST['dropdown']) && $_POST['dropdown'] != "") {
        $dropdown = $_POST['dropdown'];
    } else {
        $dropdown_error = "Country is required !";
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email_error = "Email is required !";
    }
    if (isset($_POST['address']) && !empty($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $address_error = "Address is required !";
    }
    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender_error = "Gender needed !";
    }
    if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $folder = 'files/' . $file;
    } else {
        $file_error = "Picture is required !";
    }
    if (
        !isset($name_error) && !isset($fname_error) && !isset($phone_error) && !isset($dropdown_error)
        && !isset($email_error) && !isset($address_error) && !isset($gender_error) && !isset($file_error)
    ) {
        if (strlen($name) <= 10) {
            if (strlen($fname) <= 10) {
                if (move_uploaded_file($tmp_name, $folder)) {
                    $sql = "UPDATE c_table SET id=$id , name='$name', fname='$fname', phone='$phone',
                    dropdown='$dropdown', email='$email', address='$address', gender='$gender', file='$file' WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $_SESSION['edit'] = true;
                        header("Location:index.php");
                        exit();
                    } else {
                        echo "not working";
                    }
                }
            } else {
                $fname_size_error = "Father Name should have less then 10 alphabets";
            }
        } else {
            $name_size_error = "Name should have less then 10 alphabets";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edir <?php echo $name ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card justify-content-center p-4">
            <h2>Edit <?php echo $name ?></h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                class="form-control <?= isset($name_error) || isset($name_size_error) ? 'red_border' : '' ?>"
                                id="name" name="name" placeholder="Enter your name" value="<?php echo $name ?>">
                            <p class="text-danger"><?= isset($name_error) ? $name_error : '' ?></p>
                            <p class="text-danger"><?= isset($name_size_error) ? $name_size_error : '' ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fatherName">Father's Name</label>
                            <input type="text"
                                class="form-control <?= isset($fname_error) || isset($fname_size_error) ? 'red_border' : '' ?>"
                                id="fatherName" name="fname" placeholder="Enter your father's name"
                                value="<?php echo $fname ?>">
                            <p class="text-danger"><?= isset($fname_error) ? $fname_error : '' ?></p>
                            <p class="text-danger"><?= isset($fname_size_error) ? $fname_size_error : '' ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control <?= isset($phone_error) ? 'red_border' : '' ?>"
                                id="phone" name="phone" placeholder="Enter your phone number"
                                value="<?php echo $phone ?>">
                            <p class="text-danger"><?= isset($phone_error) ? $phone_error : '' ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control <?= isset($dropdown_error) ? 'red_border' : '' ?>"
                                name="dropdown" id="country">
                                <option value="" selected>Select one...</option>
                                <option value="US">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="Australia">Australia</option>
                                <option value="PAK">Pakistan</option>
                            </select>
                            <p class="text-danger"><?= isset($dropdown_error) ? $dropdown_error : '' ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control <?= isset($email_error) ? 'red_border' : '' ?> "
                                name="email" id="email" placeholder="Enter your email" value="<?php echo $email ?>">
                            <p class="text-danger"><?= isset($email_error) ? $email_error : '' ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="file"
                                class="form-control-file <?= isset($file_error) ? 'red_border' : '' ?>" id="image">
                            <p class="text-danger"><?= isset($file_error) ? $file_error : '' ?></p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control <?= isset($address_error) ? 'red_border' : '' ?>" id="address"
                                rows="3" name="address" placeholder="Enter your address"
                                value=""><?php echo $address ?></textarea>
                            <p class="text-danger"><?= isset($address_error) ? $address_error : '' ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                            </div>
                            <p class="text-danger"><?= isset($gender_error) ? $gender_error : '' ?></p>
                        </div>

                    </div>

                </div>

                <button type="submit" name="submit">

                    Update

                </button>

            </form>
        </div>
    </div>
    </div>
</body>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>