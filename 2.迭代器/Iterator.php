<?php

class myIterator implements Iterator {

    //数据
    protected $data = array();

    //初始化数据
    public function __construct(array $array) {
        $this->data = $array;
    }

    //1.键初始化
    public function rewind() {
        reset($this->data);
    }

    //2.数据是否遍历结束
    public function valid() {
        return key($this->data) !== null;
    }

    //3.当前操作
    public function current() {
        return current($this->data);
    }

    //4.当前键
    public function key() {
        return key($this->data);
    }

    //5.下一步操作
    public function next() {
        next($this->data);
    }

}

$arr = ['one','two','three','four','five'];
$class = new myIterator($arr);

//example 1 : foreach
foreach ($class as $k=>$v) {
    echo $k.'=>'.$v.PHP_EOL;
}

//example 2 : while
$class->rewind();
while ($class->valid()) {
    $key = $class->key();            //key
    $value = $class->current();      //value
    echo $key.'=>'.$value.PHP_EOL;
    $class->next();                  //next
}

//example 3 : for
for ($class->rewind(); $class->valid(); $class->next()) {
    try {
        $key = $class->key();
        $value = $class->current();
        echo $key.'=>'.$value.PHP_EOL;
    } catch (Exception $exception) {
        continue;
    }
}