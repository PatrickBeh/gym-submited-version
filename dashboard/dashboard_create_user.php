<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }

    // Function to create User
    if(isset($_POST['user_registration'])){
        $func->createUser($_POST);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Create User</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_dashboard.css">
</head>
<body>
    <header>
        <div class="navbar__logo">
            <div class="logo">
                
                    <a href="../index.php"><img src="../crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <div class="links">
                <ul>
                    <li class="item"><a href="#">User Section</a></li>
                    <li class="item"><a href="dashboard_class.php">Class Section</a></li>
                    <li class="item"><a href="dashboard_exercise.php">Exercise Section</a></li>
                    
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
                        <input type="text" name="first_name">
                    </div>
                    <div class="input">
                        <label for="last_name">Insert Last Name:</label>
                        <input type="text" name="last_name">
                    </div>
                    <div class="input">
                        <label for="username">Create Username:</label>
                        <input type="text" name="username">
                    </div>
                    <div class="input">
                        <label for="password">Create Password:</label>
                        <input type="password" name="password">
                    </div>
                    <div class="input">
                        <label for="email">Insert Email:</label>
                        <input type="text" name="email">
                    </div>
                    <div class="select">
                        <label for="user_type">Select User Type</label>
                        <select name="user_type">
                            <option value="admin">admin</option>
                            <option value="staff">staff</option>
                            <option value="client">client</option>
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="user_registration">
                        <button type="submit">Register New User</button>
                    </div>
                </form> 
            </div>
            <div class="list__section">
                <h2>Our Staff</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php
                        $list = $func->listUser();
                        if($list):
                            foreach($list as $row):
                                if($row['user_type_id'] != 'staff'){
                                    continue;
                                }
                                ?>
                        <h3><?= $row['fname'].' '.$row['lname'];?></h3>
                        <h4><?= $row['user_type_id'];?></h4>
                        <div class="edit__button">
                            <a href="../functions/edit_user.php?id=<?php echo $row['id']?>">
                                <button type="submit">Edit</button>
                            </a>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                        
                    </div>
                </div>
            </div>
            <div class="list__section">
                <h2>Our Clients</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php
                        $list = $func->listUser();
                        if($list):
                            foreach($list as $row):
                                if($row['user_type_id'] != 'client'){
                                    continue;
                                }
                        ?>
                        <h3><?= $row['fname'].' '.$row['lname'];?></h3>
                        <h4><?= $row['user_type_id'];?></h4>
                        <div class="edit__button">
                            <a href="../functions/edit_user.php?id=<?php echo $row['id']?>">
                                <button type="submit">Edit</button>
                            </a>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>