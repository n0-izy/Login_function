<?php

require_once '../dbconnect.php';

class UserLogic
{
  /**
   * ユーザ登録
   * @param array $userData
   * @param bool $result
   */
  public static function createUser($userData)
  {
    $result = false;
    $sql = 'INSERT INTO users (name, email, password)VALUES(?, ?, ?)';

    //ユーザテータを配列に入れる
    $arr = [];
    $arr[] = $userData['username'];
    $arr[] = $userData['email'];
    $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);

    try{
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
    } catch (\Exception $e){
      return $result;
    }
    return $result;
  }

}