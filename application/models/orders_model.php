<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends Crud_model {

    /**
     * Название таблици базы данных с данными заказов.
     *
     * @var string
     */
    public $table = 'orders';

    /**
     * Додать клиента
     *
     * @param array $data данные о заказе
     * @return int id заказа
     */
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Получить список заказов
     *
     * @param  int $limit
     * @param  int $offset
     * @param  string $sort_by  поле для сортировки
     * @param  string $sort_order сортировать по возростанию или по спаданию
     * @return array
     */
    public function get_list($limit, $offset, $sort_by, $sort_order, $filter = false)
    {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('name', 'client_id', 'service_id', 'date_order', 'date_done', 'printing', 'price_client', 'description');
        $sort_by = in_array($sort_by, $sort_columns) ? $sort_by : 'id';

        $this->db->select('clients.name, orders.id, orders.service_id, orders.printing, orders.date_order, orders.date_done, orders.price_client')
                ->join('clients', 'orders.client_id = clients.id')
                ->order_by($sort_by, $sort_order)
                ->limit($limit, $offset);
        if ($filter) $this->db->where('orders.client_id = '.$filter);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    /**
     * Получить количество заказов
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


/* End of file orders_model.php */
/* Location: ./application/models/orders_model.php */