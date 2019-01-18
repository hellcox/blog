<?php
/**
 * User: long
 * Date: 2019/1/3
 * Time: 11:29
 */

namespace app\index\bean;


class User
{
    private $id;
    private $nickName;
    private $loginName;
    private $password;
    private $age;
    private $addDate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param mixed $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @param mixed $loginName
     */
    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * @param mixed $addDate
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }
}