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
	public function index()
	{
		$this->data['clients'] = $this->clients_model->get_list();
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
			$this->clients_model->add( $this->input->post('id'), $client );
			redirect('clients');
		}
		$this->data['form_action'] = 'clients/edit/' . $id;			
		$this->layout->render('clients/edit', $this->data);
	}	
}

/* End of file clients.php */
/* Location: ./application/controllers/clients.php */