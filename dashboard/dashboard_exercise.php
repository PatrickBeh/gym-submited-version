<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }
    
    // Function to create User
    if(isset($_POST['exercise_registration'])){
        $func->createExercise($_POST);
    }
    if(isset($_POST['exercise_to_client_registration'])){
        $func->createExerciseToClient($_POST);
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
                        <a href="../functions/logout.php">Logout</a>
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
                <h2>Create Exercise</h2>
                <div class="form__section__wrapper">
                    <form method="post">
                        <div class="input">
                            <label for="exercise_name">Insert Exercise Name:</label>
                            <input type="text" name="exercise_name">
                        </div>
                        <div class="input">
                            <label for="equip_name">Insert Equipment Name:</label>
                            <input type="text" name="equip_name">
                        </div>
                        <div class="input">
                            <label for="sets">Insert Sets:</label>
                            <input type="text" name="sets">
                        </div>
                        <div class="input">
                            <label for="reps">Insert Reps:</label>
                            <input type="text" name="reps">
                        </div>
                        <div class="button">
                            <input type="hidden" name="exercise_registration">
                            <button type="submit">Create Exercise</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="list__section">
                <h2>Exercises</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                    <?php
                        $list = $func->listExercise();
                        if($list):
                            foreach($list as $row):
                        ?>
                        <h3><?= $row['exercise_name']?></h3>
                        <h3><?= $row['equipment_name']?></h3>
                        <h4><?= $row['sets'].' of '.$row['reps'];?></h4>
                        <div class="edit__button">
                            <a href="../functions/edit_exercise.php?id=<?php echo $row['id']?>">
                                <button type="submit">Edit</button>
                            </a>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                        
                    </div>
                </div>
            </div>
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
                            <option value="<?= $row['id'];?>"><?= $row['fname'].' '.$row['lname'];?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                            </select>
                        </div>
                        <div class="select">
                            <label for="exercise">Select Exercise:</label>
                            <select name="exercise">
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
                            <input type="hidden" name="exercise_to_client_registration">
                            <button type="submit">Link Exercise to Client</button>
                        </div>
                    </form>
            </div>
            <div class="list__section">
                <h2>Exercise To Client</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php
                        $list = $func->listExerciseToClient();
                        if($list):
                            foreach($list as $row):
                        ?>
                        <h2><?= $row['fname'].' '.$row['lname'];?></h2>
                        <h3><?= $row['exercise_name'];?></h3>
                        <h3><?= $row['equipment_name'];?></h3>
                        <h4><?= $row['sets'].' sets of '.$row['reps'];?></h4>
                        <div class="edit__button">
                            <a href="../functions/edit_exercise_to_client.php?id=<?php echo $row['id']?>">
                                <button type="submit">Edit</button>
                            </a>
                        </div>
                        <hr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>