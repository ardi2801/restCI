<?php
require APPPATH . 'libraries/REST_Controller.php';
class CustomerApi extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Mcustomer');
	}

	public function index_get()
	{
		$response['status']=200;
		$response['error']=false;
		$response['message']='Hai from response';
		$this->response($response);
	}

	public function data_get()
	{
		$data           = $this->Mcustomer->getData();
		$response = array(
			'status' => array(
				'code'     => 200,
				'response' => 'success',
				'message'  => 'Semua Data'
			),
			'result' => $data
		);    
		$this->response($response);
	}

	public function detail_get($id)
	{
		$data           = $this->Mcustomer->getData_id($id);
		$response = array(
			'status' => array(
				'code'     => 200,
				'response' => 'success',
				'message'  => ''
			),
			'result' => $data
		);    
		$this->response($response);
	}	

	public function insert_post(){
		$data_store = array
		(
			'name'       => $this->post('name'),
			'email'      => $this->post('email'),
			'password'   => $this->post('password'),
			'gender'     => $this->post('gender'),
			'is_married' => $this->post('married'),
			'address'    => $this->post('address')
		);

		$data = $this->Mcustomer->add_data($data_store);
		$response = array(
			'status' => array(
				'code'     => $data['code'],
				'response' => $data['response'],
				'message'  => $data['message'],
			),
			'result' => $data['data']
		);    
		$this->response($response);
	}
	
	public function update_post(){
		$data_store = array
		(
			'name'       => $this->post('name'),
			'email'      => $this->post('email'),
			'password'   => $this->post('password'),
			'gender'     => $this->post('gender'),
			'is_married' => $this->post('married'),
			'address'    => $this->post('address')
		);

		$data_arg = array('id'=>$this->post('id'));
		$data = $this->Mcustomer->update_data($data_store,$data_arg);
		$response = array(
			'status' => array(
				'code'     => $data['code'],
				'response' => $data['response'],
				'message'  => $data['message'],
			),
			'result' => $data['data']
		);    
		$this->response($response);
	}	

	public function delete_post()
	{
		$data_arg = array('id'=>$this->post('id'));		
		$data = $this->Mcustomer->delete_data($data_arg);
		$response = array(
			'status' => array(
				'code'     => $data['code'],
				'response' => $data['response'],
				'message'  => $data['message'],
			),
			'result' => $data['data']
		);    
		$this->response($response);
	  }	

}

?>
