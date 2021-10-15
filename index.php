<?php

// 10 _ iterpimas
include('./Class/Item.php');
include('./Class/Vending_machine.php');

// 11 _ sukuriami sesiu itemu masyvas
// pvz.: new Item(‘Snickers’, ‘A01’, 2, 0.90)
$items = [

	new Item('Mars', 'A01', 3, 1.10),
	new Item('Sprite', 'A02', 2, 1.50),
	new Item('Sandwitch', 'A03', 4, 3.50),
	new Item('Water', 'A04', 0, 1.30),
	new Item('Milk', 'A05', 5, 2.60),
	new Item('Kalev', 'A06', 3, 4.50),
];

// 27 _ kuriama nauja vending machine
$vendingMachine = new VendingMachine($items);   
?>

<!-- 9 -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>vending machine</title>
</head>

<!-- 14 _ produktai atvaizduoti lenteleje
 -->
 <body>
	<!-- 26 _ vykdomas metodas post paspaudus submit _ narsykle perkraus nebe su get, o su post -->
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// 28 _ kvieciamas vend metodas
			// $_POST - specialus php kintamasis,
			// kuris yra masyvo tipo ir laiko visus
			// is formos atsiustus duomenis
			// 30 _ irasomas papildomas raktas money (atsiusta reiksme is inputo)
			// 36 _ php ["money"] paverciama skaiciais naudojant floatval _ $moneySum(vadinasi vend metode)
			// (int) naudojamas, tik tuomet, kai norima gauti sveikuosius skaicius
			$message = $vendingMachine->vend($_POST["code"], floatval($_POST["money"]));
		}
		else {
			$message = "";
		}
	?>
	<div class="container">
		<h1>VENDING MACHINE</h1>
	
		<table>
			<tr>
				<th class="informaton">
					Name
				</th>

				<th class="informaton">
					Code
				</th>

				<th class="informaton">
					Quantity
				</th>

				<th class="informaton">
					Price Eur
				</th>
			</tr>

			<!-- 15 _ kuriamas ciklas, kuris atvaizduoja produktus lenteleje -->
			<?php
				foreach ($items as $key => $item):
			?>
				<!-- 17 _ kuriamas html lenteles vienas row -->
				<tr>
					<th>
						<?php echo $item->getName()?>
					</th>

					<th>
						<?php echo $item->getCode()?>
					</th>

					<th>
						<?php echo $item->getQuantity()?>
					</th>

					<th>
						<?php echo $item->getPrice()?>
					</th>
				</tr>

			<!-- 16 _ baigiamas foreach ciklas -->
			<?php
				endforeach;
			?>
		</table>

		<!-- 25 _ kuriama forma
		autocomplete="off" isjungia pries tai ivestus pasiulymus -->
		<form action="" method="post" autocomplete="off">

			<div class="input-group">
				<input placeholder="enter product code" class="" type="text" name="code" id="code" value="">
			</div>

			<div class="input-group">
				<input placeholder="enter amount of money" class="" type="text" name="money" id="money" value="">
			</div>

			<button type='submit'>Buy Snack</button>

		</form>
		<?php
			echo $message;
		?>		
	</div>
</body>

</html>

