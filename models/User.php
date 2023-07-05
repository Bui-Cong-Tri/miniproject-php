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
    public function insert($data): mysqli_result|bool
    {
        require_once('exception/FormValidationException.php');
        echo $data;
        $err = $this->validate($data);
        if (!empty($err)) {
            throw new FormValidationException($err);
        }
       // $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (code, name,email,mobile,address,password) VALUES ('" . $this->randomCodeString() . "','" . $data['name'] . "','" . $data["email"] . "','','','" . $data["password"] . "')";
        return $this->conn->query($sql);
    }

    private function validate($data): array
    {
        echo $data;
        $nameErr = $emailErr = $passErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($data["name"])) {
                $codeErr = "Tên người dùng là trường bắt buộc.";
            } else {
                $name = $this->test_input($data["name"]);
                if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $name)) {
                    $codeErr = "Tên người dùng chỉ được có chữ, số, và khoảng trắng.";
                }
            }

            if (empty($data["email"])) {
                $emailErr = "Email là trường bắt buộc.";
            } else {
                $email = $this->test_input($data["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Định dạng email không đúng.";
                }
            }
            if (!empty($data["password"])) {
                $pass = $this->test_input($data["password"]);
                if (strlen($pass) < 8) {
                    $passErr = "Mật khẩu phải lớn hơn hoặc bằng 8 ký tự";
                } else {
                    $length = strlen($pass);
                    $okChar = $okNumber = false;
                    for($i = 0; $i < $length; ++$i) {
                        if ($pass[$i] >= 'A' && $pass[$i] <= 'Z') $okChar = true;
                        if ($pass[$i] >= '0' && $pass[$i] <= '9') $okNumber = true;
                        if ($okChar && $okNumber) break;
                    }
                    if (!$okChar || !$okNumber) $passErr = 'Mật khẩu phải chưa một chữ cái in hoa và một chữ số';
                }
            }
        }


        $errList = array();
        if ($emailErr !== "") {
            $errList["email"] = $emailErr;
        }
        if ($nameErr !== "") {
            $errList["name"] = $nameErr;
        }
        if ($passErr !== "") {
            $errList["password"] = $passErr;
        }
        return $errList;
    }

    private function test_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
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
