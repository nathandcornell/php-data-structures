<?php

namespace DataStructures;
use BinarySearchTreeNode;
use \Ds\Stack;
use \Ds\Queue;

class BinarySearchTree {
    public $head;

    public function __construct(\DataStructures\BinarySearchTreeNode $head=null) {
        $this->head = $head;
    }

    public function search(int $needle, bool $depthFirst=true) {
        if (! $this->head) { return null; }

        $toVisit = ($depthFirst) ? new Stack() : new Queue();
        $toVisit->push($this->head);

        while (! $toVisit->isEmpty()) {
            $current = $toVisit->pop();

            if ($current->value == $needle) {
                return $current;
            }

            if ($current->value < $needle && $current->right != null) { 
                $toVisit->push($current->right);
            }

            if ($current->value > $needle && $current->left != null) {
                $toVisit->push($current->left);
            }
        }

        return null;
    }

    /**
     * Returns an array of the values in the order that the tree
     * was traversed.
     *
     * @param bool $depthFirst  Traverse in a depth-first fashion (default).
     *                          If false, will perform breadth-first traverse.
     *
     * return array(int)
     */
    public function preOrderTraverse() {
        if ($this->head === null) { return false; }

        $toVisit = new Stack();
        $visited = [];

        $current = $this->head;

        # Start by finding the leftmost node from the head, stacking the other
        # left-nodes behind it.
        while ($current !== null) {
            $toVisit->push($current);
            $current = $current->left;
        }

        # Now go through each left node, adding them to the array then adding
        # any right children and all their left nodes to the stack to be 
        # processed.
        while (! $toVisit->isEmpty()) {
            $current = $toVisit->pop();
            $visited[] = $current->value;

            if ($current->right !== null) {
                $current = $current->right;

                while ($current != null) {
                    $toVisit->push($current);
                    $current = $current->left;
                }
            }
        }

        return $visited;
    }

    public function inOrderTraverse() {
        if ($this->head === null) { return false; }

        $toVisit = new Queue();
        $toVisit->push($this->head);
        $visited = [];

        while (! $toVisit->isEmpty()) {
            $current = $toVisit->pop();
            $visited[] = $current->value;

            if ($current->left !== null) {
                $toVisit->push($current->left);
            }
            if ($current->right !== null) {
                $toVisit->push($current->right);
            }
        }

        return $visited;
    }
}

?>
