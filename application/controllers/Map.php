<?php
class Map extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pregnant_model');
		$this->load->library('session');
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			if ($this->input->post('username') != null && $this->input->post('username') !== $this->input->post('password')){
				$this->session->set_userdata('name', $this->input->post('username'));
				$this->session->set_userdata('loggedin', true);
			}
			else if ($this->input->post('lat') !== null && $this->input->post('lat') !== null && $this->input->post('severity') !== null && $this->input->post('name') !== null){
				$data = array(
					'lat' => $this->input->post('lat'),
					'lng' => $this->input->post('lng'),
					'severity' => $this->input->post('severity'),
					'name' => $this->input->post('name')
				);
				$this->Pregnant_model->add_pregnant($data);
			}
		}
		if ($this->session->userdata('loggedin') == null){
			$this->load->view('header.php');
			$this->load->view('login');
			$this->load->view('footer.php');
			return;
		}
	}

	public function index()
	{
		if ($this->session->userdata('loggedin') !== null){
			$data = [
				'title' => "Driver Mode"
			];
			
			$data['markers'] = $this->Pregnant_model->get_all_pregnant();
			
			$this->load->helper('url');
			$this->load->helper('ip');

			$this->load->view('header');
			if($this->session->loggedin == true){

			}
			$this->load->view('map', $data);
			$this->load->view('footer');
		}
	}
}
?>
