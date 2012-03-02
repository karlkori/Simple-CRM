<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simple CRM
 *
 * @package		Simple CRM
 * @author		karlkori
 * @copyright	Copyright (c) 2012, karlkori.name.
 * @license		
 * @link		https://github.com/karlkori/Simple-CRM
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Layout Class
 */
class Layout {

	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function render($part, $data = array())
	{
		$data['part_name'] = $part;
		$this->CI->load->view('layout', $data); 
	}

}


/* End of file layout.php */
/* Location: ./application/libraries/layout.php */