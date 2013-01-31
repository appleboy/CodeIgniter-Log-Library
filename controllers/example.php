<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Log Library
 *
 * @category   Exceptions
 * @package    CodeIgniter
 * @subpackage Controller
 * @author     Bo-Yi Wu <appleboy.tw@gmail.com>
 * @license    BSD License
 * @link       https://github.com/appleboy/CodeIgniter-Log-Library
 */
class Example extends CI_Controller
{
    /**
     * constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // load from spark
        //$this->load->spark('codeigniter-log/1.0.0');
        // load from CI library
        $this->load->library('lib_log');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        echo $a;
        trigger_error("User error via trigger.", E_USER_ERROR);
        trigger_error("Warning error via trigger.", E_USER_WARNING);
        trigger_error("Notice error via trigger.", E_USER_NOTICE);
        echo $this->inverse(5) . "\n";
        echo $this->inverse(0) . "\n";
    }

    /**
     * inverse method
     *
     * @param int $x an integer value
     *
     * @return int
     */
    public function inverse($x)
    {
        if (!$x) {
            throw new Exception('Error: Division by zero.', E_USER_ERROR);
        } else {
            return 1/$x;
        }
    }
}
/* End of file example.php */
/* Location: ./application/controllers/example.php */
