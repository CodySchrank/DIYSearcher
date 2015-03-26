<h4>Kits</h4>
<table>
	<thead>
		<tr>
		<?
			$titles = array_keys($kits[0]);
			foreach ($titles as $title) {
				echo "<th>".$title."</th>";
			}
		?>
		<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?
		foreach ($kits as $kit) {
			echo "<tr>";
			foreach ($kit as $item) {
				echo "<td>".$item."</td>";
			}
			echo "<td><a href='DIYS/edit_kit/{$kit["id"]}'>Edit</a><a href='DIYS/destroy_kit/{$kit["id"]}'>Delete</a>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>