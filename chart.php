<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Google Visualization API Sample
    </title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Monthly Coffee Production by Country',
          vAxis: {title: "Cups"},
          hAxis: {title: "Month"},
          seriesType: "bars",
          series: {5: {type: "line"}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body>
     <?php 
    $docroot = "/zen/index5.php";
    $path =($_SERVER['REQUEST_URI']);
    $names = explode("/", $path); 
    $trimnames = array_slice($names, 1, -1);
    $length = count($trimnames)-1;
    $fixme = array(".php","-","myname");
    $fixes = array(""," ","My<strong>Name</strong>");
    echo '<div id="breadwrap"><ol id="breadcrumb">';
    $url = "";
    for ($i = 0; $i <= $length;$i++){
    $url .= $trimnames[$i]."/";
        if($i>0 && $i!=$length){
            echo '<li><a href="/'.$url.'">'.ucfirst(str_replace($fixme,$fixes,$trimnames[$i]) . ' ').'</a></li>';
    }
    elseif ($i == $length){
        echo '<li class="current">'.ucfirst(str_replace($fixme,$fixes,$trimnames[$i]) . ' ').'</li>';       
    }
    else{
        echo $trimnames[$i]='<li><a href='.$docroot.' id="bread-home"><span>&nbsp;</span></a></li>';
    }
}
echo '</ol>';
?>
  </body>
</html>