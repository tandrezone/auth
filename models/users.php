<?php
/**
 * @Entity @Table(name="users")
 **/
class user extends model
{
  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @Column(type="string") **/
  protected $name;
  /** @Column(type="string") **/
  protected $email;
  /** @Column(type="string") **/
  protected $pass;
  /** @Column(type="string") **/
  protected $token;
  /** @Column(type="string") **/
  protected $level;

/**
 * [getId]
 * @return [int]
 */
  public function getId()
  {
      return $this->id;
  }

/**
 * [getName]
 * @return [string]
 */
  public function getName()
  {
    return $this->name;
  }
  public function getEmail()
  {
    return $this->email;
  }

  public function getPass()
  {
    return $this->pass;
  }

  public function getToken()
  {
    return $this->token;
  }

  public function getLevel()
  {
    return $this->level;
  }


/**
 * [setName]
 * @param [string] $name
 */
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setPass($pass)
  {
    $this->pass = $pass;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
}
