<?php

/**
 * 不论何时，只要有实例需要被序列化，serialize 方法都将被调用。
 * 当数据被反序列化时，类将被感知并且调用合适的 unserialize() 方法而不是调用 __construct()。
 */


class Example implements Serializable {
    private $data;
    public function __construct($param) {
        $this->data = $param;
    }

    /**
     * 在序列化对象时被调用,__destruct() 方法将不会被调用
     * @return string 返回对象的字符串表示。
     */
    public function serialize() {
        return serialize($this->data);
    }

    /**
     * 在反序列化对象时被调用,__construct()将不会被调用
     * @param string $serialized
     * @return 返回没有序列化之前的原始值。
     */
    public function unserialize($serialized) {
        $this->data = unserialize($serialized);
    }

    // 自定义获取数据方法
    public function getData() {
        return $this->data;
    }
}

$obj = new Example('abcdef');
// serialize 方法被调用
$ser = serialize($obj);

// unserialize方法将被调用,构造函数不被调用
$newobj = unserialize($ser);

var_dump($newobj->getData());