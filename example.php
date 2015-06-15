<?php
	require_once("BotX.php");
	$botx = New BotX();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<style type="text/css">
	table {background-color:#fff;color;#333;font:11px Tahoma}
	table tr.sampiyon {background-color: #FFE009!important;}
	table tr.uefa {background-color: #65C5F3!important;}
	table tr.even {background-color: #dcdcdc;}
	table tr.odd {background-color: #eaeaea;}
	table tr.kume {background-color: #333!important;color: #FFF!important;}
	table th {font-weight: bold;color: #C00;padding: 10px;}
	table td {text-align: center;border-bottom-width: 1px;padding: 10px;border-bottom-style: solid;border-bottom-color: #F9F9F9;padding-top: 5px;padding-right: 4px;padding-bottom: 5px;padding-left: 4px;}
</style>
<table border="0" cellspacing="0" cellpadding="0">
  	<tbody>
		<tr>
		    <th>Tarih</th>
		    <th>Kod</th>
		    <th>Takimlar</th>
		    <th>Mbs</th>
		    <th>Maç Sonucu 1</th>
		    <th>Maç Sonucu 0</th>
		    <th>Maç Sonucu 2</th>
		    <th>Çifte Şans 1</th>
		    <th>Çifte Şans 0</th>
		    <th>Çifte Şans 2</th>
		    <th>Alt 2.5</th>
		    <th>Üst 2.5</th>
		</tr>
		<?php
			$botx->matches();
			foreach ($botx->matches() as $key => $value) {
				echo '<tr class="aaaa">
					<td>'.$value["tarih"].'</td>
					<td>'.$value["kod"].'</td>
					<td>'.$value["evsahibi"].' - '.$value["misafir"].'</td>
					<td>'.$value["mbs"].'</td>
					<td>'.$value["ms1"].'</td>
					<td>'.$value["ms0"].'</td>
					<td>'.$value["ms2"].'</td>
					<td>'.$value["cs1"].'</td>
					<td>'.$value["cs0"].'</td>
					<td>'.$value["cs2"].'</td>
					<td>'.$value["a25"].'</td>
					<td>'.$value["u25"].'</td>
				</tr>';
			}
		?>
	</tbody>
</table>
<script type="text/javascript">
	$(".aaaa:even").addClass("even");
	$(".aaaa:odd").addClass("odd");
</script>
