<?php

    
class HomeModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    // public function aaa(){

    //     $sql = "Select e.nombre, e.email, e.sexo, a.nombre as 'area' from empleados e
    //     inner join areas a on e.area_id = a.id";
    //     $datos = $this->db->query($sql);

    //     $datos->result();

    //     return $datos;
    // }

    public function showArea(){
        $datos = $this->db->get('areas');

        $datos->result();

        return $datos->result_object;
    }

    public function showRol(){
        $datos = $this->db->get('roles');

        $datos->result();

        return $datos->result_object;
    }

    public function insertEmpleados($data){

        $datos = array(
            'nombre' => $this->db->escape($data['nombre']),
            'email' => $this->db->escape($data['email']),
            'sexo' => $this->db->escape($data['sexo']),
            'area_id' => $this->db->escape($data['area_id']),
            'boletin' => $this->db->escape($data['descripcion'])
        );
        
        $datos = $this->db->insert('empleados',$data);
    }

    public function insertEmpleadoRol(){
        $datos = $this->db->query('select id,area_id from empleados order by id desc');
        $datos->result();

        

        $data = array(
            'empleado_id' => $datos->result_object[0]->id,
            'rol_id' => $datos->result_object[0]->area_id
        );

        $this->db->insert('empleado_rol',$data);
    }

    public function showEmpleadosALL(){
        $sql = "Select e.id, e.nombre, e.email, e.sexo, e.boletin, a.nombre as 'area' from empleados e
        inner join areas a on e.area_id = a.id";
        
        $datos = $this->db->query($sql);

        $datos->result();

        return $datos;
    }

    public function showEmpleado($id){
        $sql = "Select e.id, e.nombre, e.email, e.sexo, e.boletin, e.descripcion, a.nombre as 'area' from empleados e
        inner join areas a on e.area_id = a.id
        where e.id = $id";
        
        $datos = $this->db->query($sql);

        $datos->result();

        return $datos->result_object;
    }

    public function update($data){

        // var_dump($data);
        // die;
        $this->db->where('id', $data['id']);
        $this->db->update('empleados', $data);
    }

    public function deleted($id){
        $this->db->where('id', $id);
        $this->db->delete('empleados');
    }
}