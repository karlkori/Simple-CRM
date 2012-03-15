<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simple CRM
 *
 * @package     Simple CRM
 * @author      karlkori
 * @copyright   Copyright (c) 2012, karlkori.name.
 * @license     
 * @link        https://github.com/karlkori/Simple-CRM
 * @since       Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Layout Class
 */
class Mylayout {

    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    // пути к файлам вида
    public $header = 'header';
    public $footer = 'footer';

    // метод получает на вход два параметра: название вида и данные для него
    public function content($views = '', $data = '')
    {
        // загружаем header
        if ($this->header)
        {
            $this->load->view($this->header, $data);
            $data = '';
        }

        // загружаем основной контент, который может иметь больше одного вида
        if (is_array($views))
        {
            foreach ($views as $view)
            {
                $this->load->view($view, $data);
                $data = '';
            }
        }
        else
        {
            $this->load->view($views, $data);
        }

        // загружаем footer
        if ($this->footer)
        {
            $this->load->view($this->footer);
        }
    }
}
