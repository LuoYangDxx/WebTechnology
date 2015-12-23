<?php
class News_model extends CI_Model {

  public function __construct()
  { 
    $this->load->database();
  }

   function showproduct()
    {
		$query = $this->db->query("SELECT * 
			FROM products
			WHERE is_spsale = 1
			ORDER BY id desc
			");				
		return $query->result_array();
	}

    function showspecial()
    {
		$query = $this->db->query("SELECT * FROM categoryinfo WHERE fid=0");				
		return $query->result_array();
	}

   function myorderdelete($user){
      $query = $this->db->query("DELETE 
      FROM cart WHERE user ='$user'
      ");
    }

 function myorderdeletea($orderid){
      $query = $this->db->query("DELETE 
      FROM orders WHERE id ='$orderid'
      ");
    }

    function mycartchangea($users){
      $query = $this->db->query("SELECT * 
      FROM cart
      WHERE user = '$users'
      "); 
      return $query->result_array();
    }

   function showcart($users)
    {
    $userid=$users;
    $query = $this->db->query("SELECT * 
      FROM cart
      WHERE user = '$userid'
      ");        
    return $query->result_array();
    }

  function account($users)
    {
    $userid=$users;
    $query = $this->db->query("SELECT *
        FROM members
        WHERE
        id = '$userid'   
      ");        
    return $query->result_array();
    }

function orders($users)
    {
    $userid=$users;
    $query = $this->db->query("SELECT * 
      FROM orders
      WHERE member_id = '$userid'
      ORDER BY id desc
      ");        
    return $query->result_array();
    }

    function order($orderid)
    {
    $oid=$orderid;
    $query = $this->db->query("SELECT *
        FROM orders
        WHERE
        id = '$oid'
      ");        
    return $query->result_array();
    }

function specials($pid)
    {
    $proid=$pid;
    $query = $this->db->query("SELECT *
        FROM products
        WHERE
        id = '$proid'
      ");        
    return $query->result_array();
    }

 function showfspecial()
    {
    $query = $this->db->query("SELECT * FROM categoryinfo WHERE fid=0");        
    return $query->result_array();
  }

	function showcspecial()
    {
		$query = $this->db->query("SELECT * FROM categoryinfo WHERE fid<>0  ORDER BY fid ASC ");				
		return $query->result_array();
	}

    function showproducts()
    {
		$query = $this->db->query("SELECT * FROM products");				
		return $query->result_array();
	}

	function deletecart($user)
    {
		$query = $this->db->query("DELETE 
          FROM cart WHERE user ='$user'");				
	}


  function cartorders($user)
    {
    $query = $this->db->query("select * from cart where user='$user'");    
    return $query->result_array();

  }


	function deletepro($pid)
    {
		$query = $this->db->query("DELETE 
          FROM cart WHERE pid ='$pid'");				
	}

	function change($data)
    {   $num=$data['num'];
        $pid=$data['pid'];
		    $query = $this->db->query
             ("UPDATE cart 
             SET
             number = '$num'
             WHERE pid = '$pid'
              "); 		
	   }

   function cartone($data)
    {   
    $userid=$data['user'];
    $image=$data['image'];
    $pname=$data['product'];
    $number=$data['number'];
    $pid=$data['pid'];
    $price=$data['price'];
             
		$query = $this->db->query("INSERT INTO cart 
               SET
               user = '$userid',
               image = '$image',
               product = '$pname',
               number = '$number',
               price = '$price',
               pid = '$pid'
               ");	
	        }   

}
?>