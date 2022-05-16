<?php
//Kullanılacak Dosyalar include ediliyor. Bu projeyi yaparken A* Algoritmasını kullandım.
use BlackScorp\Astar\Astar;
use BlackScorp\Astar\Grid;
use BlackScorp\Astar\Heuristic\Diagonal;
use BlackScorp\Astar\Heuristic\Euclidean;
require_once __DIR__ . '/vendor/autoload.php';
include 'Location.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container  bg-primary">
		<div class="row">
			
<?php
class kiosk
{
	public $showMap=0;
	public function __construct(){

	}
	//İlk kattaysak burada işlemlerimizi yapıyoruz.
    function navigateFirstFloor($location,$lastLocation)
    {
        $graph = new Location();
        $map=$graph->getMap();
        $grid = new Grid($graph->getMap());
        $startPosition = $grid->getPoint($location[0], $location[1]);
        $endPosition = $grid->getPoint($lastLocation[0], $lastLocation[1]);
        $astar = new Astar($grid);
        $nodes = $astar->search($startPosition, $endPosition);
        if (count($nodes) === 0) {
            echo "Path not found";
        } else {
           $this->showMap=1;   
            foreach ($nodes as $node) {
            		$map[$node->getY()][$node->getX()]=  ('<img src="icon.png"></img>');

                if ($node->getY() == '4' && $node->getX() == '0') {

                    $this->navigateSecondFloor();
                    break;
                }
            }
   
            
    		echo '<div class="col-md-6">';
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
                  echo "<td>".$map[$i][($y)]. "</td>";       
                 }
          echo "</tr>";
                }
           echo "</tbody>";
         echo '</table>';
       echo '</div>';
       
         
        }
    }
    //2. kata gelirsek 1. kat fonksiyonumuz 2. kata yolluyor.

    function navigateSecondFloor()
    {
        $graph = new Location();
        $map=$graph->getSecondFloor();
        $grid = new Grid($graph->getMap());
        $startPosition = $grid->getPoint(4 ,0);
        $endPosition = $grid->getPoint(4, 2);
        $astar = new Astar($grid);
        $nodes = $astar->search($startPosition, $endPosition);
        if (count($nodes) === 0) {
            echo "Path not found";
        } else {
            foreach ($nodes as $node) {
                    $map[$node->getY()][$node->getX()]= ('<img src="icon.png"></img>');                    
            }
                
    		echo '<div class="col-md-6">';
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
                  echo "<td>".$map[$i][($y)]. "</td>";       
                 }
          	echo "</tr>";
                }
           				echo "</tbody>";
         			echo '</table>';
         		echo '</div>';
        	 
         
         
        }
    }

    public function getShowMap(){
    	return $this->showMap;
    }
}
/*Button ile submit yaptığımızda gönderilen verileri hangi kiosk cihazındaysak ve hangi yere gitmek istiyorsak onu belirtiyoruz 
ve belirttiğimiz yerin koordinatlarını Class'ımızı çağırıp ordaki ilgili fonksiyona yolluyoruz
*/
?>
</div>
</div>
<?php
if(isset($_POST['find'])) {
    $getMap=new Location();
    $map = $getMap->getMap();
    $kiosk = new kiosk();
    $location = array();
    $lastLocation=[];
    $secondFloor=[];

            if ($_POST['selectKiosk'] == "KIOSK1") {
                for($i=0;$i<10;$i++) {
                    for($y=0;$y<10;$y++) {
                        if ($map[$i][$y] == $_POST['selectKiosk'] ) {
                            $location[0] = $i;
                            $location[1] = $y;
                            break;
                        }
                    }
                }

            }
            if ($_POST['selectKiosk'] == "KIOSK2") {
                for($i=0;$i<10;$i++) {
                    for($y=0;$y<10;$y++) {
                        if ($map[$i][$y] == $_POST['selectKiosk'] ) {
                            $location[0] = $i;
                            $location[1] = $y;
                            break;
                        }
                    }
                }
            }
            if ($_POST['selectKiosk'] == "KIOSK3") {
                for($i=0;$i<10;$i++) {
                    for($y=0;$y<10;$y++) {
                        if ($map[$i][$y] == $_POST['selectKiosk'] ) {
                            $location[0] = $i;
                            $location[1] = $y;
                            break;
                        }
                    }
                }
            }
            //Burada seçtiğimiz Mağazanın koordinatlarını dizimize kaydediyoruz.
    if($_POST['selectLocation']=="LCW"){
        $lastLocation[0] = 7;
        $lastLocation[1] = 1;
    }
    if($_POST['selectLocation']=="KTN"){
        $lastLocation[0] = 7;
        $lastLocation[1] = 7;
        
    }
    if($_POST['selectLocation']=="SBT"){
        $lastLocation[0] = 2;
        $lastLocation[1] = 3;
        
    }
    if($_POST['selectLocation']=="BGR"){
        $lastLocation[0] = 4;
        $lastLocation[1] = 0;
        
    }
    $kiosk->navigateFirstFloor($location,$lastLocation);
}
?>

<?php
//Burada Map yani graph ımızı sergiletiyoruz.
	$kiosk = new kiosk();
	$map = array(
    array(0, 0, 0, 0, 0, 'KIOSK1', 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(0, 0, 0, 'STB', 0, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array('STAIRS', 0, 0, 0, 0, 0, 0, 0, 0, 'KIOSK2'),
    array(0, 0, 0, 0, 'ELEVATOR', 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(0, 'LCW', 0, 0, 0, 0, 0, 'KTN', 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 'KIOSK3', 0, 0, 0, 0)
				);
  ?>
  <?php 
  //Burada eski mapi de sergiletiyoruz
  if($kiosk->getShowMap()==1){ 
  		echo " ";
  	}else
  	{ ?>  	
	<div class="row">
    	<div class="col-sm-6">
        <table class="table table-bordered">
            <thead>
            <tr> 
            <?php for($i = "A" ; $i <= "K" ; $i++){ ?>
                    <th scope="col"><?php echo ($i); ?></th>
            <?php }?>
            </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<10;$i++){ ?>
            <tr>
                <th scope="row"><?php echo ($i+1); ?></th>
                <?php for($y=0;$y<10;$y++){ ?>
                  <td><?php if($map[$i][$y]==0){
                      $map[$i][$y]=null;
                      }
                      echo $map[$i][$y]; ?> </td>

                <?php   }?>
            </tr>
               <?php     }?>
            </tbody>
        </table>
   <?php } ?> 
    <form action="" method="POST">
        <select class="form-select" aria-label="Default select example" name="selectKiosk" required>
            <option value="">Select One Kiosk</option>
            <option value="KIOSK1">Kiosk1</option>
            <option value="KIOSK2">Kiosk2</option>
            <option value="KIOSK3">Kiosk3</option>
        </select>
        <select class="form-select" aria-label="Default select example" name="selectLocation" required>
            <option value="">Select One Location</option>
            <option value="LCW">LCwaikiki</option>
            <option value="KTN">KTN</option>
            <option value="STB">STB</option>
            <option value="BGR">BGR</option>
        </select>
        <button type="submit" name="find" class="btn btn-warning">Find</button>
    </form>
    </div>
</div>
</body>
</html>
