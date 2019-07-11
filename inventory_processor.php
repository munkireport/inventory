<?php

use CFPropertyList\CFPropertyList;
use munkireport\processors\Processor;

class Inventory_processor extends Processor
{

    public function run($data)
    {
        configAppendFile(__DIR__ . '/config.php');

        //list of bundleids to ignore
        $bundleid_ignorelist = is_array(conf('bundleid_ignorelist')) ? conf('bundleid_ignorelist') : array();
        $regex = '/^'.implode('|', $bundleid_ignorelist).'$/';

        // List of paths to ignore
        $bundlepath_ignorelist = is_array(conf('bundlepath_ignorelist')) ? conf('bundlepath_ignorelist') : array();
        $path_regex = ':^'.implode('|', $bundlepath_ignorelist).'$:';

        $parser = new CFPropertyList();
        $parser->parse(
            $data,
            CFPropertyList::FORMAT_XML
        );
        $inventory_list = $parser->toArray();
        if (count($inventory_list)) {
            // clear existing inventory items
            Inventory_model::where('serial_number', $this->serial_number)->delete();

            // insert current inventory items
            $save_array = [];
            foreach ($inventory_list as $item) {
                if (preg_match($regex, $item['bundleid'])) {
                    continue;
                }
                if (preg_match($path_regex, $item['path'])) {
                    continue;
                }
                $item['serial_number'] = $this->serial_number;
                if(array_key_exists('CFBundleName', $item)){
                    $item['bundlename'] = $item['CFBundleName'];
                    unset($item['CFBundleName']);
                }

                $save_array[] = $item;
            }

            // Bulk insert
            Inventory_model::insertChunked($save_array);
        }

        return $this;
    }
}
