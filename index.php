<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-Control" content="max-age=1209600">
</head>
<body>
	<form action="stat.php?data" method="post" id="statistic" enctype="multipart/form-data">
		<div style="font-size: 14px; width: 120px;">ID компании:</div>
		<input name="company" id="company_id" type="text" size="15" required>
		<div style="font-size: 14px; width: 80px;">Период:</div>
		<select name="type" id="type">
			<option id="7" style="width: 274px;" value="last_7d">Последние 6 дней</option>
			<option id="30" style="width: 274px;" value="last_30d">Последние 30 дней</option>
			<option id="90" style="width: 274px;" value="last_90d">Последние 90 дней</option>
			<option id="all" style="width: 274px;" value="lifetime">Все время</option>
		</select>
		
		<input name="input" type="submit" class="baton" value="Получить данные">
	</form>	
</body>
</html>
