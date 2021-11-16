<?php
 
class Goflux_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function table_embarcador() {

        $query = 'SELECT * FROM embarcador';

        return $this->db->query($query)->result_array();
    }

    function save_embarcador($json) {
        
        if($json->id == null) {

            $params = [
                "name" => $json->name,
                "doc" => $json->doc,
                "about" => $json->about,
                "active" => $json->active,
                "site" => $json->site
            ];

            $this->db->insert('embarcador', $params);
            $id = $this->db->insert_id();

        } else {

            $where_params = array(
                'id' => $json->id
            );
    
            $params = [
                "name" => $json->name,
                "doc" => $json->doc,
                "about" => $json->about,
                "active" => $json->active,
                "site" => $json->site
            ];
    
            $this->db->where($where_params);
            $this->db->update('embarcador', $params);
        }
    }

    function delete_embarcador($id = 0) {
        
        $res = $this->db->delete('embarcador',array('id' => $id));

        return $res;
    }

    function table_oferta() {

        $query = 'SELECT * FROM oferta';

        return $this->db->query($query)->result_array();
    }

    function save_oferta($json) {
        
        if($json->id == null) {

            $params = [
                "id_customer" => $json->id_customer,
                "from" => $json->from,
                "to" => $json->to,
                "initial_value" => $json->initial_value,
                "amount" => $json->amount,
                "amount_type" => $json->amount_type,
            ];

            $this->db->insert('oferta', $params);
            $id = $this->db->insert_id();

        } else {

            $where_params = array(
                'id' => $json->id
            );
    
            $params = [
                "id_customer" => $json->id_customer,
                "from" => $json->from,
                "to" => $json->to,
                "initial_value" => $json->initial_value,
                "amount" => $json->amount,
                "amount_type" => $json->amount_type,
            ];
    
            $this->db->where($where_params);
            $this->db->update('oferta', $params);
        }
    }

    function delete_oferta($id = 0) {
        
        $res = $this->db->delete('oferta',array('id' => $id));

        return $res;
    }

    function table_lance() {

        $query = 'SELECT * FROM lance';

        return $this->db->query($query)->result_array();
    }

    function save_lance($json) {
        
        if($json->id == null) {

            $params = [
                "id_provider" => $json->id_provider,
                "id_offer" => $json->id_offer,
                "value" => $json->value,
                "amountv" => $json->amountv
            ];

            $this->db->insert('lance', $params);
            $id = $this->db->insert_id();

        } else {

            $where_params = array(
                'id' => $json->id
            );
    
            $params = [
                "id_provider" => $json->id_provider,
                "id_offer" => $json->id_offer,
                "value" => $json->value,
                "amountv" => $json->amountv
            ];
    
            $this->db->where($where_params);
            $this->db->update('lance', $params);
        }
    }

    function delete_lance($id = 0) {
        
        $res = $this->db->delete('lance',array('id' => $id));

        return $res;
    }

}

?>