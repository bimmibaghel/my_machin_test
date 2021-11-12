<?php 
class File_lib 
{
	public function __construct()
	{
		$this->CI=get_instance();
	}
	function upload_image($upPath, $name,$type) 
	{
		$basePath 					= explode('application',dirname(__FILE__))[0];
        $uploadPath              	= $basePath . $upPath;
        $config['upload_path']   	= $uploadPath;
        $config['allowed_types'] 	= $type;
		$config['encrypt_name'] = TRUE;
        $this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
        if ($this->CI->upload->do_upload($name)) {	
            $uploaddata    = $this->CI->upload->data();
           return $uploaddata;
        } else {
            
            return '';
        }
		//return $upPath;
    }
}
?>