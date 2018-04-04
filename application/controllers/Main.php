<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
        {
                parent::__construct();
                $this->load->model('TimelineModel');
        }

	public function home()
	{

		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run())
		{
			$this->TimelineModel->create();
			$this->session->set_flashdata('message', 'Status Posted Succesfully!');
			$data['message'] = $this->session->flashdata('message');
			$data['status'] = $this->TimelineModel->index();
			$this->load->view('layouts/top');
			$this->load->view('items/nav');
			$this->load->view('pages/timeline', $data);
			$this->load->view('layouts/bottom');
			
		}
		else
		{
			$data['message'] = $this->session->flashdata('message');
			$data['status'] = $this->TimelineModel->index();
			$this->load->view('layouts/top');
			$this->load->view('pages/timeline', $data);
			$this->load->view('layouts/bottom');

		}
	}

	public function Delete($id)
	{
		$id = $this->input->post('id');
		$this->TimelineModel->delete($id);
		$this->session->set_flashdata('message','Status has been Deleted!');
		redirect('');
	}
	public function addComment($id)
	{
		$this->form_validation->set_rules('comment','Comment','required');

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('message','Please fill the comment box before posting!');
			redirect('');
		}
		else
		{
			
			$this->TimelineModel->addComment($id);
			$this->session->set_flashdata('message','Comment Posted!');
			redirect('');
		}

		
	}

	public function ajax()
	{
		$this->load->view("ajax_view");
	}

	// This function call from AJAX
	public function user_data_submit() 
	{
		$data = array(
		'username' => $this->input->post('name'),
		'pwd'=>$this->input->post('pwd')
		);

		//Either you can print value or you can send value to database
		echo json_encode($data);
	}
}
