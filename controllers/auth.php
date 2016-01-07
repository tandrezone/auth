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
      $name = $_POST['username'];
      $pass = $_POST['password'];
      if($name != "" && $pass != ""){
        $users = $this->em->getRepository('user')->findBy(array('name' => $name));
        $user = $users[0];
        if($user != ""){
          if($user->checkPass($pass)){
            $user->updateToken();
            $this->em->persist($user);
            $this->em->flush();
          } else {
            echo "pass errada";
          }
        } else {
          echo "username errado";
        }
      }
    return $this->view->make('login', ['a' => 1, 'b' => 2])->render();
  }
  function logout(){
  //  unset($_SESSION['token']);
  //  unset($_SESSION['name']);
    //view logout
  }

  function verify() {
  }

  function access($appname, $me){
    $users = $this->em->getRepository('user')->findBy(array('name' => $me->name));
    $user = $users[0];
    if(!empty($user)){
      if($user->verify()){
        goToUrl('/');
        return true;
      } else {
        goToUrl('/login');
        return true;
      }
    } else {
      goToUrl('/login');
      return true;
    }
  }
}
