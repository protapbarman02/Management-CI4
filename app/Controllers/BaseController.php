<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    public function getFilteredData($model,$columns,$searchColumns){
        // DataTable parameters
        $draw = $this->request->getGet('draw');
        $start = $this->request->getGet('start');
        $length = $this->request->getGet('length');
        $search = $this->request->getGet('search')['value'];

        // Ordering parameters
        $order = $this->request->getGet('order')[0] ?? null;
        if ($order && isset($order['column'])) {
            $orderColumn = $order['column'];
            $orderDir = $order['dir'];
            $orderBy = $columns[$orderColumn];
        }
        else{
            $orderDir = 'asc';
            $orderBy = 'id';
        }

        // Query to fetch data with filtering, sorting, and pagination
        $totalRecords = $model->countAllResults();

        if ($search) {
            $model->groupStart();
            foreach ($searchColumns as $column) {
                $model->orLike($column, $search);
            }
            $model->groupEnd();
        }

        $totalFilteredRecords = $model->countAllResults(false);

        $users = $model->orderBy($orderBy, $orderDir)->findAll($length, $start);

        // Response structure
        $data = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFilteredRecords,
            'data' => $users
        ];
        return $data;
    }
    
    public function baseCreate(){
        return true;
    }
    
}
