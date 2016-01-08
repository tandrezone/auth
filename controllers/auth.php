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
//include("/packages/moonlight/auth/models/users.php");
use_model("users");
class auth extends controller{
  /**
   * Index, this is the fuction that run when the page open in the base routing
   * @return [View] All the controller routing functions  returns a view, a view is a template with need to know vars
   */
  function login(){
      $email = $_POST['username'];
      $pass = $_POST['password'];
      if($name != "" && $pass != ""){
        $users = $this->em->getRepository('user')->findBy(array('email' => $email));
        $user = $users[0];
        if($user != ""){
          if($user->checkPass($pass)){
            $user->updateToken();
            $user->saveDefs();
            $this->em->persist($user);
            $this->em->flush();
            $errors = error::show("Login efectuado com successo", "success");
            goToUrl("/");
          } else {
            $errors = error::show("Username ou password errado", "danger");
          }
        } else {
          $errors = error::show("Username ou password errado", "danger");
        }
      }
    return $this->view->make('login', ["error" => $errors['error'], "type" => $errors['type']])->render();
  }
  function logout(){
  //  unset($_SESSION['token']);
  //  unset($_SESSION['name']);
  }

  function verify() {
    $name = $_GET['name'];
    $token = $_GET['token'];
    $users = $this->em->getRepository('user')->findBy(array('name' => $name));
    $user = $users[0];
    if(!empty($user)){
      if($user->verify($token)){
        return "true";
      } else {
        return "false";
      }
    } else {
      return "false";
    }
  }

  function access($appname, $me){
    $me = json_decode($me);
    $users = $this->em->getRepository('user')->findBy(array('name' => $me->name));
    $user = $users[0];
    if($user->verify($me->token)) {
      goToUrl("/bo");
    }
  }
}
