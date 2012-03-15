<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public $table = '';

	public function insert($data)
	{
    	$this->db->insert($this->table, $data);
        return $this->db->insert_id();
	}
	
    public function select($sort = 'id', $order = 'asc')
    {
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
	
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

	public function delete($id)
	{
        if ($id != NULL)
        {
            $this->db->where('id', $id);                    
            $this->db->delete($this->table);                        
        }
	}
}

/* End of file crud_model.php */
/* Location: ./application/models/crud_model.php */