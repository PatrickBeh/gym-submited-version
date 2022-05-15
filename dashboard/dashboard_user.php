<?php 
    ob_start();
    session_start();
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $id = $_SESSION['user_login'];
    $pdo;
    $func = new allFunctions();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client</title>
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
            
        </div>
        <div class="navbar__form">
            <a href="../functions/logout.php">Logout</a> 
        </div>
    </header>
    <main>
        <div class="main--wrapper">
            <div class="form__section">
                <div class="form__section__wrapper">
                    <form method="post">
                        
                        <div class="button">
                            
                        <a href="../functions/book_class.php?id=<?php echo $id?>">
                               Book a Class
                            </a>
                        </div>
                    </form>
                </div>
                <div class="list__section">
                    <h2>Your booked class</h2>
                    <div class="list__section__wrapper">
                        <div class="card">
                        <?php
                            $list = $func->classToClientById($id);
                            if($list):
                                foreach($list as $row):
                            ?>
                            <h3><?= $row['class_type'].' '.$row['day'].' at '.$row['time'];?></h3>
                            <hr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="list__section">
                    <h2>Your Exercise's Routine</h2>
                    <div class="list__section__wrapper">
                        <div class="card">
                            <?php
                            $list = $func->listExerciseToClientById($id);
                            if($list):
                                foreach($list as $row):
                            ?>
                            <h3><?= $row['exercise_name'];?></h3>
                            <h3><?= $row['equipment_name'];?></h3>
                            <h4><?= $row['sets'].' sets of '.$row['reps'];?></h4>
                            <hr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>