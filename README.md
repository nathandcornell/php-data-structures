# PHP Data Structures

My attempt to create common CS data structures in PHP.

## Installation
Add the following to your composer.json:

    "minimum-stability": "dev",
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/nathandcornell/php-data-structures"
        }
    ],

Then add the following to the 'require' section:

    "nathandcornell/data-structures": "master"

Then run `composer install`

## Usage
Use the data structures as follows:

### Binary Search Tree
Add the following to the top of your file:
    use DataStructures\BinarySearchTreeNode;
    use DataStructures\BinarySearchTree;

The BST Node only supports integers at the moment.

#### Instantiate a new node:
    $bstNode = new BinarySearchTreeNode(5);

#### Access node children:
    $leftChild = $bstNode->left;
    $rightChild = $bstNode->right;

#### Add children:
    $bstNode->add(new BinarySearchTreeNode(7));

#### Instantiate a new tree:
    $bst = new BinarySearchTree(new BinarySearchTreeNode(5));

#### Search for a value:
    $needle = $bst->search(4);

#### Breadth-first search:
    $needle = $bst->search(4, false);

#### Pre-order traverse:
    $treeValues = $bst->preOrderTraverse();

#### In order traverse:
    $treeValues = $bst->inOrderTraverse();
