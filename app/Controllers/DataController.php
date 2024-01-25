<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\BaseBuilder;

class DataController extends Controller
{
    public function insertData()
    {
        $data = [
            ['column1' => 'value1_row1', 'column2' => 'value2_row1', 'column3' => 'value3_row1'],
            ['column1' => 'value1_row2', 'column2' => 'value2_row2', 'column3' => 'value3_row2'],
            ['column1' => 'value1_row3', 'column3' => 'value2_row3', 'column3' => 'value3_row3'],
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('table_name');
        $builder->insertBatch($data);

    }
}
