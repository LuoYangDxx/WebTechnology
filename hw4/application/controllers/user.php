<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	 function __construct()
	 {//此函数每次必须写是继承父类的方法
        parent::__construct();
        $this->load->database();//这个是连接数据库的方法，放到这里的好处只要调用该方法就会连接数据库
        $this->load->library('encrypt');
        $this->load->model('news_model');
        $this->load->library('session');
     }
     
  function signin()
	{ 
		$this->load->helper('url');
    $this->load->view('login');//这里是调用哪个视图并分配数据给指定视图显示
	}

 function newregister()
  { 
    $this->load->helper('url');
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $nkm = $_POST['nickname'];
    $address = $_POST['address'];
    $city = $_POST['city'];//这里是调用哪个视图并分配数据给指定视图显示
    $query = $this->db->query("SELECT *
             FROM members
             WHERE
             email = '$email' ");
    if ($query->num_rows()>0){
            echo "<script language=\"javascript\">";
            echo "alert(\"This email has be used!!\");";
            echo "</script>";
            $this->load->view('register');
    }
     else{
           $sql=
            "INSERT INTO members 
            SET
            email = ?,
            pwd = ?,
            nickname = ?,
            address = ?,
            city = ?
            ";
            $query = $this->db->query($sql,array($email,$pwd,$nkm,$address,$city));
            $this->load->view('login');
            echo "<script language=\"javascript\">";
            echo "alert(\"Success!!\");";
            echo "</script>";
          }

    }
function userinfo()
        { $this->load->helper('url');
          $newpwd = $_POST['newpwd'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $nickname=$_POST['nickname'];
          $email=$_POST['email'];
          $userid=$this->session->userdata('user');
       if ($_POST) 
       {
         $sql="UPDATE members 
             SET
             nickname = ?,
             email = ?,
             pwd = ?,
             city = ?,
             address = ?
             WHERE id = '$userid'
           ";
        $query = $this->db->query($sql,array($nickname,$email,$newpwd,$city,$address));
          }
  if ($query){
        echo "<script language=\"javascript\">";
        echo "alert(\"Success!!\");";
        echo "</script>"; 
            }
         else {
         echo "<script language=\"javascript\">";
         echo "alert(\"Fail!!\");";
         echo "</script>";
               }
         $users=$this->session->userdata('user');
        $data['account']=$this->news_model->account($users);
        $this->load->view('account',$data);
        }

 function logout()
  { 
    $this->load->helper('url');
    $this ->session -> unset_userdata('uid');//这里是调用哪个视图并分配数据给指定视图显示
    $this ->session -> unset_userdata('user');
    $this->session->sess_destroy();
    echo "<script language=\"javascript\">";
    echo "alert(\"Logout!!\");";
    echo "</script>";
    $data['products'] = $this->news_model->showproducts();
    $this->load->helper('url');
    $this->load->view('products',$data);
  }

function uaccount()
  { 
    $this->load->helper('url');
    if ($this->session->userdata('user')) 
    { $users=$this->session->userdata('user');
      $data['account']=$this->news_model->account($users);
      $this->load->view('account',$data);
     }
    else {$this->load->view('login');}
   }

   function register()
	{ 
		$this->load->helper('url');
    $this->load->view('register');//这里是调用哪个视图并分配数据给指定视图显示
	}

   function submit()
    {
	    $pwd=$_POST['pwd'];
      $email=$_POST['email'];
	if (preg_match('/^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/',$email)) 
	{
      if(preg_match('/^[A-Za-z0-9]{6,12}$/',$pwd))
       {
        $sql="SELECT *
         FROM members
         WHERE
         email = ?
         AND
         pwd = ?";
      	$query = $this->db->query($sql,array($email,$pwd));
      	 if ($query->num_rows()>0)
          {
           $myrow = $query->row_array();
           $name = $myrow['nickname'];
           $userid = $myrow['id'];
           $this->session->set_userdata('uid', $name);
           $this->session->set_userdata('user', $userid);
           echo "<script language=\"javascript\">";
	         echo "alert(\"Login Successful\");";
	         echo "</script>";
           $data['products'] = $this->news_model->showproducts();
	         $this->load->helper('url');
           $this->load->view('products',$data);

          } 
          else 
          {
          echo "<script language=\"javascript\">";
          echo "alert(\"Login Fail!! Check you input!\");";
          echo "</script>";
          $this->load->helper('url');
          $this->load->view('login');
          }
        } 
       else
       { 
      	echo "<script language=\"javascript\">";
	    echo "alert(\"Password must be 6-12 long letter or number!!\");";
	    echo "</script>";
        $this->load->helper('url');
        $this->load->view('login');
       }
    }
    else
    {
     	echo "<script language=\"javascript\">";
	    echo "alert(\"Email is not correct\");";
	    echo "</script>";
        $this->load->helper('url');
        $this->load->view('login');
    }
   
  }
}
?>