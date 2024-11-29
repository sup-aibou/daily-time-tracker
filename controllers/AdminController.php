<?php
require_once '../models/Admin.php';

class AdminController
{
    private $adminModel;

    public function __construct($con)
    {
        $this->adminModel = new Admin($con);
    }

    public function createAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'FullName' => $_POST['FullName'],
                'Username' => $_POST['Username'],
                'Password' => password_hash($_POST['Password'], PASSWORD_BCRYPT),
                'Email' => $_POST['Email'],
                'MobileNumber' => $_POST['MobileNumber'],
                'SecurityCode' => $_POST['SecurityCode'],
                'UserType' => ($_POST['UserType'] == 'Super Admin') ? 1 : 0,
            ];

            if ($this->adminModel->addAdmin($data)) {
                return "Added New Admin";
            } else {
                return "Something Went Wrong";
            }
        }
    }
}
