<?php

// extends class Model
class Mcustomer extends CI_Model
{

  // mengambil semua data person
	public function getData(){
		$all = $this->db->get("customer")->result();
		$response = $all;
		return $response;
	}
	
	public function getData_id($id){
		$this->db->where(array('id'=>$id));		
		$all = $this->db->get("customer")->result();
		$response = $all;
		return $response;
	}	

	// response jika field ada yang kosong
	public function empty_response(){
		$response['code']     = 502;
		$response['response'] = 'failed';
		$response['message']='Field tidak boleh kosong';
		$response['data']     = '';		
		return $response;
	}

	// function untuk insert data ke tabel tb_person
	public function add_data($data_store){

		if(empty($data_store['name']) || 
			empty($data_store['email']) || 
			empty($data_store['password']) || 
			empty($data_store['gender']) || 
			empty($data_store['is_married']) ||
			empty($data_store['address'])
		)
		{
			return $this->empty_response();
		}
		else
		{
			$insert = $this->db->insert("customer", $data_store);
			if($insert){
				$response['code']     = 200;
				$response['response'] = 'success';
				$response['message']  = 'Data ditambahkan.';
				$response['data']     = $data_store;
				return $response;
			}else{
				$response['code']     = 502;
				$response['response'] = 'failed';
				$response['message']  = 'Data gagal ditambahkan.';
				$response['data']     = '';
				return $response;
			}
		}

	}

	public function update_data($data_store,$data_arg)
	{
		if(empty($data_arg['id']))
		{
			return $this->empty_response();
		}
		else
		{	
			$this->db->where($data_arg);
			$update = $this->db->update("customer",$data_store);
			if($update)
			{
				$response['code']     = 200;
				$response['response'] = 'success';
				$response['message']  = 'Data diubah.';
				$response['data']     = $data_store;
				return $response;
			}else{
				$response['code']     = 502;
				$response['response'] = 'failed';
				$response['message']  = 'Data gagal diubah.';
				$response['data']     = '';
				return $response;
			}
		}	
	}	


	public function delete_data($data_arg){
		if(empty($data_arg['id']))
		{
			return $this->empty_response();
		}
		else
		{	
			$this->db->where($data_arg);
			$delete = $this->db->delete("customer");
			if($delete)
			{
				$response['code']     = 200;
				$response['response'] = 'success';
				$response['message']  = 'Data dihapus.';
				$response['data']     = '';
				return $response;
			}else{
				$response['code']     = 502;
				$response['response'] = 'failed';
				$response['message']  = 'Data gagal dihapus.';
				$response['data']     = '';
				return $response;
			}
		}	
	}

}

?>
