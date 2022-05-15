<?php 

    require('model.php');
    class allFunctions extends model {
        
        protected $pdo;

        public function __construct(){
            return parent::__construct();
        }

        // Password Verify
        public function password_verify($password_user, $password_db){
            $pwd = md5($password_user);
            if($pwd == $password_db){
                return true;
            }
            return false;
        }
        public function createUser(array $data){
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $username = $data['username'];
            $password = md5($data['password']);
            $email = $data['email'];
            $user_type = $data['user_type'];

            $sql = $this->pdo->prepare("INSERT INTO tb_user (fname, lname, username, password, email, user_type_id)
                                        VALUES(:fname, :lname, :username, :password, :email, :user_type_id);");
            $sql->bindParam(':fname', $first_name);
            $sql->bindParam(':lname', $last_name);
            $sql->bindParam(':username', $username);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':user_type_id', $user_type);
            $sql->execute();

            header('location: ../dashboard/dashboard_create_user.php');
        }
        public function listUserType(){
            $sql = $this->pdo->prepare("SELECT * FROM tb_user_type");
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }
            return $result;
        }
        public function listUser(){
            $sql = $this->pdo->prepare("SELECT * FROM tb_user");
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }

            return $result;
        }
        public function listUserById($id){
            $sql = $this->pdo->prepare("SELECT * FROM tb_user WHERE id = $id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() == 1){
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        public function listClientById($id){
            $sql = $this->pdo->prepare("SELECT * FROM tb_user WHERE id = $id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() == 1){
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        public function listExerciseById($id){
            $sql = $this->pdo->prepare("SELECT * FROM tb_exercise WHERE id = $id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() == 1){
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        public function listClassById($id){
            $sql = $this->pdo->prepare("SELECT * FROM tb_class WHERE id = $id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() == 1){
                $result = $sql->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        public function listExerciseToClientById($id){
            $sql = $this->pdo->prepare("SELECT 
                                          ec.id,
                u.fname,
                u.lname,
                e.exercise_name,
                e.equipment_name,
                e.sets,
                e.reps
                                        FROM exercise_to_client AS ec
                                        INNER JOIN tb_user AS u
                                        ON ec.user_id = u.id
                                        INNER JOIN tb_exercise AS e
                                        ON ec.exercise_id = e.id
                                        WHERE u.id = $id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return $result;
        }

        public function createClass(array $data){
            $class_type = $data['class_type'];
            $day = $data['day'];
            $time = $data['time'];

            $sql = $this->pdo->prepare("INSERT INTO tb_class (class_type, day_in_the_week, time_in_the_day)
                                        VALUES (:class_type, :day_in_the_week, :time_in_the_day);");
            
            $sql->bindParam(':class_type', $class_type);
            $sql->bindParam(':day_in_the_week', $day);
            $sql->bindParam(':time_in_the_day', $time);
            $sql->execute();

            header('location: ../dashboard/dashboard_class.php');
        }
        public function createClassToClient(array $data){
            $client = $data['client'];
            $class = $data['class'];

            $sql = $this->pdo->prepare("INSERT INTO class_to_client (user_id, class_id)
                                        VALUES (:user_id, :class_id);");
            
            $sql->bindParam(':user_id', $client);
            $sql->bindParam(':class_id', $class);
            $sql->execute();

            header('location: ../dashboard/dashboard_user.php');
        }
        public function listClass(){
            $sql = $this->pdo->prepare("SELECT * FROM tb_class");
            $sql->execute();
            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }

            return $result;
        }
        public function listExercise(){
            $sql = $this->pdo->prepare("SELECT * FROM tb_exercise");
            $sql->execute();
            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }

            return $result;
        }
        public function listClient(){
            $sql = $this->pdo->prepare("SELECT * FROM tb_user WHERE user_type_id != 'admin' AND user_type_id != 'staff'");
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        public function createExercise(array $data){
            $exercise = $data['exercise_name'];
            $equip = $data['equip_name'];
            $sets = $data['sets'];
            $reps = $data['reps'];
            $sql = $this->pdo->prepare("INSERT INTO tb_exercise (exercise_name, equipment_name, sets, reps)
                                        VALUES (:exercise_name, :equipment_name, :sets, :reps);");
            $sql->bindParam(':exercise_name', $exercise);
            $sql->bindParam(':equipment_name', $equip);
            $sql->bindParam(':sets', $sets);
            $sql->bindParam(':reps', $reps);
            $sql->execute();

            header('location: ../dashboard/dashboard_exercise.php');
        }
        public function createExerciseToClient(array $data){
            $client = $data['client'];
            $exercise = $data['exercise'];
            
            $sql = $this->pdo->prepare("INSERT INTO exercise_to_client (user_id, exercise_id)
                                        VALUES (:user_id, :exercise_id);");
            $sql->bindParam(':user_id', $client);
            $sql->bindParam(':exercise_id', $exercise);
            $sql->execute();

            header('location: ../dashboard/dashboard_exercise.php');
        }
        public function listExerciseToClient(){
            $sql = $this->pdo->prepare("SELECT 
                et.id,
                u.fname,
                u.lname,
                e.exercise_name,
                e.equipment_name,
                e.sets,
                e.reps
             FROM exercise_to_client AS et
                                        INNER JOIN tb_user AS u
                                        ON et.user_id = u.id
                                        INNER JOIN tb_exercise AS e
                                        ON et.exercise_id = e.id");
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            return $result;
        }
        

        public function exercisesToClientByUser($user_id){
            $sql = $this->pdo->prepare("SELECT * FROM exercise_to_client AS et 
                INNER JOIN tb_user AS u
                ON et.user_id = u.id
                INNER JOIN tb_exercise AS e
                ON et.exercise_id = e.id
                WHERE et.user_id = :user_id");

            $sql->bindParam(':user_id', $user_id);
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }

            return $result;
        }
        public function classToClientById($user_id){
            $sql = $this->pdo->prepare("SELECT * FROM class_to_client AS cc 
                INNER JOIN tb_user AS u
                ON cc.user_id = u.id
                INNER JOIN tb_class AS c
                ON cc.class_id = c.id
                WHERE cc.user_id = :user_id");

            $sql->bindParam(':user_id', $user_id);
            $sql->execute();

            $result = array();
            if($sql->rowCount() > 0){
                $result = $sql->fetchAll();
            }

            return $result;
        }
        public function editUser(array $data, $id){
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $username = $data['username'];
            $password = md5($data['password']);
            $email = $data['email'];
            $user_type = $data['user_type'];

            $sql = $this->pdo->prepare("UPDATE tb_user SET 
                                        fname = :fname,
                                        lname = :lname,
                                        username = :username,
                                        password = :pass,
                                        email = :email,
                                        user_type_id = :user_type_id
                                        WHERE id = :id");

            $sql->bindParam(':fname', $first_name);
            $sql->bindParam(':lname', $last_name);
            $sql->bindParam(':username', $username);
            $sql->bindParam(':pass', $password);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':user_type_id', $user_type);
            $sql->bindParam(':id', $id);
            $sql->execute();

            header('location: ../dashboard/dashboard_create_user.php');
        }
        public function editClass(array $data, $id){
            $class_type = $data['class_type'];
            $day = $data['day'];
            $time = $data['time'];

            $sql = $this->pdo->prepare("UPDATE tb_class SET 
                                        class_type = :class_type,
                                        day = :day,
                                        time = :time
                                        WHERE id = :id");

            $sql->bindParam(':class_type', $class_type);
            $sql->bindParam(':day', $day);
            $sql->bindParam(':time', $time);
            $sql->bindParam(':id', $id);
            $sql->execute();

            header('location: ../dashboard/dashboard_class.php');
        }
        public function editExercise(array $data, $id){
            $exercise_name = $data['exercise_name'];
            $equip_name = $data['equip_name'];
            $sets = $data['sets'];
            $reps = $data['reps'];

            $sql = $this->pdo->prepare("UPDATE tb_exercise SET 
                                        exercise_name = :exercise_name,
                                        equipment_name = :equipment_name,
                                        sets = :sets,
                                        reps = :reps
                                        WHERE id = :id");

            $sql->bindParam(':exercise_name', $exercise_name);
            $sql->bindParam(':equipment_name', $equip_name);
            $sql->bindParam(':sets', $sets);
            $sql->bindParam(':reps', $reps);
            $sql->bindParam(':id', $id);
            $sql->execute();

            header('location: ../dashboard/dashboard_exercise.php');
        }

        public function deleteUser($id){

            $sql = $this->pdo->prepare("DELETE FROM tb_user WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            return header("location: ../dashboard/dashboard_create_user.php");
        }
        public function deleteExercise($id){
        
            $sql = $this->pdo->prepare("DELETE FROM tb_exercise WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            return header("location: ../dashboard/dashboard_exercise.php");
        }
        public function deleteClass($id){
            
            $sql = $this->pdo->prepare("DELETE FROM tb_class WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            return header("location: ../dashboard/dashboard_class.php");
        }
        public function deleteExerciseToClient($id){
            $sql = $this->pdo->prepare("DELETE FROM exercise_to_client WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            return header("location: ../dashboard/dashboard_exercise.php");
        }

        public function logout(){
            unset($_SESSION);
            return header("location: ../index.php");
        }
    }