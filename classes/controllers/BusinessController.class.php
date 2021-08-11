<?php

class BusinessController extends BusinessModel{
    
    public function getBusinesses($extras = "ORDER BY id DESC", $callback = "allResults"){
        return $this->businesses($extras, $callback);
    }

    public function recentBusinesses($extras = "ORDER BY id DESC LIMIT 3", $callback = "allResults"){
        return $this->businesses($extras, $callback);
    }

    public function userBusinesses($id, $callback = "allResults"){
        return $this->businesses($extras = "WHERE user_id = $id ORDER BY id DESC", $callback);
    }

    public function categoryBusinesses($id, $callback = "allResults"){
        return $this->businesses($extras = "WHERE category = $id ORDER BY name ASC", $callback);
    }

    public function getBusiness($slug, $callback = "singleResult"){
        return $this->business($slug, $callback);
    }

    public function addListing($userId, $name, $slug, $email, $phone, $address, $category, $workStart, $workEnd, $description, $logo, $image){
        return $this->addBusiness($userId, $name, $slug, $email, $phone, $address, $category, $workStart, $workEnd, $description, $logo, $image);
    }

    protected function addSearchResult($array, $result){
        if(!isset($array[$result['id']])){
            $array[$result['id']] = $result;
            $array[$result['id']]['count'] = 1;
        } else {
            $array[$result['id']]['count'] = $array[$result['id']]['count'] + 1;
        }
        return $array;
    }

    public function businessSearch($search, $location = "Lagos"){
        $result = [];
        $searchArray = explode(' ', $search);

        $query1 = $this->businesses("WHERE (LOWER(name) LIKE '%$search%' OR LOWER(description) LIKE '%$search%') AND address LIKE '%$location%' ORDER BY RAND()", "allResults");
        if($query1 !== false){
            foreach($query1 AS $query){
                $result = $this->addSearchResult($result, $query);
            }
        }
        foreach($searchArray AS $word){
            $query2 = $this->businesses("WHERE (LOWER(name) LIKE '%$word%' OR LOWER(description) LIKE '%$word%') AND address LIKE '%$location%' ORDER BY RAND()", "allResults");
            if($query2 !== false){
                foreach($query2 AS $query){
                    $result = $this->addSearchResult($result, $query);
                }
            }
        }

        if(sizeof($result) > 0){
            foreach($result AS $key => $item){
                $value[$key] = $item['count'];
            }

            array_multisort($value, SORT_DESC, $result);
        }

        return $result;
        // return $query1;
    }

}