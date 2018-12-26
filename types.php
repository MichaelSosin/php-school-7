<?php

interface iStack {
    public function push($item);
    public function pop();
    public function top();
    public function isEmpty();
}

interface iQueue {
    public function enqueue($item);
    public function dequeue();
}
