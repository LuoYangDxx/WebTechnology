<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Myorder extends CI_Controller 
{

	 function __construct()
   {//此函数每次必须写是继承父类的方法
        parent::__construct();
        $this->load->database();//这个是连接数据库的方法，放到这里的好处只要调用该方法就会连接数据库
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('news_model');
        $this->load->library('session');
     }

  function setorder()
  { 
    $this->load->helper('url');
    $pubtime = time();
    $user=$this->session->userdata('user');
    $shipment = $_POST['shipment'];
    $address = array();
   foreach ($_POST['ship'] as $k => $v) 
   {
    $val = $v;
    $address[] = $k . ': ' . $val;
   }
   $products = $_POST['products'];
   $nums = $_POST['nums'];
   $price = $_POST['price'];
   $payment = $_POST['payment'];
   $cardno = $_POST['cardno'];
   $address = implode("\n", $address);
   $query = $this->db->query("INSERT INTO  orders 
      SET
      products = '$products',
      prodnum = '$nums',
      price = '$price',
      address = '$address',
      shipment = '$shipment',
      pubtime = '{$pubtime}',
      member_id = '$user',
      payment='$payment',
      cardno='$cardno'
      ");
      $this->news_model->myorderdelete($user);
      echo "<script language=\"javascript\">";
      echo "alert(\"Success!!\");";
      echo "</script>";
      $data['products'] = $this->news_model->showproducts();
      $this->load->helper('url');
      $this->load->view('products',$data);
  }

  function vieworder()
   {
    $this->load->helper('url');
    if ($this->session->userdata('user')) 
    { $users=$this->session->userdata('user');
      $data['orders']=$this->news_model->orders($users);
      $this->load->view('orders',$data);
    }
    else {
      $this->load->view('login');
       }
   }

   function orderdetail($orderid)
   {
    //$data['oid']=$orderid;
    $data['order']=$this->news_model->order($orderid);
    $this->load->helper('url');
    $this->load->view('order',$data);
   }

function deleteorder($orderid)
   {
     $this->news_model->myorderdeletea($orderid);
     $this->load->helper('url');
     $users=$this->session->userdata('user');
      $data['orders']=$this->news_model->orders($users);
      $this->load->view('orders',$data);
   }

  function cartorder()
	{ 
   $this->load->helper('url');
   $user=$this->session->userdata('user');
   $query = $this->db->query("SELECT * 
          FROM cart WHERE user ='$user'
      ");
   if ($query->num_rows()>0) 
    {
     $this->load->helper('url');
     $user=$this->session->userdata('user');
     $data['cartorder'] = $this->news_model->cartorders($user);
     $this->load->view('cartorder',$data);
	   }else
     {
      $this->load->helper('url');
      $users=$this->session->userdata('user');
      $data['cart'] = $this->news_model->showcart($users);
      $this->load->view('cart',$data);
       echo "<script language=\"javascript\">";
       echo "alert(\"Cart is Empty!!\");";
       echo "</script>";
     }
  }

}
?>
