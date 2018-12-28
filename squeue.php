<?php

include_once 'types.php';
include_once 'stack.php';

class SQueue implements iQueue {
    private $inbox = NULL;
    private $outbox = NULL;
    private $length = 5;

    public function __construct($length = NULL) {
        $this->_setLength($length);

        $this->inbox = new Stack($this->length);
        $this->outbox = new Stack($this->length);
    }

    public function enqueue($item) {
        try {
            $this->inbox->push($item);
        }
        catch (Exception $e) {
            throw new Exception('Queue overflow');
        }
    }

    public function dequeue() {
        if ($this->outbox->isEmpty()) {
            while (!$this->inbox->isEmpty()) {
                $this->outbox->push($this->inbox->pop());
            }
        }

        try {
            $itemToDequeue = $this->outbox->pop();
        }
        catch (Exception $e) {
            throw new Exception('Queue underflow');
        }

        return $itemToDequeue;
    }

    public function isEmpty() {
        return $this->inbox->isEmpty() && $this->outbox->isEmpty();
    }

    private function _setLength($length) {
        if ($length !== NULL) {
            $this->length = $length;
        }
    }
}