<?php 
include 'Location.php'
class secondF{
	public function __construct(){

	}
	function second($x,$y){
		$graph = new Location();
        $map=$graph->getSecondFloor();
		   echo '<div class="row">';
    		echo '<div class="col-sm-6">';
            echo '<table class="table table-bordered">';
        	echo  "<thead>";
           	echo "<tr>";                
            for($i = 'A' ; $i <= 'K' ; $i++){ 
                 echo   '<th scope="col">'.($i)."</th>";
             }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            for($i=0;$i<10;$i++){
           	echo "<tr>";
            echo '<th scope="row">'.($i+1)."</th>";
                for($y=0;$y<10;$y++){
                	if($map[$i][$y]==0){
                      $map[$i][$y]=null;
                      }
                  echo "<td>".$map[$i][$y]. "</td>";       
                 }
          echo "</tr>";
                }
           echo "</tbody>";
         echo '</table>';
         echo "</div>";
         echo "</div>";
	}
}

?>