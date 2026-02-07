<!-- 3rd Question -->
 <!-- 3. An organization wants to develop an online Employee Registration System to store employee details securely. As a web developer, design and implement a PHP-based registration form for employees. The form should collect the following details: Name, PAN Number, and Mobile Number.
Validate the form data on the server side using PHP with the following constraints:
•	Name → Should contain only alphabets
•	PAN Number → Must follow valid Indian PAN format(ABCDE1234F)
•	Password → Must contain a minimum of 6 characters
•	Mobile Number → Must contain exactly 10 digits
Display appropriate error messages for invalid inputs and show a success message after successful registration -->

<?php
$name = $pan = $password = $mobile = "";
$nameErr = $panErr = $passwordErr = $mobileErr = $successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $pan = trim($_POST["pan"]);
    $password = trim($_POST["password"]);
    $mobile = trim($_POST["mobile"]);

    if (empty($name)) {
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $nameErr = "Name should contain only alphabets and spaces";
    }

    if (empty($pan)) {
        $panErr = "PAN Number is required";
    } elseif (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $pan)) {
        $panErr = "Invalid PAN format. Example: ABCDE1234F";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    } elseif (strlen($password) < 6) {
        $passwordErr = "Password must be at least 6 characters long";
    }

    if (empty($mobile)) {
        $mobileErr = "Mobile Number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileErr = "Mobile Number must contain exactly 10 digits";
    }

    if (empty($nameErr) && empty($panErr) && empty($passwordErr) && empty($mobileErr)) {
        $successMsg = "Employee registered successfully!";
        $name = $pan = $password = $mobile = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Employee Registration</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your full name"
                                class="form-control <?php echo (!empty($nameErr)) ? 'is-invalid' : ''; ?>" 
                                value="<?php echo htmlspecialchars($name); ?>">
                            <div class="invalid-feedback"><?php echo $nameErr; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="pan" class="form-label">PAN Number</label>
                            <input type="text" name="pan" id="pan" placeholder="Enter PAN Number"
                                class="form-control <?php echo (!empty($panErr)) ? 'is-invalid' : ''; ?>" 
                                value="<?php echo htmlspecialchars($pan); ?>">
                            <div class="invalid-feedback"><?php echo $panErr; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password"
                                class="form-control <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" 
                                value="">
                            <div class="invalid-feedback"><?php echo $passwordErr; ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" name="mobile" id="mobile" placeholder="Enter mobile number"
                                class="form-control <?php echo (!empty($mobileErr)) ? 'is-invalid' : ''; ?>" 
                                value="<?php echo htmlspecialchars($mobile); ?>">
                            <div class="invalid-feedback"><?php echo $mobileErr; ?></div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        <?php if($successMsg != ""): ?>
                            <div class="alert alert-success mt-3"><?php echo $successMsg; ?></div>
                        <?php endif; ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
