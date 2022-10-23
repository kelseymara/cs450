<?php
$lastnames=array("Smith","Kim","Davis","Miller","Taylor");
$nOne=sizeof($lastnames);
$firstnames=array("John","Anthony","Richard","Thomas","Jessica");
$nTwo=sizeof($firstnames);
$major=array("IST","CSE","EE","PHYS","ACCT");
$nThree=sizeof($major);
echo '<h1>Lottery Game 2</h1>';
if(($nOne!=$nTwo)||($nOne!=$nThree))
{
echo '<h2 style="color:red;">Sizes of lastname, firstname, and major do not match</
h2>';
}
else
{
echo "<table border=1>";
echo "<tr>";
echo "<th>Lastname</th>";
echo "<th>Firstname</th>";
echo "<th>Major</th>";
echo "</tr>";
for ($i=0;$i<$nOne;$i++) {
echo "<tr>";
echo "<td>$lastnames[$i]</td>";
        echo "<td>$firstnames[$i]</td>";
                echo "<td>$major[$i]</td>";
echo "</tr>";
}
$ranNumber=rand(0,$nOne-1);
$ranFirstName=$firstnames[$ranNumber];
$ranLastName=$lastnames[$ranNumber];
echo '<p style="color:red;font-size:200%;"> Today\'s  Winner is: '.$ranFirstName.' 
'.$ranLastName.'</p>';
/*echo $ranNumber;*/ 
}
?>
