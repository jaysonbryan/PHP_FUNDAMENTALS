<?php
$price = array(
    "Fishball" => 30,
    "Kikiam" => 40,
    "Corndog" => 50);
$error = null;
$final = null;
$SubForms = isset($_POST['submit']);
$no_of_order = '';
$amount = '';
if ($SubForms) {
    $order = isset($_POST['order']) ? $_POST['order'] : "";
    $no_of_order = isset($_POST['no_of_order']) ? $_POST['no_of_order'] : 0;
    $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;
    if (isset($order) && !array_key_exists($order, $price)) {
        $error = "Invalid order selection.";
    } elseif (!is_numeric($no_of_order) || $no_of_order <= 0) {
        $error = "Please enter a valid number of order.";
    } elseif (!is_numeric($amount) || $amount < 0) {
        $error = "Please enter a valid amount.";
    }
	else {	
		$finalAmount =$price[$order] * $no_of_order;
		$change =  $amount - $finalAmount  ;
		if ($finalAmount > $amount ) {
        $error = "Please enter valid amount.";}
        $final = "<h1>The total cost is $finalAmount php</h1>";
        $final .= "<h1>Your change is $change php</h1>";
        $final .= "<h2>Thanks for the order!</h2>";
    }}?>
<html>
<body>
<?php if (!$SubForms) { ?>
    <h2>Welcome to the canteen! Here are the price</h2>
    <ul>
        <li>Fishball - <?php echo $price["Fishball"]; ?> PHP</li>
        <li>Kikiam - <?php echo $price["Kikiam"]; ?> PHP</li>
        <li>Corndog - <?php echo $price["Corndog"]; ?> PHP</li>
    </ul>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div>
            <label for="order">Choose your order:</label><br>
            <select name="order" id="order">
                <option value="Fishball">Fishball</option>
                <option value="Kikiam">Kikiam</option>
                <option value="Corndog">Corndog</option>
            </select>
        </div>
        <br>
        <div>
            <label for="no_of_order">How many: </label><br>
            <input type="text" name="no_of_order" id="no_of_order" min="1" value="<?php echo $no_of_order; ?>" >
        </div>
        <br>
        <div>
            <label for="amount">Amount:</label><br>
            <input type="text" name="amount" id="amount" min="0" value="<?php echo $amount; ?>">
        </div>
        <br>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
<?php } elseif (isset($error)) { ?>
    <p>Error. <?php echo $error; ?> </p>
	<p>Thank You.</p>
<?php } elseif (isset($final)) { ?>
    <?php echo $final; ?>
<?php } ?>
</body>
</html>
