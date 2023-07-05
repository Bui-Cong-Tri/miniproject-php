<?php
include_once('Model.php');

class Product extends Model
{
    function All(): array
    {
        $data = array();
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function find($code): bool|array|null
    {
        $sql = "SELECT * FROM products WHERE code='" . $code . "'";
        return $this->conn->query($sql)->fetch_assoc();
    }

    /**
     * @throws FormValidationException
     */
    function insert($data): mysqli_result|bool|array
    {
        include_once('exception/FormValidationException.php');
        $err = $this->validate($data);
        if (!empty($err)) {
            throw new FormValidationException($err);
        }
        //if($conn->query($sql) === false) echo mysqli_error($conn);
        try {
            $stm = $this->conn->prepare("INSERT INTO products (code, name, description, quantity) VALUES (?, ?, ?, ?)");
            $stm->bind_param('sssi', $data['code'], $data['name'], $data['description'], $data['quantity']);
            $stm->execute();
            $stm->close();
        } catch (Exception $e) {
            echo $e;
        }
        $this->conn->close();
        return true;
    }

    /**
     * @throws FormValidationException
     */
    function update($data): mysqli_result|bool
    {
        include_once('exception/FormValidationException.php');
//        $err = $this->validate($data);
        if (!empty($err)) {
            throw new FormValidationException($err);
        }
        $sql = "UPDATE products SET name='" . $data['name'] . "',description='" . $data['description'] . "',quantity='" . $data['quantity'] . "' WHERE code='" . $data['code'] . "'";
        return $this->conn->query($sql);
    }

    function delete($data): mysqli_result|bool
    {
        $sql = "DELETE FROM products WHERE code='" . $data . "'";
        return $this->conn->query($sql);
    }

    function validate($data): array
    {
        $codeErr = $nameErr = $descriptionErr = $quantityErr = "";
        $code = $name = $email = $description = $quantity = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($data["code"])) {
                $codeErr = "Mã sản phẩm là trường bắt buộc.";
            } else {
                $code = $this->test_input($data["code"]);
                if (!preg_match('/^[0-9]+$/', $code)) {
                    $codeErr = "Mã sản phẩm chỉ sử dụng số.";
                }
            }
            if (empty($data["name"])) {
                $nameErr = "Tên sản phẩm là trường bắt buộc.";
            } else {
                $name = $this->test_input($data["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Tên sản phẩm chỉ cho phep có chữ cái và khoảng trắng.";
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
            if (!empty($data["quantity"])) {
                $quantity = $this->test_input($data["quantity"]);
                if (!ctype_digit($quantity)) {
                    $quantityErr = "Số lượng bắt buộc phải là số.";
                }
            }
        }


        $errList = array();
        if ($codeErr !== "") {
            $errList["code"] = $codeErr;
        }
        if ($nameErr !== "") {
            $errList["name"] = $nameErr;
        }
        if ($quantityErr !== "") {
            $errList["quantity"] = $quantityErr;
        }
        return $errList;
    }

    private function test_input($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}

?>