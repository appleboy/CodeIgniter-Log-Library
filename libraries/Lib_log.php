<?php
/**
 * CodeIgniter Log Library
 *
 * @category   Applications
 * @package    CodeIgniter
 * @subpackage Libraries
 * @author     Bo-Yi Wu <appleboy.tw@gmail.com>
 * @license    BSD License
 * @link       http://blog.wu-boy.com/
 * @since      Version 1.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_log
{
    /**
     * ci
     *
     * @param instance object
     */
    private $_ci;

    /**
     * log table name
     *
     * @param string
     */
    private $_log_table_name;

    /**
     * constructor
     *
     */
    public function __construct()
    {
        $this->_ci =& get_instance();
        set_error_handler(array($this, 'error_handler'));
        set_exception_handler(array($this, 'exception_handler'));
        // Load database driver
        $this->_ci->load->database();
        // Load config file
        $this->_ci->load->config('log');
        $this->_log_table_name = ($this->_ci->config->item('log_table_name')) ? $this->_ci->config->item('log_table_name') : 'logs';
    }

    /**
     * PHP Error Handler
     *
     * @param   int
     * @param   string
     * @param   string
     * @param   int
     * @return  void
     */
    public function error_handler($severity, $message, $filepath, $line)
    {
        $data = array(
            'errno' => $severity,
            'errstr' => $message,
            'errfile' => $filepath,
            'errline' => $line,
            'time' => date('Y-m-d H:i:s')
        );

        $this->_ci->db->insert($this->_log_table_name, $data);
        var_dump($data);
    }

    /**
     * PHP Error Handler
     *
     * @param   object
     * @return  void
     */
    public function exception_handler($exception)
    {
        $data = array(
            'errno' => $exception->getCode(),
            'errstr' => $exception->getMessage(),
            'errfile' => $exception->getFile(),
            'errline' => $exception->getLine(),
            'time' => date('Y-m-d H:i:s')
        );

        $this->_ci->db->insert($this->_log_table_name, $data);
    }
}

/* End of file Lib_log.php */
