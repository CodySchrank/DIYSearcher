<!DOCTYPE html>
<html>
<head>
	<?php require("partials/head.php") ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$("body").on ("change", "select", function(){
			$.post("/DIYS/edit_cart_quantity", $(this).parent().serialize() , function(){
			location.reload();
			});
		}); 
	});
	</script>

</head>
<body>
<?php require("partials/header.php") ?>
 <div class="container">

<?php 
$total = 0;
if(empty($this->session->userdata("cart")))
{
	echo "CART EMPTY :_( Please go and select some kits to purchase <3";
}
else
{ ?>

 	<div class="row">
 		<table class="u-full-width">
  <thead>
    <tr>
      <th>Item</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
 <? 
	foreach ($this->session->userdata("cart") as $key => $value) 
	{
		$result = $this->DIY->get_kitinfo($value["kit_id"]);
		if(!empty($result)){
		// var_dump($result[]["name"]);
		// die();
		// else 
		// {
		// 	echo "<br>" . "item not found, gg" . "<br>";
		// }
 ?>
    <tr>
      <td><?= $result[0]["name"] ?></td>
      <td>$<?= $result[0]["price"] ?></td>
      <td>
      <form method="POST" action="/DIYS/edit_cart_quantity">
      <input type="hidden" value="<?= $value["kit_id"] ?>" name="kit_id">
      	<select name="quantity_updated">
      		<option value="1" 
<?php if($value["quantity"] == 1)
      		{
      			echo "selected=" . 'selected';
      		}
?>
      		>1</option>
      		<option value="2" 
<?php if($value["quantity"] == 2)
      		{
      			echo "selected=" . 'selected';
      		}
?>
      		>2</option>
      		<option value="3" 
<?php if($value["quantity"] == 3)
      		{
      			echo "selected=" . 'selected';
      		}
?>>3</option>
      		<option value="4" 
<?php if($value["quantity"] == 4)
      		{
      			echo "selected=" . 'selected';
      		}
?>>4</option>
      		<option value="5" 
<?php if($value["quantity"] == 5)
      		{
      			echo "selected=" . 'selected';
      		}
?>>5</option>
      		<option value="6" 
<?php if($value["quantity"] == 6)
      		{
      			echo "selected=" . 'selected';
      		}
?>
>6</option>
      	</select>
      	</form>


      <a href="/DIYS/remove_from_cart/<?= $key ?>">REMOVE</a></td>
      <td>$<?= ($value["quantity"] * $result[0]["price"]) ?></td>
    </tr>
<?php $total += ($value["quantity"] * $result[0]["price"]);
					}
	}
} 
?>
  </tbody>
</table>
</div>
	<div class="row"> 
		<div class="u-pull-right">Total:$<?= $total?>
		</div>
	</div>
	<div class="row"> 
		<a href="/DIYS/browse" class="button u-pull-right">Back to Browsing</a>
	</div>
 	<div class="row">
 		<form method="POST" action="/DIYS/done">
 			<div class="six columns">
 		 		<h4>Shipping Info</h4>
	 			<label for="first_name">First Name:</label>
	 			<input class="u-full-width"  type="text" name="first_name">
	 			<label for="first_name">Last Name:</label>
	 			<input class="u-full-width"  type="text" name="last_name">
	 			<label class="u-full-width"  for="first_name">Address:</label>
	 			<input class="u-full-width"  type="text" name="address">
	 			<label class="u-full-width"  for="first_name">City:</label>
	 			<input class="u-full-width"  type="text" name="city">
	 			<label class="u-full-width"  for="first_name">State:</label>
	 			<input class="u-full-width"  type="text" name="state">
	 			<label class="u-full-width"  for="first_name">Zip Code:</label>
	 			<input class="u-full-width"  type="text" name="zip">
	 		</div>
	 	
	 		<div class="six columns">
	 		<h4>Billing Info</h4>
	 			<label for="first_name">First Name:</label>
	 			<input class="u-full-width"  type="text" name="bfirst_name">
	 			<label for="first_name">Last Name:</label>
	 			<input class="u-full-width"  type="text" name="blast_name">
	 			<label class="u-full-width"  for="first_name">Address:</label>
	 			<input class="u-full-width"  type="text" name="baddress">
	 			<label class="u-full-width"  for="first_name">City:</label>
	 			<input class="u-full-width"  type="text" name="bcity">
	 			<label class="u-full-width"  for="first_name">State:</label>
	 			<input class="u-full-width"  type="text" name="bstate">
	 			<label class="u-full-width"  for="first_name">Zip Code:</label>
	 			<input class="u-full-width"  type="text" name="bzip">
	 		<h4>Credit Card Info</h4>
	 			<label for="cc">Credit Card Number:</label>
	 			<input class="u-full-width"  type="text" name="cc">
	 			<label for="security">Security Code:</label>
	 			<input class="u-full-width"  type="text" name="security">
	 			<label for="month">Expiration Month:</label>
	 			<input class="u-full-width"  type="text" name="month">
	 			<label for="year">Expiration Year:</label>
	 			<input class="u-full-width"  type="text" name="year">
	 		</div>
	 	
	 	<div class="row">
	 		<div class="twelve rows">
	 			<input type="submit" value="PURCHASE" class="u-full-width button-primary button">
	 		</div>
	 	</form>
	 	</div>
 	</div>
 </div>