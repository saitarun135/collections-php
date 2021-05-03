<?php
class StackList {
    public $stack;
    public $limit;
    
    public function __construct($limit=5)
    {
        $this->stack=array();
        $this->limit=$limit;
    }

    /**
     * array_unshift()-->new elements added into the beggining of array
     */

    public function push($data){
        if(count($this->stack) < ($this->limit)){
            array_unshift($this->stack,$data);
        }else{
            throw new Exception("stack size is exceeded..!!");
        }
    }

    public function isEmpty() {
        return empty($this->stack);
         
    }

    /**
     * empty()-->checks weather empty or not(1=empty)
     * pop function-->it removes the elements (last in first out).
     * array_shift()-->it removes first element from the array.
     */

    public function pop(){
        if($this->isEmpty()) { echo "stack is empty...!,you can't perform pop operation";}
        else { return array_shift($this->stack);}
    }

    /** 
     * peek function-->returns the top most element in the stack.
     * https://www.w3schools.com/php/func_array_current.asp
     * current()-->it returns the current pointer value in an array
     * related-methods=end(),next(),reset(),each().
    */

    public function peek(){
        return current($this->stack);
    }

    /**
     * SplDoublyLinkedList::IT_MODE_LIFO(default) -->default iteratormode in stack
     * LIFO
     */

    public function displayStack(){
        foreach ($this->stack as $list) {
            echo $list." ";               
        }
    }
}

    //custom exception
    function overload_exception($exception){
        echo "error_context:"."#lineNum".$exception->getLine(). " ". $exception->getMessage()." "
        .$exception->getTraceAsString() ;   
    }

    set_exception_handler('overload_exception');

$stack=new StackList;

$stack->push(1);
$stack->push(22);
$stack->push(84);
$stack->push(121);
$stack->push(999);
$stack->displayStack();

echo '<br>';
$stack->pop();

echo "After poping the stack is:"."\n";
$stack->displayStack();

echo "<br>";

echo "Top element in the stack is:".$stack->peek()."<br>";

$stack->push("sai");
$stack->push("tarun");

?>