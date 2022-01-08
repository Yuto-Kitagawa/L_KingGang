<?php

require_once "database.php";

class Functions extends Database
{
    //確認用
    public function Confirm($e)
    {
        var_dump($e);
        die();
    }

    public function getItems($item)
    {
        $sql = "SELECT * FROM post WHERE post_No = $item;";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            var_dump($this->conn->error);
            die();
        }
    }

    public function getItemsList($item)
    {
        $sql = "SELECT * FROM post WHERE post_Name LIKE '%$item%';";
        if ($result = $this->conn->query($sql)) {
            return $result;
        }
    }

    public function getItemsListDetail($id)
    {
        $sql = "SELECT * FROM detail WHERE post_No = $id;";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            var_dump($this->conn->error);
            die();
        }
    }

    public function getProfile($id)
    {
        $sql = "SELECT * FROM user WHERE user_Id = '$id';";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            var_dump($this->conn->error);
            die();
        }
    }

    public function getDetail($id)
    {
        $sql = "SELECT * FROM detail WHERE post_No = $id;";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function login($id, $password)
    {
        $sql = "SELECT `user_Id`,`user_Password`,`user_Name` FROM user WHERE `user_Id` = '$id'";

        $result  = $this->conn->query($sql);

        //もし同じユーザー名が1つだけあれば
        if ($result->num_rows == 1) {
            //email is exist 
            $user_details = $result->fetch_assoc();
            //ユーザー名とパスワードが一致
            if (password_verify($password, $user_details['user_Password'])) {
                //correct password
                session_start();
                $_SESSION['id'] = $user_details['user_Id'];
                $_SESSION['username'] = $user_details['user_Name'];

                header("location: ../view/home.php");
                exit;
            } else {
                //error password is wrong
                header('Location: ../view/index.html?err=2');
                exit;
            }
        } else {
            // echo "Not exist account in this email"
            header('Location: ../view/index.html?err=1');
            exit;
        }
    }

    public function createUser($username, $email, $password)
    {
        //メールアドレスの重複がないかを確認
        $email_confirm_sql = "SELECT * FROM user WHERE `user_Id` = '$email';";
        if (!$confirm_rows = $this->conn->query($email_confirm_sql)) {
            //エラーが発生しました
            header('Location: ../signup.html?err=1');
            exit();
        }
        if ($confirm_rows->num_rows >= 1) {
            //すでにメールアドレスが登録されています
            header('Location: ../signup.php?err=2');
            exit();
        } else {
            //入力されたデータをデータベースに格納
            $insert_sql = "INSERT INTO user(`user_Id`,`user_Name`,user_Password) VALUES('$email','$username','$password');";
            if ($this->conn->query($insert_sql)) {
                //セッションに格納
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $email;
                session_write_close();
                header('Location: ../view/home.php');
                exit();
            }
        }
    }

    public function post($id, $title, $content, $pic1, $newImageTmppic1, $pic2, $newImageTmppic2, $pic3, $newImageTmppic3, $price, $location, $cate, $season)
    {
        //post tableに格納
        $sql = "INSERT INTO post (`user_Id`,post_Name) VALUES ('$id','$title');";
        if ($this->conn->query($sql)) {
            //post_Noを取得のため格納を実行してからselect文で取得
            $sql2 = "SELECT * FROM post WHERE `user_Id` = '$id' ORDER BY post_Time DESC LIMIT 1;";
            if ($result_array = $this->conn->query($sql2)) {
                $result = $result_array->fetch_assoc();
                $postId = $result['post_No'];

                //写真が何枚あるかでSQL文を変化
                if ($newImageTmppic2 == null) {
                    $sql3 = "INSERT INTO detail (post_No,detail_Image1,detail_Location,detail_Price,detail_explanation,detail_Category,detail_Season) VALUES ($postId,'$pic1','$location',$price,'$content','$cate','$season');";
                    $destination = "../img/" . basename($pic1);
                    move_uploaded_file($newImageTmppic1, $destination);
                } else {
                    if ($newImageTmppic3 == null) {
                        $sql3 = "INSERT INTO detail (post_No,detail_Image1,detail_Image2,detail_Location,detail_Price,detail_explanation,detail_Category,detail_Season) VALUES ($postId,'$pic1','$pic2','$location',$price,'$content','$cate','$season');";
                        $destination = "../img/" . basename($pic2);
                        move_uploaded_file($newImageTmppic2, $destination);
                    } else {
                        $sql3 = "INSERT INTO detail (post_No,detail_Image1,detail_Image2,detail_Image3,detail_Location,detail_Price,detail_explanation,detail_Category,detail_Season) VALUES ($postId,'$pic1','$pic2','$pic3','$location',$price,'$content','$cate','$season');";
                        $destination = "../img/" . basename($pic2);
                        move_uploaded_file($newImageTmppic2, $destination);
                        $destination = "../img/" . basename($pic3);
                        move_uploaded_file($newImageTmppic3, $destination);
                    }
                }

                //SQLを実行
                if ($this->conn->query($sql3)) {
                    header('location: ../view/home.php');
                    exit;
                } else {
                    die('Error: Connection database : ' . $this->conn->error);
                }
            } else {
                var_dump($this->conn->error);
                die();
            }
        } else {
            var_dump($this->conn->error);
            die();
        }
    }

    public function getElecProducts()
    {
        $sql = "SELECT * FROM detail WHERE detail_Category = 1";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getFuniProducts()
    {
        $sql = "SELECT * FROM detail WHERE detail_Category = 2";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getInteProducts()
    {
        $sql = "SELECT * FROM detail WHERE detail_Category = 3";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getHukuProducts()
    {
        $sql = "SELECT * FROM detail WHERE detail_Category = 4";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getSpoProducts()
    {
        $sql = "SELECT * FROM detail WHERE detail_Category = 5";
        $result = $this->conn->query($sql);
        return $result;
    }
}
