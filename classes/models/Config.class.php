<?php 

class Config extends Db {
    /** Query Processors */
    protected function singleResult($query){
        if($query->rowCount() > 0){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        } else {
            return false;
        }
    }


    protected function allResults($query){
        if($query->rowCount() > 0){
            $data = $query->fetchAll();
            return $data;
        } else {
            return false;
        }
    }

    protected function queryResult($query, $callback = "boolean"){
        if($query){
            if($callback == "allResults"){
                return $this->allResults($query);
            } else if($callback == "singleResult"){
                return $this->singleResult($query);
            } else if($callback == "count"){
                return $query->rowCount();
            } else if($callback == "boolean"){
                return true;
            } else if($callback == "id"){
                return $this->conn()->lastInsertId();
            }
        } else {
            return false;
        }
    }

    protected function query($statement, $execute = "", $callback){
        $query = $this->conn()->prepare($statement);
        $query->execute($execute);
        if($query){
            return $this->queryResult($query, $callback);
        } else {
            return false;
        }
    }

    protected function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    protected function imageUpload($inputName, $inputTmp, $randImage, $dir, $minSize, $maxSize){
        // error_reporting(0);
    
        $change="";
        $abc="";
        $newfilename = "";

        $fileMaxSize = 9000;
    
        $errors=0;

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $image = $inputName;
            $uploadedfile = $inputTmp;

            if ($image)
            {
                $filename = stripslashes($inputName);

                $extension = $this->getExtension($filename);
                $extension = strtolower($extension);

                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
                {
                    $change='<div class="msgdiv">Unknown Image extension </div> ';
                    $errors=1;
                }
                else
                {

                    $size=filesize($inputTmp);
    
    
                    if ($size > $fileMaxSize*1024)
                    {
                        $change='<div class="msgdiv">You have exceeded the size limit!</div> ';
                        $errors=1;
                    }


                    if($extension=="jpg" || $extension=="jpeg" )
                    {
                        $uploadedfile = $inputTmp;
                        $src = imagecreatefromjpeg($uploadedfile);
        
                    }
                    else if($extension=="png")
                    {
                        $uploadedfile = $inputTmp;
                        $src = imagecreatefrompng($uploadedfile);
                    }
                    else
                    {
                        $src = imagecreatefromgif($uploadedfile);
                    }

                    // echo $scr;
        
                    list($width,$height)=getimagesize($uploadedfile);
        
        
                    $newwidth=$maxSize;
                    $newheight=($height/$width)*$newwidth;
                    $tmp=imagecreatetruecolor($newwidth,$newheight);
        
        
                    $newwidth1=$minSize;
                    $newheight1=($height/$width)*$newwidth1;
                    $tmp1=imagecreatetruecolor($newwidth1,$newheight1);
        
                    imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
        
                    imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
        
                    //$randImage = time().rand(1111,9999);
                    $filename = $dir. $randImage.".".$extension;
                    $newfilename = $randImage.".".$extension;
        
                    imagejpeg($tmp,$filename,100);
        
                    imagedestroy($src);
                    imagedestroy($tmp);
                    imagedestroy($tmp1);
                }
            }

            if($errors == 0){
                return $newfilename;
            } else {
                return $errors;
            }
        } else {
            return $errors;
        }
    }

    public function uploadImage($inputName, $inputTmp, $randImage, $dir, $minSize, $maxSize){
        return $this->imageUpload($inputName, $inputTmp, $randImage, $dir, $minSize, $maxSize);
    }
    
}