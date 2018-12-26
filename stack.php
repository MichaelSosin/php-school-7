<?php

include 'types.php';

class Stack implements iStack {
    
    private $_data = [];
    private $_length = 5;
    private $_topIndex = -1; 
    
    public function __construct($length = NULL) {
        $this->_setLength($length);
    }

    public function push($item) {
        if ($this->_topIndex >= $this->_length) {
            throw new Exception('Stack overflow');
        }

        $this->_data[] = $item;
        $this->_topIndex++;
    }

    public function pop() {
        if ($this->isEmpty()) {
            throw new Exception('Stack underflow');
        }

        $itemToPop = $this->_data[$this->_topIndex];
        unset($this->_data[$this->_topIndex]);

        $this->_topIndex--;
        return $itemToPop;
    }

    public function top() {
        if ($this->isEmpty()) {
            throw new Exception('Stack is empty');
        }

        return $this->_data[$this->_topIndex];
    }

    public function isEmpty() {
        return $this->_topIndex <= -1;
    }

    private function _setLength($length) {
        if ($length !== NULL) {
            $this->_length = $length;
        }
    }
}
