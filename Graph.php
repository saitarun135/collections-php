<?php
class Graph{
    protected $graph;
    protected $visited=array();

    public function __construct($graph)
    {
        $this->graph=$graph;
    }

    public function breadthFirstSearch($origin, $destination) {
        foreach ($this->graph as $vertex => $adj) {
            $this->visited[$vertex] = false;
          }
          $queue = new SplQueue();                //Queue -fifo
          $queue->enqueue($origin);
          $this->visited[$origin] = true;        //visited
          
          $path = array();
          $path[$origin] = new SplDoublyLinkedList();  //librariy
          $path[$origin]->setIteratorMode(
            SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
          );
          $path[$origin]->push($origin);
         
          // bottom()=>Peeks at the node from the beginning of the doubly linked list
          while (!$queue->isEmpty() && $queue->bottom() != $destination) {
            $t = $queue->dequeue();
            if (!empty($this->graph[$t])) {               //if it's not empty
                foreach ($this->graph[$t] as $vertex) {
                    if (!$this->visited[$vertex]) {
                        $queue->enqueue($vertex);
                        $this->visited[$vertex] = true;
                        $path[$vertex] = clone $path[$t];   //copy of an obj
                        $path[$vertex]->push($vertex);
    }
}
}
}
if (isset($path[$destination])) {                         //checks setting or not
    echo "$origin to $destination "." hops=";
    $sep = '';
    foreach ($path[$destination] as $vertex) {
      echo $sep, $vertex;
      $sep = '->';
    }
  }else {
    echo "No route from $origin to $destination";
  }
}
}
$graph = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E'),
    'C' => array('F'),
    'D' => array('B', 'E'),
    'E' => array('B', 'D', 'F'),
    'F' => array('A', 'E', 'C'),
  );
$g = new Graph($graph);

  $g->breadthFirstSearch('A', 'G');
  echo "<br>";
  $g->breadthFirstSearch('A','E');
  echo "<br>";
  $g->breadthFirstSearch('A','C');

xdebug_info();

  //,count($path[$destination]) -1,//
?>