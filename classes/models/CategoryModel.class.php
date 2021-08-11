<?php

class CategoryModel extends Config {

    protected function categories($callback){
        $query = $this->query("SELECT * FROM categories", null, $callback);
        return $query;
    }

    protected function category($id, $callback){
        $query = $this->query("SELECT * FROM categories WHERE id = ? OR slug = ? ORDER BY `name` ASC", [$id, $id], $callback);
        return $query;
    }

}