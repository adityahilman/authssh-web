<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "jpgraph/src/jpgraph.php";
include "jpgraph/src/jpgraph_bar.php";
include "jpgraph/src/jpgraph_line.php";

include "classess/class.viewlog.php";

$data = new ViewLog();

$listSuccess = $data->getUserSuccessChartSummaryLog();
$listFailed = $data->getUserFailedChartSummaryLog();

$dataSuccess = array();
$dataSuccessTotal = array();

$dataFailed = array();
$dataFailedTotal = array();


$xLabel = array("Login Summary");

while ($data = mysql_fetch_array($listSuccess))
{
    array_unshift($dataSuccess, $data['USER_LOGIN_STATUS']);
    array_unshift($dataSuccessTotal, $data['COUNT(*)']);
}

while ($data = mysql_fetch_array($listFailed))
{
    array_unshift($dataFailed, $data['USER_LOGIN_STATUS']);
    array_unshift($dataFailedTotal, $data['COUNT(*)']);
}

$graph = new Graph(400,400,"auto");
$graph->SetScale("textlin");

$graph->legend->Pos(0.82,0.5,"center","bottom");
$graph->img->SetMargin(50,150,20,100);
$graph->title->Set("Linux Login");
$graph->SetShadow();

//$graph->xaxis->title->Set("Login Status");
$graph->xaxis->SetLabelAlign("center");
$graph->xaxis->SetTickLabels($xLabel);

$graph->yaxis->title->Set("Login Count");
$graph->title->SetFont(FF_FONT1, FS_BOLD);

$bplot1 = new BarPlot($dataSuccessTotal);
//$bplot1->SetFillColor("blue");
$bplot1->value->show();
$bplot1->SetLegend("Success");


$bplot2 = new BarPlot($dataFailedTotal);
//$bplot2->SetFillColor('#ff0000');
$bplot2->value->show();
$bplot2->SetLegend("Failed");

$gbplot = new GroupBarPlot(array($bplot1, $bplot2));

$gbplot->SetWidth(0.3);


$graph->Add($gbplot);
//$gbplot->SetColor("red");

$gbplot->SetFillColor('#ff0000');

$graph->Stroke();
?>