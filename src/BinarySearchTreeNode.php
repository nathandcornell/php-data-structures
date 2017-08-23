<?php

namespace DataStructures;

class BinarySearchTreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct(int $value, BinarySearchTreeNode $left=null, 
            BinarySearchTreeNode $right=null) {
        $this->value = $value;
        $this->left  = $left;
        $this->right = $right;
    }
}

?>
