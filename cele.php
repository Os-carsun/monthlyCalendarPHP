
<?php

if ($year==''&&is_null($_POST["year"])) {
$year=date(Y, time ());
}
else{
  $year = $_POST["year"];
}

if ($month==''&&is_null($_POST["month"])) { 
$month=date(m, time ());
} 
else{
  $month = $_POST["month"]; 
}
$month_text = date(F,mktime(0,0,0,$month,1,$year));
$selected=strftime ("%B",mktime(0,0,0,$month,1,$year));

echo "<center><form action=index.php method=post><select name=month>\n";
$monthArray = array("","January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November", 
  "December"
); 
foreach ($monthArray as $key => $value) {
  if($value!=""){
    if(intval($month) == $key ){ 
      echo "<option selected value=$key>$value";
      
    }
    else
      echo "<option value=$key>$value";
  }
} 
echo "</select>";



echo "<select name=year>";
for ($i=1911; $i <= date(Y, time ()); $i++) {
  if($i == $year)
    echo "<option selected value=$i>$i";
  else 
    echo "<option value=$i>$i";
}

echo "</select>\n";
echo "<input type=submit value=確定></form>\n";

echo "<table><tr><table border=l bgcolor=#FFFFFF><tr>";
echo "<td colspan=7 align=center>";
echo "<h2>$year 年 $selected </h2>";
echo "</td></tr><tr>";
echo "<td bgcolor=darkblue><font color=white><b>週日</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週一</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週二</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週三</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週四</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週五</b></font></td>";
echo "<td bgcolor=darkblue><font color=white><b>週六</b></font></td>";
echo "</tr>\n"; 


$nextmonth = $month+1;
$lastday = mktime(0,0,0,$nextmonth,0,$year);
$lastday = date(d,$lastday);
$firstday = mktime(0,0,0,$month,1,$year);
$day_of_week = date(l, $firstday);
echo "<tr>\n";

echo "<h1>$day_of_week</h1>";
switch ($day_of_week) {

case 'Monday':

echo "<td></td>";
break; 

case 'Tuesday':
echo str_repeat("<td></td>",2);
break;

case 'Wednesday':
echo str_repeat("<td></td>",3);
break;

case 'Thursday':
echo str_repeat( "<td></td>",4);
break;

case 'Friday':
echo str_repeat( "<td></td>",5);
break;

case 'Saturday':
echo str_repeat("<td></td>",6);
}
$weekArray = $arrayName = array("",'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

$counter=1; 
while($counter<=$lastday){ 
$day=mktime(0,0,0,$month,$counter,$year);
$day_of_week=date(l,$day);
if($day_of_week == 'Sunday'){echo "<tr>\n";}
echo "<td id=$counter class='date $day_of_week'>$counter</td>\n";
if($day_of_week == 'Saturday') {echo "</tr>\n";}
$counter++; 
}
echo "</table></td><td></td></tr></table>\n";

?>