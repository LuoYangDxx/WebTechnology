<?php 
class Welcome extends CI_Controller {

	 function __construct()
	 {//此函数每次必须写是继承父类的方法
        parent::__construct();
        $this->load->database();//这个是连接数据库的方法，放到这里的好处只要调用该方法就会连接数据库
        $this->load->model('news_model');
        $this->load->library('session');
    }

 function index()
	{   
		$data['product'] = $this->news_model->showproduct();
		$data['special'] = $this->news_model->showspecial();
		$data['cspecial'] = $this->news_model->showcspecial();
		$this->load->helper('url');
        $this->load->view('home',$data);//这里是调用哪个视图并分配数据给指定视图显示echo "string";
	}

function product()
	{   $data['products'] = $this->news_model->showproducts();
		$this->load->helper('url');
        $this->load->view('products',$data);//这里是调用哪个视图并分配数据给指定视图显示
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


