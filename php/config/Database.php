<?php
    class Database 
    {
            // DB parameters
            private $servername = "localhost"; 
            private $username = "root"; 
            private $database = "schoolmanager"; 
            private $password = ""; 

            private $connection;

            public function connect()
            {
                        try
                        {
                            $this->connection=new PDO("mysql:host=$this->servername;dbname=$this->database",$this->username,$this->password);
                                $this->connection->setAttribute(PDO :: ATTR_ERRMODE,PDO :: ERRMODE_EXCEPTION);
                        }
                        catch(PDOException $e)
                        {
                                echo($e->getMessage());
                        }

                        return $this->connection;
            }
    }
?>