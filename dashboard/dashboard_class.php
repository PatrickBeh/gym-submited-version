<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }

    // Function to create User
    if(isset($_POST['class_registration'])){
        $func->createClass($_POST);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Create Class</title>
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
                    <li class="item"><a href="#">Class Section</a></li>
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
            <!-- Create Class Section -->
            <div class="form__section">
                <h2>Create Class</h2>
                <form method="post">
                    <div class="select">
                        <label for="class_type">Select Class Type</label>
                        <select name="class_type">
                            
                            <option value="Personal">Personal Class</option>
                            <option value="Group">Group Class</option>
                            
                        </select>
                    </div>
                    <div class="select">
                        <label for="day">Select Day in the Week</label>
                        <select name="day">
                            
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="select">
                        <label for="time">Select Time</label>
                        <select name="time">
                            
                            <option value="6AM">6:00 AM</option>
                            <option value="7AM">7:00 AM</option>
                            <option value="8AM">8:00 AM</option>
                            <option value="9AM">9:00 AM</option>
                            <option value="5PM">5:00 PM</option>
                            <option value="6PM">6:00 PM</option>
                            <option value="7PM">7:00 PM</option>
                            <option value="8PM">8:00 PM</option>
                            <option value="9PM">9:00 PM</option>
                        </select>
                    </div>
                    <div class="button">
                        <input type="hidden" name="class_registration">
                        <button type="submit">Create New Class</button>
                    </div>
                </form>
            </div>
            <div class="list__section">
                <h2>Our Classes</h2>
                <div class="list__section__wrapper">
                    <div class="card">
                        <?php 
                            $list = $func->listClass();
                            if($list):
                                foreach($list as $row):
                        ?>
                        <h3><?= $row['day'];?></h3>
                        <h3><?= $row['time'];?></h3>
                        <h3><?= $row['class_type'];?></h3>
                        <div class="edit__button">
                                <a href="../functions/edit_class.php?id=<?php echo $row['id']?>">
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