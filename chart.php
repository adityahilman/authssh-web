<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "jpgraph/src/jpgraph.php";
include "jpgraph/src/jpgraph_bar.php";
//include "jpgraph/src/jpgraph_line.php";

include "classess/class.viewlog.php";

$data = new ViewLog();
$list = $data->getUserChartSummaryLog();

$listSuccess = $data->getUserSuccessChartSummaryLog();

$dataSuccess = array();
$dataStatus = array();
$dataTotal = array();

while ($data = mysql_fetch_array($list))
{
    //array_unshift($dataUser, $data['USER_NAME']);
    array_unshift($dataStatus, $data['USER_LOGIN_STATUS']);
    array_unshift($dataTotal, $data['COUNT(*)']);
}

while ($data = mysql_fetch_array($listSuccess))
{
    
}

$graph = new Graph(600,400,"auto");
$graph->SetScale("textlin");

$graph->legend->Pos(0.5,0.98,"center","bottom");
$graph->img->SetMargin(50,100,20,100);
$graph->title->Set("Linux Login");
$graph->SetShadow();

$graph->xaxis->title->Set("Login Status");
$graph->xaxis->SetLabelAlign("center");
$graph->xaxis->SetTickLabels($dataStatus);

$graph->yaxis->title->Set("Login Count");
$graph->title->SetFont(FF_FONT1, FS_BOLD);

$bplot1 = new BarPlot($dataTotal);
$bplot1->SetFillColor("blue");
$bplot1->value->show();
//$bplot1->SetLegend("Success");

/*
$bplot2 = new BarPlot($dataTotal);
$bplot2->SetFillColor("red");
$bplot2->value->show();
$bplot2->SetLegend("Failed");
*/
$gbplot = new GroupBarPlot(array($bplot1));
$gbplot->SetWidth(0.4);

$graph->Add($gbplot);

$graph->Stroke();
?>