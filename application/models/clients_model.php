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
     * Поулчить список клиентов
     * 
     * @param  string $sort  поле для сортировки
     * @param  string $order сортировать по возростанию или по спаданию
     * @return array
     */
    public function get_list($limit, $offset, $sort = 'id', $order = 'asc')
    {
        $this->db->order_by($sort, $order)
            ->limit($limit, $offset);
        $query = $this->db->get($this->table);
        return $query->result_array();
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