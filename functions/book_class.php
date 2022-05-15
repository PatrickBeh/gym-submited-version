<?php 
    ob_start();
    session_start();
    require('../functions/db_link.php');
    require('../functions/functions.php');

    $pdo;
    $func = new allFunctions();

    $id = $_GET['id'];
    $result = $func->listClientById($id);
    
    // Function to create User
    if(isset($_POST['class_to_client_registration'])){
        $func->createClassToClient($_POST);
    }

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
                <h2>Book a Class</h2>
                <div class="form__section__wrapper">
                    <form method="post">
                        <div class="select">
                            <label for="class">Select Class:</label>
                            <select name="class">
                                <?php 
                                $list = $func->listClass();
                                if($list):
                                    foreach($list as $row):
                                        ?>
                                <option value="<?= $row['id'];?>"><?= $row['class_type'].' '.$row['day'].' at '.$row['time'];?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            </select>
                            <div class="input">
                                <input type="hidden" name="client" value="<?php echo $id?>">
                            </div>
                                    </div>
                            
                        <div class="button">
                            <input type="hidden" name="class_to_client_registration">
                            <button type="submit">Book your class</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>