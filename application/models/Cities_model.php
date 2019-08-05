<?php
require_once APPPATH.'/models/BaseModel.php';
class Cities_model extends BaseModel {
    protected $table = 'cities';
    
    public function __construct() {
        parent::__construct();
    }
}