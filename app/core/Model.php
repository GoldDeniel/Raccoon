<?php

class Model
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function query($query, $params = [])
    {
        return $this->db->query($query, $params);
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        return $this->query($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function where($params, $params_not = [])
    {
        $keys = array_keys($params);
        $keys_not = array_keys($params_not);
        $query = "SELECT * FROM " . $this->table . " WHERE ";
        $str = '';

        foreach ($keys as $key) {
            $str .= $key . ' = :' . $key . ' AND ';
        }

        foreach ($keys_not as $key) {
            $str .= $key . ' != :' . $key . ' AND ';
        }

        $query .= trim($str, ' AND ');
        return $this->query($query, $params);
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $fields = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);

        $query = "INSERT INTO " . $this->table . " ($fields) VALUES ($placeholders)";
        return $this->query($query, $data);
    }

    public function update($id, $data)
    {
        $keys = array_keys($data);
        $fields = '';

        foreach ($keys as $key) {
            $fields .= $key . ' = :' . $key . ', ';
        }

        $fields = rtrim($fields, ', ');

        $query = "UPDATE " . $this->table . " SET $fields WHERE id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }
}