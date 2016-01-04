<?php
/**
 * This is a controller
 * This controller extends to the main controller
 * The main controller generates 3 power classes
 * -- The em method that is a EntityManager, this class have methods to work with the database
 * -- The Router method, that class works with the routing
 * -- And the view method that work's with the template Engine
 *
 * If you wanna give more power classes to all contollers just inject them in the /core/controller.php
 */
include("/packages/moonlight/auth/models/users.php");
include_once("/core/controller.php");
class auth extends controller{
  /**
   * Index, this is the fuction that run when the page open in the base routing
   * @return [View] All the controller routing functions  returns a view, a view is a template with need to know vars
   */
  function index(){
    echo "AUth index";
  }
  function login($name,$pass){
    $user = $this->em->getRepository('user')->findBy(array('name' => $name));
    $dbPass = $user[0]->getPass();
    if($pass == $dbPass){
      echo "login";
      $token = md5(rand());
      echo $token;
      $user[0]->setToken($token);
      $this->em->persist($user[0]);
      $this->em->flush();
      $_SESSION['token'] == $token;
      $_SESSION['name'] == $name;
    } else {
      echo "pass errada";
    }
    //view login
  }
  function logout(){
    unset($_SESSION['token']);
    unset($_SESSION['name']);
    //view logout
  }

  function verify() {
    //on open a route verify if im login and im a valid user
    $token  = $_SESSION['token'];
    $name = $_SESSION['name'];
    $users = $this->em->getRepository('user')->findBy(array('name' => $name));
    $user = $users[0];
    $tokenDb = $user->getToken();
    if($token == $tokenDb){
      $token = md5(rand());
      $user->setToken($token);
      $this->em->persist($user);
      $this->em->flush();
      $_SESSION['token'] == $token;
      return true;
    } else {
      $this->logout();
      return false;
    }

  }
  function signIn($name, $email, $pass, $token, $level){
    $user = new user();
    $user->setName($name);
    $user->setEmail($email);
    $user->setPass($pass);
    $user->setToken($toke);
    $user->setLevel($level);
    $user->em->persist($user);
    $user->em->flush();
    echo "Created Product with ID " . $user->getId() . "\n";
    //view registar
  }
}
