
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
            <div class="navbar__logo">
                <div class="logo">
                    
                        <a href="../index.php"><img src="../crossfit-icon.png" alt=""></a>
                        <div class="text__logo">
                            <a href="../index.php"><h1>Crossfit Southport</h1></a>
                            <a href="../index.php"><p>Lorem ipsum dolor sit amet.</p></a>
                        </div>
                </div>
                <div class="links">
                    <ul>
                        <li class="item"><a href="../index.php">Home</a></li>
                        <li class="item"><a href="#">Our History</a></li>
                        <li class="item"><a href="timetable.php">Timetable</a></li>
                        <li class="item"><a href="ourBox.php">Our Box</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar__form">
                <!-- Login section -->
                <form action="../functions/dashboard_access.php" method="post">
                    <input type="hidden" name="action" value="encrypto">
                    <input type="text" name="username" placeholder="Enter Username">
                    <input type="password" name="pwd" placeholder="Enter Password">
                    <button type="submit" name="btn_login">Login</button>
                </form>
            </div>
    </header>

    <main>
        <div class="main__wrapper">
            <div class="cta-container">
                <img src="../Images/pexels-binyamin-mellish-17840.jpg" alt="">
                <div class="text__background">  
                    <div class="text__background__wrapper">
                        <h1>Our history</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc convallis mauris mollis risus gravida, non laoreet odio ultricies. Donec accumsan lectus sapien, a facilisis ipsum vehicula eu. Fusce ornare, risus mollis convallis sagittis, elit nunc semper purus, at suscipit massa erat non dolor. Integer ultricies nulla sed consectetur facilisis. Mauris congue sollicitudin dolor, vitae accumsan ligula hendrerit id. Nunc non metus ipsum. Fusce volutpat tellus id nulla interdum, ut tempus purus efficitur. Integer accumsan odio at faucibus lobortis. Quisque feugiat sed urna sit amet mollis. Vivamus blandit felis leo, id volutpat lorem luctus sed.</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
</html>