<?php
/**
 * Created by btlfe
 * User: btlfe
 * Date: 2017/8/7
 * Time: 09:49
 * LastModifyUser:btlfe
 * Time: 09:49
 */
namespace sgx\permission;

class Permission
{
    //生成hash码
    public function makeHash($value,array $options = []){
        $currentOptions = isset($options['key'])?$options['key']:'sgx';
        return hash('md5',$value . $currentOptions);
    }

    //检查hash码
    public function checkHash($value,$hashValue,array $options = []){
        $currentOptions = isset($options['key'])?$options['key']:'sgx';
        return hash('md5',$value . $currentOptions) === $hashValue;
    }


    //检查是否有权限
    public function permissionCheck($currentId,$permissionString){
        $permissionArray = explode(';',$permissionString);
        return in_array($currentId,$permissionArray);
    }


}