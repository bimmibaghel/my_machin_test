
<?php

if( !defined('BASEPATH')) exit('No direct script access alloed');


class Master_model extends CI_Model

{

	


	public function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$start=FALSE,$limit=FALSE)

	{

		if($select!="")

		{$this->db->select($select);}

		if($condition && $condition!="")

	{ $condition=$condition; }


		else

	{$condition=array();}



		if($order_by && $order_by!="")

		{


		foreach($order_by as $key=>$val)


			{$this->db->order_by($key,$val);}

		}


		if($limit!="" || $start!="")



		{ $this->db->limit($limit,$start);}


		$rst=$this->db->get_where($tbl_name,$condition);



		return $rst->result_array();



	}


	public function getRecord($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$start=FALSE,$limit=FALSE)

	{

		if($select!="")


		{$this->db->select($select);}


		if($condition && $condition!="")


		{ $condition=$condition; }

		else

		{$condition=array();}


		if($order_by && $order_by!="")

		{

			foreach($order_by as $key=>$val)


			{$this->db->order_by($key,$val);}


		}


		if($limit!="" || $start!="")


		{ $this->db->limit($limit,$start);}


		$rst=$this->db->get_where($tbl_name,$condition);

	return $rst->row_array();


	}

	


	public function updateRecord($tbl_name,$data_array,$where_arr)

	{

		$this->db->where($where_arr,NULL,FALSE);

	   if($this->db->update($tbl_name,$data_array))

		{return true;}

		else


		{return false;}



	}



	public function deleteRecord($tbl_name,$pri_col,$id)

	{

		$this->db->where($pri_col,$id);

		if($this->db->delete($tbl_name))


		{return true;}


		else


		{return false;}


	}



}//class


