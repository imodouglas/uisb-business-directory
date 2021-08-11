<?php

class CategoryController extends CategoryModel{
    
    public function getCategories($callback = "allResults"){
        return $this->categories($callback);
    }

    public function getCategory($id, $callback = "singleResult"){
        return $this->category($id, $callback);
    }

}