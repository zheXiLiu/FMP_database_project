<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

	if ($_REQUEST['id'])
	{
		$one = $_REQUEST['one'];
		$two = $_REQUEST['two'];
		$three = $_REQUEST['three'];
		$four = $_REQUEST['four'];
		
		$data = array($one, $two, $three,$four);
		
		$lone="";
		$ltwo="";
		$lthree="";
		$lfour="";
		
		
		
		$id = $_REQUEST['id'];
		if ($id == 1)
		{
			$title = "Accessbility: ".$_REQUEST['num']." votes";
			
				$lone = "Below Average\n";
				$ltwo = "Average\n";
				$lthree = "Good\n";
				$lfour = "Supurb\n";	
			
			if ($one)
				$lone .= "(%.1f%%)";
			if ($two)
				$ltwo .= "(%.1f%%)";
			if ($three)
				$lthree .= "(%.1f%%)";
			if ($four)
				$lfour .= "(%.1f%%)";
			
			//$labels = array($lone,$ltwo,$lthree,$lfour);
		}
		else if ($id ==2)
		{
			$title = "Academic Strength: ".$_REQUEST['num']." votes";
			
			
				$lone = "Below Average\n";
				$ltwo = "Average\n";
				$lthree = "Good\n";
				$lfour = "Supurb\n";	
			
			if ($one)
				$lone .= "(%.1f%%)";
			if ($two)
				$ltwo .= "(%.1f%%)";
			if ($three)
				$lthree .= "(%.1f%%)";
			if ($four)
				$lfour .= "(%.1f%%)";
						
			//$labels = array($lone,$ltwo,$lthree,$lfour);
		}
		else if ($id ==3)
		{
			$title = "Personality: ".$_REQUEST['num']." votes";
				$lone = "Below Average\n";
				$ltwo = "Average\n";
				$lthree = "Good\n";
				$lfour = "Supurb\n";	
			
			if ($one)
				$lone .= "(%.1f%%)";
			if ($two)
				$ltwo .= "(%.1f%%)";
			if ($three)
				$lthree .= "(%.1f%%)";
			if ($four)
				$lfour .= "(%.1f%%)";
			
			//$labels = array($lone,$ltwo,$lthree,$lfour);
		}
		else if ($id==4)
		{
			$title = "Rater's Interest: ".$_REQUEST['num']." votes";
				$lone = "Below Average\n";
				$ltwo = "Average\n";
				$lthree = "Good\n";
				$lfour = "Supurb\n";	
			
			if ($one)
				$lone .= "(%.1f%%)";
			if ($two)
				$ltwo .= "(%.1f%%)";
			if ($three)
				$lthree .= "(%.1f%%)";
			if ($four)
				$lfour .= "(%.1f%%)";
			
			
		}
	}

	
	$labels = array($lone,$ltwo,$lthree,$lfour);
	// Create the Pie Graph.
	$graph = new PieGraph(300,300);
	$graph->SetShadow();
 
	// Set A title for the plot
	$graph->title->Set($title);
	//$graph->title->SetFont(9);
	$graph->title->SetColor('black');
 
	// Create pie plot
	$p1 = new PiePlot($data);
	$p1->SetCenter(0.5,0.5);
	$p1->SetSize(0.20);
	$p1->ShowBorder(false);
	// Setup the labels to be displayed
	$p1->SetLabels($labels);
	$p1->SetTheme("earth");
 
	// This method adjust the position of the labels. This is given as fractions
	// of the radius of the Pie. A value < 1 will put the center of the label
	// inside the Pie and a value >= 1 will pout the center of the label outside the
	// Pie. By default the label is positioned at 0.5, in the middle of each slice.
	$p1->SetLabelPos(1);
 
	// Setup the label formats and what value we want to be shown (The absolute)
	// or the percentage.
	$p1->SetLabelType(PIE_VALUE_PER);
	$p1->value->Show();
	//$p1->value->SetFont(9);
	$p1->value->SetColor('darkgray');
 
	// Add and stroke
	$graph->Add($p1);
	$graph->Stroke();

?>


