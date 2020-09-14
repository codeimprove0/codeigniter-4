<?php 
namespace App\Controllers;

class Demo extends BaseController {
    public function __construct()
    {
        //
    }
    public function index()
    {
        echo "Index";
    }
    public function new()
    {
        echo "new";
    }
    public function create()
    {
        echo "create";
    }
    public function edit($id)
    {
        echo "Edit $id";
    }
    public function show($id)
    {
        echo "Show $id";
    }
    public function update($id)
    {
    }
    public function delete($id)
    {
        //
    }
}