<?php
class Node{
    private $data;
    private $next;
    function __construct(){
        $this->data=0;
        $this->next=null;
    }
    public function setData($data){
        $this->data=$data;
    }
    public function getData(){
        return $this->data;
    }
    public function setNext($next){
        $this->next=$next;
    }
    public function getNext(){
        return $this->next;
    }    
}

class LinkedList{
    private $head;

public function __construct()
    {
    $this->head=null;
    }
   
function insertAtBack($data) :void {
    $newNode=new Node();
    $newNode->setData($data);
    if($this->head){
        $currentNode=$this->head;
        while($currentNode->getNext() != null){
            $currentNode=$currentNode->getNext();
            }
            $currentNode->setNext($newNode);
            }
    else{
        $this->head=$newNode;
        }
       // echo "The node is=".$newNode->getData()."<br>";
        }
       
   function insertAtFront($data){
    $newNode=new Node;
    $newNode->setData($data);
    $newNode->setNext($this->head);
    $this->head=$newNode;
   
    }

   function insertAfterSpecificNode($data,$target){
    if($this->head){
        $currentNode=$this->head;
        while($currentNode->getData()!=$target && $currentNode->getNext() != null){
            $currentNode=$currentNode->getNext();
        }
    }
    if($currentNode->getData()==$target){
        $newNode=new Node();
        $newNode->setData($data);
        $currentNodeNext=$currentNode->getNext();
        $currentNode->setNext($newNode);
        $newNode->setNext($currentNodeNext);
    }
   }
function insertBeforeSpecificNode($data,$target){
    if($this->head){
        $currentNode=$this->head;
        $previousNode=null;
        while($currentNode->getData() != $target && $currentNode->getNext()!=null){
            $previousNode=$currentNode;
            $currentNode=$currentNode->getNext();
        }
        if($currentNode->getData()==$target){
            $newNode=new Node();
            $newNode->setData($data);
            if($previousNode){
                $previousNode->setNext($newNode);
                $newNode->setNext($currentNode);
            }else{
                $previousNode=$newNode;
                $previousNode->setNext($currentNode);
                $this->head=$previousNode;
            }
        }
    }
}

public function displayNodes(){
    $listData = array();
    $currentNode = $this->head;
    while($currentNode != null)
    {
        array_push($listData, $currentNode->getData());
        $currentNode =$currentNode->getNext();
    }
    foreach($listData as $result){
        echo $result." ";
    }
}  

}
$list1=new LinkedList();
$list1->insertAtBack("ongole");
$list1->insertAtFront("sai");
$list1->insertAfterSpecificNode("tarun","sai");
$list1->insertBeforeSpecificNode("Sundarasetty","sai");
echo "The elements which are present inside list-1:"."  \n";
$list1->displayNodes();
echo "<br>";
$list2=new LinkedList();
$list2->insertAtBack(2);
$list2->insertAtFront(45);
$list2->insertAfterSpecificNode(555,2);
$list2->insertBeforeSpecificNode(0,45);
echo "The elements which are present inside list-2:"."  \n";
$list2->displayNodes();

?>