<?php

//必须由 IteratorAggregate 或 Iterator 接口实现
class myTraversable implements IteratorAggregate{

    public function getIterator(){

    }
}

$class = new myTraversable();

//检测一个类是否可以使用 foreach 进行遍历的接口
if($class instanceof Traversable) {
    echo '...';
}