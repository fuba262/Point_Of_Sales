<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class connect_db extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM your_table');
        $results = $query->getResult();
        
        foreach ($results as $row)
        {
            echo $row->column_name;
        }
    }
}
