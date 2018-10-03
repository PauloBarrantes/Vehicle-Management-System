<?php
/**
 * User Level
 * Create by Abed Putra
 * http://abedputra.com
 * Github: https://github.com/abedputra
 * 2017
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLevel{
    public function checkLevel($rol) {
        if(!empty($rol))
        {
            if($rol == 1)
            {
                $userLevel = 'is_admin';
            }
            elseif($rol == 2)
            {
                $userLevel = 'is_user';
            }
            
        }else{
            echo "Empty Role";
            return false;
        }
        return $userLevel;
    }
}
