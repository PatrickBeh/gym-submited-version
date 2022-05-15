<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }
    
    $id = $_GET['id'];
    $result = $func->listUserById($id);
    // Function to create User
    if(isset($_POST['edit_user'])){
        $func->editUser($_POST, $id);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User's Control</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_dashboard.css">
</head>
<body>
    <header>
        <div class="navbar__logo">
            <div class="logo">
                
                    <a href="#"><img src="../crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <div class="links">
                <ul>
                    <li class="item"><a href="../dashboard/dashboard_create_user.php">User Section</a></li>
                    <li class="item"><a href="../dashboard/dashboard_class.php">Class Section</a></li>
                    <li class="item"><a href="../dashboard/dashboard_exercise.php">Exercise Section</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="navbar__form">
            <a href="../functions/logout.php">Logout</a> 
        </div>
    </header>
    <main>
        <div class="main--wrapper">
            <!-- Create User Section -->
            <div class="form__section">
                <h2>Create a New User</h2>
                <form method="post">
                            
                    <div class="input">
                        <label for="first_name">Insert First Name:</label>
                        <input type="text" name="first_name" value="<?= $result['fname'];?>">
                    </div>
                    <div class="input">
                        <label for="last_name">Insert Last Name:</label>
                        <input type="text" name="last_name" value="<?= $result['lname'];?>">
                    </div>
                    <div class="input">
                        <label for="username">Create Username:</label>
                        <input type="text" name="username" value="<?= $result['username'];?>">                    </div>
                    <div class="input">
                        <label for="password">Create Password:</label>
                        <input type="text" name="password" value="<?= $result['password'];?>">
                    </div>
                    <div class="input">
                        <label for="email">Insert Email:</label>
                        <input type="text" name="email" value="<?= $result['email'];?>">
                    </div>
                    <div class="select">
                        <label for="user_type">Select User Type</label>
                        <select name="user_type">
                            <option value="<?= $result['user_type_id']?>"><?= $result['user_type_id']?></option>
                            <option value="admin">admin</option>
                            <option value="staff">staff</option>
                            <option value="client">client</option>
                            
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="edit_user">
                        <button type="submit">Save User</button>
                    </div>
                    <div class="button">
                        <a href="delete.php?id=<?= $result['id'];?>">Delete User</a>
                    </div>
                    
                </form> 
            </div>
        </div>
    </main>
</body>
</html>
