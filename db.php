<?php
    ini_set('display_errors', 1);

    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "db_tubesrpl2";
        public $connection = "";

        function __construct(){}

        function connectDatabase(){
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if(!$this->connection){
                die("could not connect: " . mysql_error());
            }
        }
        
        function closeDatabase(){
            mysqli_close($this->connection);
        }
    }

    class Admin extends Database{
        function login($email,$password){
            $this->connectDatabase();
            $sql="SELECT * FROM admin WHERE email_admin='$email' AND password_admin='$password'";
            $query=mysqli_query($this->connection,$sql);
            $data=mysqli_fetch_assoc($query);
            $this->closeDatabase();

            if(mysqli_num_rows($query)>0){
                $_SESSION['email_admin']=$data['email_admin'];
                $_SESSION['id_admin']=$data['id_admin'];

                setcookie("message","",time()-60);
                header("location: halAdmin.php");
                die($data);
                return 1;
            }else{
                return 0;
                //$db2=new User();
                //$db2->userLogin($email,$password);
            }
        }
    }

    class User extends Database{
        function userLogin($email,$password){
            $this->connectDatabase();
            $sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
            $query=mysqli_query($this->connection,$sql);
            $data=mysqli_fetch_assoc($query);
            $this->closeDatabase();
            if(mysqli_num_rows($query)<1){
                setcookie("message","maaf, email atau password salah",time()+10);
                header("location: login-form.php");
            }else{
                echo $data['email'] . $data['password'];
                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['id_user']=$data['id_user'];
                $_SESSION['foto']=$data['foto'];
    
                setcookie("message","",time()-60);
                header("location: halUser.php");
            }
        }

        function userRegister($tmp_file,$nm_file,$username,$email,$password){
            $this->connectDatabase();
            $sql="SELECT * FROM user WHERE email='$email'";
            $query=mysqli_query($this->connection,$sql);
            $data=mysqli_fetch_assoc($query);
            $this->closeDatabase();

            if(mysqli_num_rows($query)<1){
                if($tmp_file){
                    $dir="file/$nm_file";
                    move_uploaded_file($tmp_file,$dir);
                }
                $this->connectDatabase();
                $sql="INSERT into user values('','$username','$email','$password','$nm_file')";
                $query=mysqli_query($this->connection,$sql);
                $this->closeDatabase();
                if(!$query){
                    die('Could not get data: ' . mysqli_error());
                }else{
                    setcookie('status-no','berhasil membuat akun',time()+5);
                    setcookie("message","",time()-60);
                    header("location: login-form.php");
                }
            }else{
                setcookie("message","maaf, email sudah terpakai",time()+5);
                header("location: index3.php");
            }
        }
        function getTotalUser(){
            $this->connectDatabase();
            $query = "SELECT count(id_user) from user";
            $result = mysqli_query($this->connection, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $this->closeDatabase();
            return $data;
        }
        function getUserInfo(){
            $this->connectDatabase();
            $query = "SELECT * from user";
            $result = mysqli_query($this->connection, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $this->closeDatabase();
            return $data;
        }
    }

    class Task extends Database{
        function getTaskToday($id_user){
            $this->connectDatabase();
            $query = "SELECT nama_tugas FROM task where DATE(batas_waktu)=curdate() && status=0 && id_user='$id_user' order by batas_waktu";
            $result = mysqli_query($this->connection, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $this->closeDatabase();
            return $data;
        }
        function getTaskFresh($id_user){
            $this->connectDatabase();
            
            $query = "SELECT * FROM task where batas_waktu > CURRENT_TIMESTAMP && status=0 && id_user='$id_user' order by batas_waktu";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }
        function getTaskDone($id_user){
            $this->connectDatabase();
            
            $query = "SELECT * FROM task where status=1 && id_user='$id_user' order by waktu_selesai desc";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }
        function getTaskOverdue($id_user){
            $this->connectDatabase();
            
            $query = "SELECT * from task where batas_waktu < CURRENT_TIMESTAMP && status = 0 && id_user='$id_user' order by batas_waktu";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }
        function saveTaskData($nama,$date,$id_user){
            $this->connectDatabase();
            $query = "INSERT INTO task values('','$nama','$date','0000-00-00 00:00:00',0,$id_user)";
            $result=mysqli_query($this->connection,$query);
            if(!$result){
                die('Could not get data: ' . mysqli_error());
            }
            $this->closeDatabase();
        }
        function doneTask($id_task){
            $this->connectDatabase();
            $query = "UPDATE task set status=1, waktu_selesai=current_timestamp where id_task=$id_task";
            $result=mysqli_query($this->connection,$query);
            if(!$result){
                die('Could not get data: ' . mysqli_error());
            }
            $this->closeDatabase();
        }
        function deleteTask($id_task){
            $this->connectDatabase();
            $query = "DELETE from task where id_task=$id_task";
            $result=mysqli_query($this->connection,$query);
            if(!$result){
                die('Could not get data: ' . mysqli_error());
            }
            $this->closeDatabase();
        }
        function getUserTask($id_user){
            $this->connectDatabase();
            $query = "SELECT * FROM task where id_user=$id_user order by status,waktu_selesai desc";
            $result = mysqli_query($this->connection, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $this->closeDatabase();
            return $data;
        }
    }
    class Control extends Database{
        function getCurrentMoist(){
            $this->connectDatabase();
            
            $query = "SELECT kelembapan from control order by waktu_kelembapan desc limit 1";
            
            $result = mysqli_query($this->connection, $query);
    
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
    
            $this->closeDatabase();
    
            return $data;
        }
    }