<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;


class FirebaseController extends Controller
{
  public function index(){
    return view('chat.index');
  }


  public function process(){
    if (isset($_POST['register_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	
        $user = new User();
    
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $resp = $user->createAccount($fullname, $username, $email, $password);
        echo json_encode($resp);
        exit();
    
    
    }
    //Login User
    if (isset($_POST['login_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $user = new User();
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $resp = $user->loginUser($username, $password);
        echo json_encode($resp);
        exit();
    
    
    
    }
    
    if (isset($_POST['logoutUser'])) {
        
        $user = new User();
        $resp = $user->logout();
        echo json_encode($resp);
        exit();
    
    }
    
    if (isset($_POST['getUsers']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $user = new User();
        echo json_encode($user->getUsers());
        exit();
    
    }
    
    if (isset($_POST['connectUser']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = new User();
        echo json_encode($user->createChatRecord($_POST['user_1'], $_POST['user_2']));
        exit();
    }
    
  }
}
