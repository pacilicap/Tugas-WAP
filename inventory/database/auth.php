<?php
    include('connection.php');

    class Auth {

        function __construct()
        {
            $this->database = new ConnectionDatabase();
        }

        function register($name, $email, $password){
            $query = "INSERT INTO `users` (`name`, `email`, `password`) VALUES (?,?,?)";

            $process = $this->database->connection->prepare($query);

            if($process) {
                $process->bind_param('sss', $name, $email, md5($password));
                $process->execute();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return true;
        }

        function login($email, $password){
            $result = null;
            $query = "SELECT * FROM `users` WHERE email = ?";
            $process = $this->database->connection->prepare($query);
            
            if($process) {
                $process->bind_param('s', $email);
                $process->execute();

                $result = $process->get_result();
                $result = $result->fetch_assoc();

                if ($result['password'] != md5($password)) {
                    return false;
                }
                
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return $result;
        }
    }
?>