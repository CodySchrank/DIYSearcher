<h4>Orders</h4>
<table>
	<thead>
		<tr>
		<?
			$titles = array_keys($orders[0]);
			foreach ($titles as $title) {
				echo "<th>".$title."</th>";
			}
		?>
		</tr>
	</thead>
	<tbody>
	<?
		foreach ($orders as $order) {
			echo "<tr>";
			foreach ($order as $item) {
				echo "<td>".$item."</td>";
			}
			echo "</tr>";
		}
	?>
	<script type="text/javascript">
			$('tbody').children().find('td:contains("Shipped")').replaceWith(
			'<td><select><option>Shipped</option><option>Not Shipped</option></select></td>'
			);
			$('tbody').children().find('td:contains("Not Shipped")').replaceWith(
				'<td><select><option>Not Shipped</option><option>Shipped</option></select></td>'
			);
	</script>
	</tbody>
</table>