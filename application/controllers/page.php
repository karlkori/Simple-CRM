<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

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
		//$this->output->enable_profiler('TRUE');
	}


	/**
	 * Выводим список клиентов
	 */
	public function index()
	{
		$this->data['clients'] = $this->clients_model->get_list();
		$this->layout->render('clients/list', $this->data);
	}

	/**
	 * Выводим страницу справки
	 */
	public function help()
	{
		$this->layout->render('page/help');
	}

	/**
	 * Выводим страницу настроек
	 */
	public function settings()
	{
		$this->layout->render('page/settings');
	}	
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */