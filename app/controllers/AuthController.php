<?php 

namespace App\Controllers;

use App\Core\Controller;

use App\Models\Admin;

class AuthController extends Controller
{    
	public $layout = 'auth';

    public function adminLogin()
    {
      $this->title = "Avtorizatsiya";
      $admin = (new Admin)->getAdmin();
      if (!isset($_SESSION['admin'])) {
      	if (isset($_POST['submit'])) {
      		foreach ($admin as $value) {
      			if ($value['password'] == md5(htmlspecialchars(trim($_POST['password']))) && $value['email'] == trim(htmlspecialchars($_POST['email']))) {
      				$_SESSION['admin'] = $_POST['email'];
      				echo '<meta http-equiv="refresh" content="2; url=https://tutorials.uz/admin/dashboard">';
      			}else{
      				echo "<script> alert('Parol yoki email notogri') </script>";
      			}
      		}
      	}else{
      		echo "<script> alert('Malumotlar toldirilmagan') </script>";
      	}
      }else
      {
      	echo '<meta http-equiv="refresh" content="2; url=https://tutorials.uz/admin/dashboard">';
      }
      return $this->render('admin/login',['jsurl'=>'']);
    }
}
