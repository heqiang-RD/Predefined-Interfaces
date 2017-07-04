<?php

class loadConfig implements \ArrayAccess{

    // 数据存放
    protected $arrays = array();
    // 初始化
    public function __construct(array $arr) {
        $this->arrays = $arr;
    }
    // isset元素时触发该方法
    public function offsetExists($offset) {
        return isset($this->arrays[$offset]);
    }
    // 获取一个数组元素时触发
    public function offsetGet($offset) {
        return $this->arrays[$offset];
    }
    // 设置一个数组元素时触发
    public function offsetSet($offset, $value) {
        if(is_null($offset)) {
            $this->arrays[] = $value;
        }else{
            $this->arrays[$offset] = $value;
        }
    }
    // unset一个数组元素时触发
    public function offsetUnset($offset) {
        unset($this->arrays[$offset]);
    }

}

$config = new loadConfig(range('a','f'));

// 检测数组元素是否否在 自动调用offsetExists
var_dump(isset($config[1]));
// 获取数组元素 自动调用offsetGet
var_dump($config[1]);
// 新增数组元素 自动调用offsetSet
$config[] = 'new element';
// 删除数组元素 自动调用offsetUnset
unset($config[1]);