<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller 
{

	function __construct()


	{

		parent::__construct();

        $this->load->model('master_model');
        $this->load->library(['File_lib'=>'Fl']);
        

	 }

	public function index()
	{
		
       $data['students']=$this->master_model->getRecords('student');
		$this->load->view('index',$data);
	
	}

	function edit()
	{
    

		if(isset($_POST['edit_btn']))

		{

			 $this->form_validation->set_rules('fname', 'Student Name', 'required');
                $this->form_validation->set_rules('about', 'About Student', 'required');

                if ($this->form_validation->run() == TRUE)
                {
					$image = $this->input->post('old_img');
					$id = $this->input->post('sid');

					$input_arr = array( 'name'=>$this->input->post('fname'),

					                    'text'=>$this->input->post('about'),
							
								      );

					if(isset($_FILES['image']) && $_FILES['image']['name'] !='')

					{	
					

						 $img_resp = $this->Fl->upload_image('uploads/','image','jpg|png|jpeg|JPG|PNG|JPEG');   
						if($img_resp)
						{
							
							echo $input_arr['file']= 'uploads/'.$img_resp['file_name']; 

						}else
						{
							echo'failed';
								$this->session->set_flashdata('error','File Uploading Error.');
						}

					

					} 

					$res=$this->master_model->updateRecord('student',$input_arr,array('id'=>$id));

						if($res==true)

						{

							$this->session->set_flashdata('success','Updated Successfully');

						    redirect(base_url().'student');

						}
						else

						{

						$this->session->set_flashdata('error','Error in Updation');

						redirect(base_url().'student');    

						}
                }else
                {
                	//validation err;
                	$this->session->set_flashdata('error','validation Error');

						redirect(base_url().'student');  
                }
			 // print_r($_FILES);
		


	   }//btn
    }


    function delete()
    {
    	 $id= $this->input->post('id');
    	if($id)
    	{
    		$dlt = $this->master_model->deleteRecord('student','id',$id);
    		if($dlt)
    		{
    			$res = array('msg'=>'ok','status'=>1);
    		}else
    		{
    			$res = array('msg'=>'err','status'=>0);

    		}

    		echo json_encode($res);
    	}
    }
}//class
