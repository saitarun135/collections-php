<?php
class Node{
    public $data;
    public $next;
}

class LinkedList{
    public $head;
    public $next;
    public $node;

    function insert($data){
        $node=new Node;
        $node->data=$data;
        $node->next=null;
        if($this->head==null){ $head=$node;}
        else{
            $n=$this->head;  //tempNode   
        while($n->next!=null){
            $n=$n->next;
        }
            $n->next=$node;
        }   
        
        }
   
    function insertStartAt($data){
        $node=new Node;
        $node->next=null;
        $node->next=$this->head;                      //head value next for this newly added node
        $head=$node;
      
    }

    function insertRandom($index,$data){
        $node=new Node;
        $node->data=$data;
        $node->next=null;
        $n=$this->head;
        $n=new Node;
        if($index==0){ $this->insertStartAt($data);}
        else{
            for($i=0;$i<$index-1;$i++){
                $n=$n->next;
            }
            $node->next=$n;
            $n=$this->node;                            //adding add
          
        }
    }

 

}
$list=new LinkedList;
$list->insert(18);
$list->insert(555);
$list->insertStartAt(5);
$list->insertRandom(2,52);
$list->insertStartAt(0,5);
$list->displayNodes();
//$list->deleteNode(1);
?>