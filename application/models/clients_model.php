<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients_model extends Crud_model {

    /**
     * Название таблици базы данных с данными клиентов.
     *
     * @var string 
     */
	public $table = 'clients';

    /**
     * Додать клиента
     *
     * @param array $data данные о клиенте
     * @return int id клиента
     */
    public function add($data)
	{
    	$this->db->insert($this->table, $data);
        return $this->db->insert_id();
	}
	
    /**
     * Получить список клиентов
     *
     * @param  int $limit 
     * @param  int $offset 
     * @param  string $sort_by  поле для сортировки
     * @param  string $sort_order сортировать по возростанию или по спаданию
     * @return array
     */
    public function get_list($limit, $offset, $sort_by, $sort_order)
    {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('id', 'name', 'contactname', 'tel', 'email', 'address', 'description');
        $sort_by = in_array($sort_by, $sort_columns) ? $sort_by : 'id';
 
        $this->db->order_by($sort_by, $sort_order)
            ->limit($limit, $offset);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * Получит список имен клиентов с Id для построения select
     * @param string $sort_by
     * @param string $sort_order
     * @return array
     */
    public function get_names($sort_by = 'id', $sort_order = 'asc')
    {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('id', 'name');
        $sort_by = in_array($sort_by, $sort_columns) ? $sort_by : 'id';

        $this->db->select('id, name');
        $this->db->order_by($sort_by, $sort_order);
            //->limit($limit, $offset);
        $query = $this->db->get($this->table);

        $data =array();

        foreach($query->result_array() as $row){
            $data[$row['id']] = $row['name'];
        }
        return $data;
    }

    /**
     * Поулчить количество клиентов
     * 
     * @return int
     */
    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Обновить данные клиента
     * 
     * @param  int $id   
     * @param  [array $data информация о клиенте
     * @return ничего не возвращаем
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    /**
     * Удалить клиента по его ID
     * @param  int $id 
     * @return ничего не возвращаем
     */
	public function delete($id)
	{
        if ($id != NULL)
        {
            $this->db->where('id', $id);                    
            $this->db->delete($this->table);                        
        }
	}

    /**
     * Получить данные о клиенте по его ID
     * 
     * @param  int $id 
     * @return array 
     */
    public function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

}


/* End of file clients_model.php */
/* Location: ./application/models/clients_model.php */