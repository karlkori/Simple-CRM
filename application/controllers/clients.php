<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	/**
	 * Масив переменных для передачи в шаблон
	 * @var array
	 */
	public $data = array();

	/**
	 * Подключаем необходимые для роботы модели ...
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model');
		$this->load->model('clients_model');
		$this->data['title'] = 'Полиграфия / Клиенты';
		//$this->output->enable_profiler('TRUE');
	}


	/**
	 * Выводим список клиентов
	 * 
	 */
	public function display($sort_by='name', $sort_order='asc', $offset = 0)
	{
		$limit = 10;
		$this->data['fields'] = array(
			'name' => 'Название',
			'contactname' => 'Контактное лицо',
			'tel' => 'Телефоны',
			'email' => 'Е-почта',
			'address' => 'Адрес',
			'description' => 'Примечание'
			);
		$this->data['sort_by'] = $sort_by;
		$this->data['sort_order'] = $sort_order;
		$this->data['clients_count'] = $this->clients_model->get_count();
		$this->load->library('pagination');
		$config = array(
			'base_url' => site_url("clients/display/$sort_by/$sort_order"),
			'total_rows' => $this->data['clients_count'],
			'per_page' => $limit,
			'uri_segment' => 5,
			'full_tag_open' => '<div class="pagination"><ul>',
			'full_tag_close' => '</ul></div>',
			'first_link' => '<li>Первая</li>',
			'last_link' => '<li>Последняя</li>',
			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'prev_link' => '&lt;',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>'
		);			
		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['clients'] = $this->clients_model->get_list($limit, $offset, $sort_by, $sort_order);

		$this->layout->render('clients/list', $this->data);
	}

	/**
	 * Выводим и обрабатываем форму для редактирования данных клиента
	 */
	public function edit()
	{
		$id = $this->uri->segment(3, 0);
		$id = (int)$id;

		$this->form_validation->set_rules('name', 'Название', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$client = array(
				'name' 			=> $this->input->post('name'),
	            'contactname' 	=> $this->input->post('contactname'),
	            'tel' 			=> $this->input->post('tel'),
	            'email' 		=> $this->input->post('email'),
	            'address' 		=> $this->input->post('address'),
	            'description' 	=> $this->input->post('description'),
			);
			$this->clients_model->update( $this->input->post('id'), $client );
			redirect('clients');
		}
		
		$this->data['client'] = $this->clients_model->get_by_id($id);
		
		if ($this->data['client']  == null)
		{
			$this->data['msg'] = 'Ничего не найденно.';
			$this->layout->render('error', $this->data);
		}
		else
		{
			$this->data['form_action'] = 'clients/edit/' . $id;			
			$this->layout->render('clients/edit', $this->data);
		}
	}

	/**
	 * Выводим и обрабатываем форму для нового клиента
	 */
	public function add()
	{
		$this->form_validation->set_rules('name', 'Название', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$client = array(
				'name' 			=> $this->input->post('name'),
	            'contactname' 	=> $this->input->post('contactname'),
	            'tel' 			=> $this->input->post('tel'),
	            'email' 		=> $this->input->post('email'),
	            'address' 		=> $this->input->post('address'),
	            'description' 	=> $this->input->post('description'),
			);
			$this->clients_model->add( $client );
			redirect('clients');
		}
		$this->data['form_action'] = 'clients/add/';			
		$this->layout->render('clients/add', $this->data);
	}	
}

/* End of file clients.php */
/* Location: ./application/controllers/clients.php */