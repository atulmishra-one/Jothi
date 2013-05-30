<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if( ! $this->session->userdata('validated') )
		{
			redirect(site_url('admin'), 'redirect');
		}
		$this->load->model('admin/categories_model', 'cat');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		$total = $this->cat->getTotal();
		
		$config['base_url'] = base_url().'admin/categories/index/page';
		$config['total_rows'] = $total;
		
		$config['full_tag_open'] = '<div class="pagination pagination-mini"><ul>';
		
		$config['prev_link'] = '&laquo;&nbsp;Prev';
		$config['next_link'] = '&nbsp;Next &raquo;';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = '';
		$config['first_link'] = '';
		
	    $config['full_tag_close'] = '<ul></div><!--CLOSE PAGINATION-->';
		
		
		$config['per_page'] = 16;
		$config["uri_segment"] = 5;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0 ;
		
		
		$data = array (
		'total'=> $total,
		'categories' => $this->cat->getCategories($config['per_page'], $page),
		'pagination'=>$this->pagination->create_links()
		
		);
		
		
		
		$data['content'] = $this->load->view('admin/Categories/Index', $data, true);
		
     	$this->load->view('admin/Layout', $data);
	
	}
	
	
	function do_upload($image){
		
		$config['upload_path'] = './Public/CategoriesImages/';
		$config['allowed_types'] = 'png|jpg|gif';
		$config['max_size']    = 1024*2;
		$config['max_width']  = 400;
		$config['max_height']  = 300;
 
		// You can give video formats if you want to upload any video file.
 
		$this->load->library('upload', $config);
 		$this->upload->do_upload($image);
		
	}
	
	public function add_categories()
	{
		
		if( $this->input->post('btn') )
		{
			
			$this->do_upload('image');
			
			$n = $this->upload->data();
		    $file =  $n['file_name'];
			
			
			echo $this->cat->AddCategories($file);
			exit;
		}
		$data['categories'] = $this->cat->getCat();
		
		
		$data['content'] = $this->load->view('admin/Categories/Add', $data, true);
     	$this->load->view('admin/Layout', $data);
	}
	
	public function edit($id = false)
	{
		if( !$id) {
			show_404();
		}
		
		if( $this->input->post('btn') )
		{
			if( isset ( $_FILES['image']['name'] ) and $_FILES['image']['name'] > 0)
			{
				$this->do_upload('image');
				$n = $this->upload->data();
		    	$file =  $n['file_name'];
				
				$this->cat->UpdateImage($file, $id);
			}
			
			echo $this->cat->EditCategories($id);
			
			exit;
		}
		
		
		$data['v'] = $this->cat->info($id);
		$data['categories'] = $this->cat->getCat();
		
		
		$data['content'] = $this->load->view('admin/Categories/Edit', $data, true);
     	$this->load->view('admin/Layout', $data);
	}
	
	function delete($id)
	{
		$this->cat->delete($id);
	}
	
	
	
}