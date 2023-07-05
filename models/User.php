<?php

include_once('Model.php');

class User extends Model
{
    function authenticate($data): bool|array|null
    {
        $sql = "SELECT * FROM users WHERE email='" . $data["email"] . "'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row['email'];
        //password_verify($data["password"], $row["password"])
        if ($row["email"] === $data["email"] && $data["password"] === $row["password"]) {
            return $row;
        } else {
            return null;
        }
    }

    /**
     * @throws FormValidationException
     * @throws Exception
     */
    public function insert(array $data): mysqli_result|bool
    {
        require_once('exception/FormValidationException.php');
//        $err = $this->validate($data);
//        if (!empty($err)) {
//            throw new FormValidationException($err);
//        }
       // $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (code,name,email,mobile,address,password) VALUES ('" . $this->randomCodeString() . "','" . $data['name'] . "','" . $data["email"] . "','','','" . $data["password"] . "')";
        return $this->conn->query($sql);
    }

    private function validate(array $data): array
    {
        return $data;
    }

    /**
     * @throws Exception
     */
    private function randomCodeString(): string
    {
        $randomBytes = random_bytes(4);
        return bin2hex($randomBytes);
    }
}
