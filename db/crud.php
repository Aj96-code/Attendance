<?php 
    class CRUD
    {
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertAttendees (
            $firstName,$lastName,$dob,$email,
            $contactNumber,$specialty,$avatarPath
        )
        {
            try {
                //* Define the sql to be executed
                $sql = "INSERT INTO attendee(
                    first_name,last_name,date_of_birth,email_address,
                    contact_number,specialty_id,avatar_path
                ) 
                VALUES (
                    :firstName,:lastName,:dob,:email,
                    :contactNumber,:specialty,:avatarPath
                )";
                //* Prepare the sql statement to be executed
                $stmt = $this->db->prepare($sql);
                //* bind All placeholders to the actual values
                $stmt->bindparam(":firstName",$firstName);
                $stmt->bindparam(":lastName",$lastName);
                $stmt->bindparam(":dob",$dob);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":contactNumber",$contactNumber);
                $stmt->bindparam(":specialty",$specialty);
                $stmt->bindparam(":avatarPath", $avatarPath);
                //* Execute the statement
                $stmt->execute();
                return true;
            } catch (PDOException $exc) {
                echo $exc->getMessage();
                return false;
            }
        }
        
        public function getAttendees()
        {
            try
            {
            
                $sql = "SELECT * FROM `attendee`a
                    inner join specialties s
                    on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id)
        {
            try
            {
               $sql = "SELECT * FROM `attendee`a
                   inner join specialties s on
                   a.specialty_id = s.specialty_id
                   WHERE attendee_id = :id";
               $stmt = $this->db->prepare($sql);
               $stmt->bindparam(":id",$id);
               $stmt->execute();
               return $stmt->fetch();
            } catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function editAttendee(
            $id,$firstName,$lastName,$dob,$email,
            $contactNumber,$specialty
        )
        {
            try
            {
                $sql ="UPDATE `attendee` SET`first_name`= :firstName ,
                `last_name`= :lastName ,`date_of_birth`= :dob ,
                `email_address`= :email ,`contact_number`= :contactNumber ,
                `specialty_id`= :specialty  WHERE attendee_id =:id" ;
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
                $stmt->bindparam(":firstName",$firstName);
                $stmt->bindparam(":lastName",$lastName);
                $stmt->bindparam(":dob",$dob);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":contactNumber",$contactNumber);
                $stmt->bindparam(":specialty",$specialty);
                $stmt->execute();
                return true;
            } catch(PDOException $exc)
            {
 
                echo $exc->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id)
        {
            try
            {
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
                $stmt->execute();
                return true;
            } catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
        public function getSpecialties()
        {  
            try
            { 
                $sql = "SELECT * FROM `specialties`";
                return $this->db->query($sql);
            } catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function getSpecialtyById(int $id)
        {
            try
            {
                $sql = "SELECT * FROM `specialties` WHERE specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
                $stmt->execute();
                return $stmt->fetch();

            } catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
    }

?>