<?php

namespace DataStructures;

class BinarySearchTreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct(int $value, \DataStructures\BinarySearchTreeNode $left=null, 
            \DataStructures\BinarySearchTreeNode $right=null) {
        $this->value = $value;
        $this->left  = $left;
        $this->right = $right;
    }

    public function add(\DataStructures\BinarySearchTreeNode $child) {
        $position = ($child->value <= $this->value) ? 'left' : 'right';

        if ($this->$position === null) {
            $this->$position = $child;
        } else {
            $this->$position->add($child);
        }
    }

    public function remove($value) {
    }
}

?>
