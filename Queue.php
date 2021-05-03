<?php
class QueueImp{
    public $queue;
    public $limit;
    
    public function __construct($limit=5)
    {
        $this->queue=array();
        $this->limit=$limit;
    }

    /**  Enqueue
     * adding elements(FIFO),
     * array_push()-->adding elements to the rear
     */
    
     public function enqueue($data){
        if(count($this->queue) < ($this->limit)){
            array_push($this->queue,$data);
        }else{
            throw new Exception("Queue size is exceeded..!!");
        }
    }
    
    /**
     * empty()-->checks empty or not
     */

    public function isEmpty() {
        return empty($this->queue);
    }

    /**
     * removing the elements(FIFO).
     * array_shift()-->removes starting elements in the array.
     */

    public function deQueue(){
        if($this->isEmpty()) { echo "Queue is empty...!,you can't perform pop operation";}
        else{
            return array_shift($this->queue);
        }
    }

    /**
     * peek->displays to element(displays end element in the array).
     * end()-->cursor moves to the end position of a array(displays last element)
     */

    public function peek(){
        return end($this->queue);
    }
    
    /**
     * display's the queue.
     * SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP 
     */

    public function display(){
       foreach($this->queue as $order){
           echo $order. " ";
       }
    }
}
    #custom exception
    function overload_exception($exception){
        echo "error_line:"."#lineNumber".$exception->getLine(). " ". $exception->getMessage()." "
                            .$exception->getCode();   
    }

set_exception_handler("overload_exception");
$queueObj=new QueueImp();

$queueObj->enqueue(5);
$queueObj->enqueue(15);
$queueObj->enqueue(20);
$queueObj->enqueue(25);
$queueObj->enqueue(30);
echo "peek:".$queueObj->peek()."<br>";
$queueObj->display();
echo "<br>";
$queueObj->deQueue();
echo"After dequeue :\n";
$queueObj->display();
echo "<br>";
$queueObj->enqueue(40);
$queueObj->enqueue(50);
?>