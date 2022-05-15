<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }
    
    $id = $_GET['id'];
    $result = $func->listExerciseById($id);
    if(isset($_POST['edit_exercise'])){
        $func->editExercise($_POST, $id);
    }
    if(isset($_POST['delete_exercise'])){
        $func->deleteExercise($_POST);
    }

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
            <div class="form__section">
                <h2>Create Exercise</h2>
                <div class="form__section__wrapper">
                    <form method="post">
                        <div class="input">
                            <label for="exercise_name">Insert Exercise Name:</label>
                            <input type="text" name="exercise_name" value="<?= $result['exercise_name'];?>">
                        </div>
                        <div class="input">
                            <label for="equip_name">Insert Equipment Name:</label>
                            <input type="text" name="equip_name" value="<?= $result['equipment_name'];?>">
                        </div>
                        <div class="input">
                            <label for="sets">Insert Sets:</label>
                            <input type="text" name="sets" value="<?= $result['sets'];?>">
                        </div>
                        <div class="input">
                            <label for="reps">Insert Reps:</label>
                            <input type="text" name="reps" value="<?= $result['reps'];?>">
                        </div>
                        <div class="button">
                            <input type="hidden" name="edit_exercise">
                            <button type="submit">Save Exercise</button>
                        </div>
                        <div class="button">
                            <a href="delete_exercise.php?id=<?= $result['id'];?>">Delete Exercise</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>