<?php

$roaster = [
	'Account' => [
		'C Harvey',
		'Dylan Bradley'
	],
	'Admin' => [
		'Cameron Richards',
		'Hamish Lee',
		'M Burns',
		'R Lowe',
		'Charles Stewart'
	]
];

/*$days_of_week = [
	'Fri',
	'Sat',
	'Sun',
	'Mon',
	'Tue',
	'Wed',
	'Thu'
];

$query_date = $_GET['year'].'-'.$_GET['month'];*/

$days = isset($_GET['daymonth']) ? cal_days_in_month(CAL_GREGORIAN, explode('-', $_GET['daymonth'])[1], explode('-', $_GET['daymonth'])[0]) : cal_days_in_month(CAL_GREGORIAN, date('m'), date('y'));


?>
<html>
<head>
	<title>PHP Dynamic Roaster Generator</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding: 15px;
		}

		td.section {
			background: gray;
		}
	</style>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" style="float: right;">
  <label for="bdaymonth">Pick month and year</label>
  <input type="month" id="daymonthpicker" name="daymonth" value="<?php echo isset($_GET['daymonth']) ? $_GET['daymonth'] : date('Y').'-'.date('m') ?>">
  <input type="submit" value="Go">
</form>
<table style="clear: right;">
	<tr>
		<th>Staff</th>
		<?php
			for ($i = 1; $i <= $days; $i++) {
				?>
					<th>
						<?=$i?>
						<br>
						<?php
							$datemonth = (isset($_GET['daymonth']) ? $_GET['daymonth'].'-'.$i : date('y').'-'.date('m').'-'.$i); 
							echo date('D', strtotime($datemonth));
						?>
					</th>
				<?php
			}
		?>
	</tr>
	<?php
		foreach($roaster as $section => $people) {
			?>
				<tr>
					<td class="section" colspan="<?php echo $days + 1 ?>"><?=$section?></td>
				</tr>
			<?php
			foreach($people as $person){
				?>
					<tr>
						<td><?=$person?></td>
						<?php
							for($i = 1; $i <= $days; $i++) {
								?>
									<td></td>
								<?php
							}
						?>
					</tr>
				<?php
			}
		}
	?>
</table>
</body>
</html>