<?php 
    session_start();

    $ses_id = $_SESSION['id'] ?? 0;
    if($ses_id){
        header("location:word.php");
        die();
    }

    include_once "function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


</head>

<body class="bg-light">
    <div class="container my-5 ">
        <h2 class="text-center mb-3">My Vocabulary</h2>
        <div class="link text-center text-primary mb-3">
        <a href="#" class="login">Login</a> || <a href="#" class="register">Register Account</a>
        </div>

        <div class="w-50 m-auto shadow-lg p-5 mb-5 bg-body rounded">
            <form action="tasks.php" method="POST">
                <h5 class="text-center login_active">Login</h5>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <br>
                <div class="form-group">
                    <p>
                        <?php 
                            $statusCode = $_GET['status'] ?? 0;
                            if($statusCode){
                                echo statusMassage($statusCode);
                            }
                            
                        ?>
                    </p>
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <input type="hidden" name="action" value="login" class="action_name">
                </div>

            </form>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>


</html>