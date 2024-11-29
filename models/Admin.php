<?php
class Admin
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function addAdmin($data)
    {
        $query = "INSERT INTO admin (AdminName, Username, Password, Email, MobileNumber, Security_Code, UserType) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param(
            "ssssssi",
            $data['FullName'],
            $data['Username'],
            $data['Password'],
            $data['Email'],
            $data['MobileNumber'],
            $data['SecurityCode'],
            $data['UserType']
        );

        return $stmt->execute();
    }
}
