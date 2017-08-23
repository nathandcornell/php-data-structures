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

    public function depthFirstSearch(int $needle, bool $depthFirst=true) {
        if (! $this->head) { return null; }

        $toVisit = ($depthFirst) ? new Stack() : new Queue();
        $toVisit->push($this->head);

        while (! $toVisit->isEmpty()) {
            $current = $toVisit->pop();

            if ($current->value == $needle) {
                return $current;
            }

            if ($current < $needle && $current->right != null) { 
                $toVisit->push($current->right);
            }

            if ($current > $needle && $current->left != null) {
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
    public function traverse(bool $depthFirst=true) {
        if ($this->head === null) { return false; }

        $toVisit = ($depthFirst) ? new Stack() : new Queue();
        $toVisit->push($this->head);
        $visited = [];

        while (! $toVisit->isEmpty()) {
            $current = $toVisit->pop();

            if ($current->left !== null) {
                $toVisit->push($current->left);
            }

            if ($current->right !== null) {
                $toVisit->push($current->right);
            }

            $visited[] = $current->value;
        }

        return $visited;
    }
}

?>
