<?php
class Inventory_controller extends Module_controller
{
    // Require authentication
    public function __construct()
    {
        // Store module path
        $this->module_path = dirname(__FILE__) .'/';
        $this->view_path = $this->module_path . 'views/';

        if ($this->authorized()) {
            $this->connectDB();
        }
    }

    public function index()
    {
        echo "You've loaded the inventory module!";
    }

    public function get_data($serial_number = '')
    {
        // Protect this handler
        if (! $this->authorized()) {
            redirect('auth/login');
        }

        $out = Inventory_model::select('name', 'version', 'bundleid', 'path')
            ->where('inventoryitem.serial_number', $serial_number)
            ->filter()
            ->get();
        
        $obj = new View();
        $obj->view('json', array('msg' => $out));
    }
    
    /**
    * Get versions and count from an application
    *
    * @param string $app Appname
    **/
    public function appVersions($app = '')
    {
        // Protect this handler
        if (! $this->authorized()) {
            redirect('auth/login');
        }
        $app = rawurldecode($app);

        // Detect wildcard character
        if (preg_match('/[_%]/', $app)) {
            $comparator = 'like';
        }else{
            $comparator = '=';
        }

        $out = Inventory_model::selectRaw('version, COUNT(*) AS count')
            ->where('name', $comparator, $app)
            ->filter()
            ->groupBy('version')
            ->orderBy('version', 'desc')
            ->get();

        $obj = new View();
        $obj->view('json', array('msg' => $out));
    }

    public function items($name = '', $version = '')
    {
        // Protect this handler
        if (! $this->authorized()) {
            redirect('auth/login');
        }

        $data['page'] = 'clients';
        $data['scripts'] = array("clients/client_list.js");
        $data['name'] = rawurldecode($name);
        $data['version'] = rawurldecode($version);

        $obj = new View();
        $obj->view('inventory_detail_listing', $data, $this->view_path);
    }
}
