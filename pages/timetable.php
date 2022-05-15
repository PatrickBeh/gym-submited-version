
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
                        <li class="item"><a href="ourHistory.php">Our History</a></li>
                        <li class="item"><a href="#">Timetable</a></li>
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
            <div class="timetable__content">
                <h1>Time Table</h1>

                <table>
            <tr>
                <td></td>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
            <!-- 6 AM table -->
            <tr>
                <th>6:00AM</th>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Functional</td>
            </tr>
            <!-- 7 AM table -->
            <tr>
                <th>7:00AM</th>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Crossfit</td>
            </tr>
            <!-- 8 AM table -->
            <tr>
                <th>8:00AM</th>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
            </tr>
            <!-- 9 AM -->
            <tr>
                <th>9:00AM</th>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td></td>
            </tr>
            <!-- 5 PM table -->
            <tr>
                <th>5:00PM</th>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
            </tr>
            <!-- 6 PM table -->
            <tr>
                <th>6:00PM</th>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
            </tr>
            <!-- 7 PM table -->
            <tr>
                <th>7:00PM</th>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Functional</td>
                <td>Crossfit</td>
                <td>Crossfit</td>
            </tr>
            <!-- 8 PM table -->
            <tr>
                <th>8:00PM</th>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td>Crossfit</td>
                <td>Weightlifting</td>
                <td></td>
            </tr>
        </table>
            </div>
        </div>    
   </main>
</body>
</html>