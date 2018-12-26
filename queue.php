<?php

include_once 'types.php';

class Queue implements iQueue {

    private $data = [];
    private $head = 0;
    private $tail = 0;
    private $length = 5;

    public function __construct($length = NULL) {
        $this->_setLength($length);
    }

    public function enqueue($item) {
        if (isset($this->data[$this->head]) && $this->tail === $this->head) {
            throw new Exception('Queue overflow');
        } 

        $this->data[$this->tail] = $item;

        if ($this->tail === $this->length - 1) {
            $this->tail = 0;
        } else {
            $this->tail++;
        }
    }

    public function dequeue() {
        if (!isset($this->data[$this->head])) {
            throw new Exception('Queue underflow');
        }

        $itemToDequeue = $this->data[$this->head];
        unset($this->data[$this->head]);

        if ($this->head === $this->length - 1) {
            $this->head = 0;
        } else {
            $this->head++;
        }

        return $itemToDequeue;
    }

    public function isEmpty() {
        return count($this->data) === 0 && $this->tail === $this->head;
    }

    private function _setLength($length) {
        if ($length !== NULL) {
            $this->_length = $length;
        }
    }
}
