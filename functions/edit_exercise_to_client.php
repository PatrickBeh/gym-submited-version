<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }
    
    $id = $_GET['id'];
    $result = $func->listExerciseToClientById($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Exercise</title>
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
                    <li class="item"><a href="dashboard_create_user.php">User Section</a></li>
                    <li class="item"><a href="dashboard_class.php">Class Section</a></li>
                    <li class="item"><a href="#">Exercise Section</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="navbar__form">
            <a href="../functions/logout.php">Logout</a> 
        </div>
    </header>
    <main>
        <div class="main--wrapper">
            <div class="form__section">
                <h2>Link Exercise to Client</h2>
                    <form method="post">
                        <div class="select">
                            <label for="client">Select Client:</label>
                            <select name="client">
                                <?php
                            $list = $func->listClient();
                            if($list):
                                foreach($list as $row):

                                    ?>
                            <option <?= ($result['user_id'] == $row['id']) ? "selected": "" ?> value="<?= $row['id'];?>"><?= $row['fname'].' '.$row['lname'];?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select>
                        </div>
                        <div class="select">
                            <label for="exercise">Select Exercise:</label>
                            <select name="exercise">
                                <option value="<?= $result['exercise_name']?>"><?= $result['exercise_name']?></option>
                            <?php
                            $list = $func->listExercise();
                            if($list):
                                foreach($list as $row):
                                    ?>
                            <option value="<?= $row['id'];?>"><?= $row['exercise_name'].' '.$row['sets'].' of '.$row['reps'];?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select>
                        </div>
                        <div class="button">
                            <a href="delete_exercise_to_client.php?id=<?= $id;?>">Delete Exercise</a>
                        </div>
                    </form>
            </div>
        </div>
    </main>
</body>
</html>