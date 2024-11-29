<?php
// models/User.php
class User {
    private $conn;

    public function __construct($dbconn) {
        $this->conn = $dbconn;
    }

    public function validateUser($username, $password) {
        $query = "SELECT ID, Password FROM admin WHERE UserName = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_array(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }
}
