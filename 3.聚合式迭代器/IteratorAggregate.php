<?php

class myData implements \IteratorAggregate {

    public $str = 'one';
    public $arr = array('a','b','c','d');

    /**
     * 获取一个外部迭代器
     * @return ArrayIterator 返回一个外部迭代器。
     */
    public function getIterator() {
        return new \ArrayIterator($this);
    }

}

$obj = new myData();
foreach ($obj as $k=>$v) {
    var_dump($k,$v,'——————');
}