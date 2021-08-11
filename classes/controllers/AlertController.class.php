<?php

class AlertController {

    public function alert($alert){
        return "<script> alert('".$alert."'); </script>";
    }

}