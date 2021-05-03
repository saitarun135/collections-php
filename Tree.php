<?php
##https://www.tutorialspoint.com/data_structures_algorithms/tree_traversal.htm
    class Node {

          public $info;
          public $left;
          public $right;
        

          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;
                
          }

          public function __toString() {
                 return "$this->info";
                }
    }  


    class SearchBinaryTree {
        public $root;
        public function  __construct() {
            $this->root = NULL;
          }
        //stack-LIFO
        public function create($info) {
            if($this->root == NULL) {
            $this->root = new Node($info);
            } else {
                $current = $this->root;
                    while(true) {

                        if($info < $current->info) {
                         
                            if($current->left) {
                                $current = $current->left;
                                } 
                            else {
                                $current->left = new Node($info);
                                break; 
                                }

                        }else if($info > $current->info){

                            if($current->right) {
                                $current = $current->right;
                                } 
                            else {
                                $current->right = new Node($info);
                                break; 
                                }

                        }else {
                            break;
                        }
                    } 
                 }
          }
//Depth-first traversal(stack)
        public function traverse($method) {

            switch($method){
                case 'inorder':
                    $this->inOrder($this->root);
                    break;
                case 'postorder':
                    $this->postOrder($this->root);
                    break;
    
                case 'preorder':
                    $this->preOrder($this->root);
                    break;
   
                default:
                    break;
            } 

        } 

        private function inOrder($node) {

            if($node->left) {                             //current=this->root=node
                $this->inOrder($node->left); 
                } 

            echo $node. " ";

            if($node->right) {
                $this->inOrder($node->right); 
                } 
        }


        private function preOrder($node) {

            echo $node. " ";

            if($node->left) {
                $this->preOrder($node->left); 
                } 
            if($node->right) {
                $this->preOrder($node->right); 
                } 
        }

        private function postOrder($node) {
            if($node->left) {
                $this->postOrder($node->left); 
                } 
            if($node->right) {
                $this->postOrder($node->right); 
                } 
            echo $node. " ";
            }
    } 
              
    
$tree = new SearchBinaryTree();
//$arr=array('F','B','Z','C','Y');
$arr=array(10,6,5,4,15,16,11);
echo "input values:\n";
foreach($arr as $a){echo  $a." ";}
    
       for($i=0;$i<$n=count($arr);$i++) {
                     $tree->create($arr[$i]);
                 }
echo "<br>";
echo"IN-ORDER ==> \n"; 
$tree->traverse('inorder');
echo "<br>";
echo"POST-ORDER==> \n"; 
$tree->traverse('postorder');
echo "<br>";
echo"PRE-ORDER ==> \n"; 
$tree->traverse('preorder');
  
?>