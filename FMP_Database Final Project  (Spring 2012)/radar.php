<?php // content="text/plain; charset=utf-8"
	require_once ('jpgraph/jpgraph.php');
	require_once ('jpgraph/jpgraph_radar.php');
	
	if ($_REQUEST['acc'])
	{
		$acc = $_REQUEST['acc'];
		$sten = $_REQUEST['sten'];
		$intr = $_REQUEST['intr'];
		$pers = $_REQUEST['pers'];
		
		$data = array($acc, $sten, $intr, $pers);
	}
	
	//$data = array(3.5,3,2,2.5);
	// Some data to plot
	
	
	// Create the graph and the plot
	$graph = new RadarGraph(350,200);
	
	// Add a drop shadow to the graph
	$graph->SetShadow();
	
	// Create the titles for the axis
	//$titles = $gDateLocale->GetShortMonth();
	$titles =array('Accessbility','Acdemic','Rater Interest','Personality');
	$graph->SetTitles($titles);
	
	// Add grid lines
	$graph->grid->Show();
	$graph->grid->SetLineStyle('dashed');
	
	$plot = new RadarPlot($data);
	$plot->SetFillColor('lightblue');
	
	// Add the plot and display the graph
	$graph->Add($plot);
	$graph->Stroke();
?>
