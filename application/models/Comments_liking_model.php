<?php
require_once APPPATH . '/models/BaseModel.php';
class Comments_liking_model extends BaseModel
{
    protected $table = 'comment_liking';
    public function __construct()
    {
        parent::__construct();
    }
}