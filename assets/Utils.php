<?php

namespace app\assets;

use yii\helpers\Html;

class Utils
{
    
    public function changeButton($char){
        switch ($char) {
            case "p":
                $alias = 'Pending';
                break;
            case "a":
                $alias = 'Assigned';
                break;
            case "o":
                $alias = 'On Route';
                break;
            case "d":
                $alias = 'Done';
                break;
            case "c":
                $alias = 'Cancelled';
                break;
        }
        return $alias;
    }
    
    public function changeButtonColor($char){
        switch ($char) {
            case "p":
                $alias = 'default';
                break;
            case "a":
                $alias = 'primary';
                break;
            case "o":
                $alias = 'warning';
                break;
            case "d":
                $alias = 'success';
                break;
            case "c":
                $alias = 'danger';
                break;
        }
        return $alias;
    }

}
