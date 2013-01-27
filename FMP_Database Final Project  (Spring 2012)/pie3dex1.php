<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');

	$one = $_REQUEST['one'];
	$two = $_REQUEST['two'];
	$three = $_REQUEST['three'];
	$four = $_REQUEST['four'];
	
	$data = array($one, $two, $three,$four);
	

// Create the Pie Graph.
$graph = new PieGraph(350,200);
$graph->SetShadow();

// Set A title for the plot
$graph->title->Set("Overall Score Distribution");
//$graph->title->SetFont(); 
$graph->title->SetColor("darkblue");

// Create pie plot
$p1 = new PiePlot3d($data);
$p1->SetTheme("sand");
$p1->SetCenter(0.4);
$p1->SetAngle(35);


//$p1->value->SetFont(FF_ARIAL,FS_NORMAL,7);
$p1->SetLegends(array("below 1.5","1.5-2.5","2.5-3.5","above 3.5"));
$graph->legend->Pos(0.00,0.08);

$graph->Add($p1);
$graph->Stroke();

?>


