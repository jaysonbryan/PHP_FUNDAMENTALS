<html>
<body>

<form method="post" action="">
	<p>Quadratic Equation</p>
	<p>value of a: <input type="number" name="a"></p>
	<p>value of b: <input type="number" name="b"></p>
	<p>value of c: <input type="number" name="c"></p>
	<p><input type="submit"></p>
</form>
</body>
</html>

<?php
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
echo $a."x² + ".$b."x + ".$c." = 0<p>";
$final=(pow($b,2))-(4*$a*$c);

if (!isset($a) or !isset($b) or !isset($c)) {
	echo "Please input all values above!";
}
elseif ($a==0) {
	echo "The equation is not quadratic!";
}
elseif ($final<0) {
	$final_ans=round((($b*-1)/(2*$a)),3);
	$ipart=round((pow($b,2)-(4*$a*$c)),3);
	echo "x = $final_ans ± √$ipart<p>";
	echo "x = $final_ans + ".round(sqrt($ipart*-1),3)."i or $final_ans - ".round(sqrt($ipart*-1),3)."i<p>";
}
elseif ($final>0) {
	$rootplus=round((($b*-1)+sqrt(pow($b,2)-4*$a*$c))/(2*$a),3);
	$rootmin=round((($b*-1)-sqrt(pow($b,2)-4*$a*$c))/(2*$a),3);
	echo "x = $rootplus or $rootmin.";
}
elseif ($final==0) {
	$rootrep=round((($b*-1)+sqrt(pow($b,2)-4*$a*$c))/(2*$a),3);
	echo "x = $rootrep (repeated)";}
?>
