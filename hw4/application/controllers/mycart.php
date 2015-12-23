<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mycart extends CI_Controller 
{

	 function __construct()
	 {//此函数每次必须写是继承父类的方法
        parent::__construct();
        $this->load->database();//这个是连接数据库的方法，放到这里的好处只要调用该方法就会连接数据库
        $this->load->library('encrypt');
        $this->load->model('news_model');
        $this->load->library('session');
     }

  function viewcart()
	{ 
   $this->load->helper('url');
   if ($this->session->userdata('uid')) 
   {
    $users=$this->session->userdata('user');
    $data['cart'] = $this->news_model->showcart($users);
    $this->load->view('cart',$data);//这里是调用哪个视图并分配数据给指定视图显示
	 }else
      {$this->load->view('login');
    }
  }
  function viewproduct($special)
  { 
    $pid=$special;
    $data['specials']=$this->news_model->specials($pid);
    $this->load->helper('url');
    $this->load->view('product',$data);

  }

 function delete($user)
  {   
      $this->news_model->deletecart($user);
      $this->load->helper('url');
      $users=$this->session->userdata('user');
      $data['cart'] = $this->news_model->showcart($users);
      $this->load->view('cart',$data);
  }

  function deleteproduct($pid)
   {
      $this->news_model->deletepro($pid);
      $this->load->helper('url');
      $users=$this->session->userdata('user');
      $data['cart'] = $this->news_model->showcart($users);
      $this->load->view('cart',$data);
     }


 function change()
  {
    $users=$this->session->userdata('user');
    $have=$this->news_model->mycartchangea($users);
    if($have)
    {
    $this->load->helper('url');
    $arr_pid = $_POST['pid'];
    $arr_num = $_POST['num'];
    $num;
    foreach($arr_num as $id =>$num )
    {
    $data['num']=$num;
    $data['pid']=$arr_pid[$id];
    $this->news_model->change($data);
    }
    $users=$this->session->userdata('user');
    $data['cart'] = $this->news_model->showcart($users);
    $this->load->view('cart',$data);
    }
    else {
        $data['products'] = $this->news_model->showproducts();
        $this->load->helper('url');
        $this->load->view('products',$data);
        }
  }

  function cartaction()
  { 
     $this->load->helper('url');
     $productid = $_POST['add'];
     $number = $_POST['num'];
      if ($this->session->userdata('uid')) 
       {
        $userid=$this->session->userdata('user');
        $query = $this->db->query("SELECT *
             FROM products
             WHERE
             id='$productid' ");
           $myrow = $query->row_array();
           $price = $myrow['price'];
           $image = $myrow['thumb'];
           $pname = $myrow['title'];
           $pid=$myrow['id'];
           $query = $this->db->query
             ("SELECT *  
             FROM cart
            WHERE product ='$pname' AND user ='$userid' ");
           if ($query->num_rows()>0)
           {
            $odata= $query->row_array();
            $ndata= $number + $odata['number'];
            $query = $this->db->query
             ("UPDATE cart 
             SET
             number = '$ndata'
             WHERE product = '$pname' AND user ='$userid'
              ");
            }
           else 
            {  $data['user']=$userid;
               $data['image']=$image;
               $data['product']=$pname;
               $data['number']=$number;
               $data['price']=$price;
               $data['pid']=$pid;
               $this->news_model->cartone($data);
            }
              $users=$this->session->userdata('user');
              $data['cart'] = $this->news_model->showcart($users);
              $this->load->view('cart',$data);
        }
      else
      {
       $this->load->view('login');
       }
   }


}
?>
