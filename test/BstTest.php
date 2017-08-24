<?php

use DataStructures\BinarySearchTreeNode;
use DataStructures\BinarySearchTree;
use PHPUnit\Framework\TestCase;

class BstTest extends TestCase {

    const TEST_NUMBERS = [4, 9, 2, 5, 8, 1, 3, 11];

    private function initBst() {
        $bstNode = new BinarySearchTreeNode(self::TEST_NUMBERS[0]);

        foreach (self::TEST_NUMBERS as $index => $number) {
            if ($index == 0) { continue; }

            $bstNode->add(new BinarySearchTreeNode($number));
        }

        return new BinarySearchTree($bstNode);
    }

    public function testCreate() {
        $bstNode = new BinarySearchTreeNode(self::TEST_NUMBERS[0]);
        $bst = new BinarySearchTree($bstNode);
        $this->assertEquals(self::TEST_NUMBERS[0], $bst->head->value);
    }

    public function testAdd() {
        $bstNode = new BinarySearchTreeNode(self::TEST_NUMBERS[0]);

        # Simple right add
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[1]));
        $this->assertEquals(self::TEST_NUMBERS[1], $bstNode->right->value);

        # Simple left add
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[2]));
        $this->assertEquals(self::TEST_NUMBERS[2], $bstNode->left->value);

        # Add left child of right child
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[4]));
        $this->assertEquals(self::TEST_NUMBERS[4], $bstNode->right->left->value);
        
        # Add right child of right child
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[7]));
        $this->assertEquals(self::TEST_NUMBERS[7], $bstNode->right->right->value);

        # Add left child of left child
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[5]));
        $this->assertEquals(self::TEST_NUMBERS[5], $bstNode->left->left->value);
        
        # Add right child of left child
        $bstNode->add(new BinarySearchTreeNode(self::TEST_NUMBERS[6]));
        $this->assertEquals(self::TEST_NUMBERS[6], $bstNode->left->right->value);
    }

    public function testPreOrderTraverse() {
        $bst = $this->initBst();

        $ordered = $bst->preOrderTraverse();

        $original = self::TEST_NUMBERS;
        sort($original);

        $this->assertEquals($ordered, $original);
    }

    public function testInOrderTraverse() {
        $bst = $this->initBst();

        $inOrder = $bst->inOrderTraverse();

        $original = [4,2,9,1,3,5,11,8];

        $this->assertEquals($original, $inOrder);
    }
}
?>
