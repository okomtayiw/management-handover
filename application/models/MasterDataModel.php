<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MasterDataModel extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'temp_data';
    }
    
    /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
    function getRows(){
        $query = $this->db->query("SELECT * FROM temp_data ORDER BY id_temp DESC");
        return $query->result_array();
    
    }

    function cekUnit($unit){
        $query = $this->db->query("SELECT count(id_temp) as count FROM temp_data WHERE name_unit = '$unit' ");
        return $query->result_array();
    }
    
    /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
    public function insert($data = array()) {
        if(!empty($data)){
            // Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }
    
    /*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $condition array filter data
     */
    public function update($data, $unit) {
        if(!empty($data)){
            $this->db->where('name_unit', $unit);
            $this->db->update('temp_data', $data);
        }
      
    }
}