<?php 
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])){

    }
    $id = $_GET['id'];
    $result = $func->listClassById($id);
    // Function to create User
    if(isset($_POST['edit_class'])){
        $func->editClass($_POST, $id);
    }
    if(isset($_POST['delete_class'])){
        $func->deleteClass($_POST);
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
                
                    <a href="#"><img src="../crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <div class="links">
                <ul>
                    <li class="item"><a href="#">User Section</a></li>
                    <li class="item"><a href="dashboard_exercise.php">Exercise Section</a></li>
                    <li class="item"><a href="dashboard_workout.php">Workout Section</a></li>
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
                            
                            <option value="<?= $result['class_type'] ?>"><?= $result['class_type'] ?></option>
                            <option value="Personal">Personal Class</option>
                            <option value="Group">Group Class</option>
                            
                        </select>
                    </div>
                    <div class="select">
                        <label for="day">Select Day in the Week</label>
                        <select name="day">
                            <option value="<?= $result['day']?>"><?= $result['day']?></option>
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
                            <option value="<?= $result['time'] ?>"> <?= $result['time']?></option>
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
                        <input type="hidden" name="edit_class">
                        <button type="submit">Save User</button>
                    </div>
                    <div class="button">
                        <a href="delete_class.php?id=<?= $result['id'];?>">Delete Class</a>
                    </div>
                </form>
            </div>
    </main>
</body>
</html>