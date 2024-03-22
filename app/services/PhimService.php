<?php

namespace App\Services;

use App\Core\App;

class PhimService
{
    private $database;
    function __construct($db)
    {
        $this->database = $db;
    }
    public function getPhimDangChieu()
    {
        $phims = $this->database->selectAll('Phim');
        return $phims;
    }
}
