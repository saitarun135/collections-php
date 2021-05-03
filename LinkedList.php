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
    private $count=0;
  

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
public function deleteFirst() :bool {
    if ( $this->head !== NULL ) {
        if ( $this->head->getNext() !== NULL ) {
            $this->head = $this->head->getNext();
        } else {
            $this->head = NULL;
        }
        //$this->count--;
        return true;
    }
   return false;
}

public function deleteNode($target) : bool{
    if($this->head){
        $currentNode=$this->head;
        $previousNode=null;
        while($currentNode->getData()!=$target && $currentNode->getNext() !=null){
            $previousNode=$currentNode;
            $currentNode=$currentNode->getNext();
        }
        if($currentNode->getData()==$target){
            if($previousNode){
                $previousNode->setNext($currentNode->getNext());
                unset($currentNode);
            }else{
                $this->head=$currentNode->getNext();
                unset($currentNode);
            }
            return true;
        }
    }
    return false;
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
echo "The elements which are present inside list-1:"." \n";
$list1->displayNodes();
$list1->deleteNode("tarun");
$list1->deleteFirst();
echo "<br>"."After deleting the list-1 is :"."\n";
$list1->displayNodes();
?>