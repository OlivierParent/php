<?php
$a = [
    'i1' => null,
    'i2' => 0,
    'i3' => 1,
    's1' => '',
    's2' => '0',
    's3' => 'x',
    'b1' => false,
    'b2' => true,
    'a1' => [],
    'a2' => [null],
];
?><!doctype html>
<html lang="nl">
<head>
	<meta charset="UTF-8" />
	<title>Variabelen</title>
</head>
<body>
	<table>
	<tr style="text-align: left">
		<th width="100">Sleutel</th>
		<th width="200">Waarde</th>
		<th width="100"><code>empty()</code></th>
		<th width="100"><code>isset()</code></th>
		<th width="100"><code>== 0</code></th>
		<th width="100"><code>=== 0</code></th>
	</tr>
	<tr>
		<td colspan="2"><code>$a['i0']</code></td>
		<td><code><?=empty($a['x']) ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=isset($a['x']) ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=$a['x'] == 0   ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=$a['x'] === 0  ? 'WAAR' : 'ONWAAR' ?></code></td>
	</tr>
<?php foreach ($a as $sleutel => $waarde) : ?>
	<tr>
		<td><code>$a['<?=$sleutel ?>']</code></td>
		<td><code><?=var_export($waarde, true); ?></code></td>
		<td><code><?=empty($waarde) ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=isset($waarde) ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=$waarde == 0   ? 'WAAR' : 'ONWAAR' ?></code></td>
		<td><code><?=$waarde === 0  ? 'WAAR' : 'ONWAAR' ?></code></td>
	</tr>
<?php endforeach; ?>
	</table>
</body>
</html>