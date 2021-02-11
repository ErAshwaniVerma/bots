<?php

$chat_id = $_REQUEST['chtid'];
$user_id = $_REQUEST['uid'];
$message_id = $_REQUEST['mid'];
$inline_message_id = $_REQUEST['imid'];

//echo $chat_id."\n\n".$user_id."\n\n".$message_id
?>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Tic Tac Toe</title>
	<script type="text/javascript" src="jquery.js"></script>
	<style type="text/css">
		body{
			font-family: arial;
			justify-content: center;
			display:flex;
			align-content: center;
			background: dodgerblue;
		}
		.main_container{
			width:340px;
			background: #eee;
			text-align: center;
			position: fixed;
			border-radius: 20px;
			box-shadow: inset -4px -4px 10px rgba(0,0,0,0.3),
						inset 4px 4px 10px rgba(255,255,255,1),
						5px 25px 30px rgba(0,0,0,0.4)
			;

		}
		table{
			padding: 0px;
			margin: auto;
			position: relative;
		}
		tr{
			padding: 0px;
			margin: 0px;
		}
		td{
			width:80px;
			height:80px;
			padding: 0px;
			margin: 0px;
			transform: translate(-11px, -1px);
		}
		.grid_buttons{
			width:100%;
			height:100%;
			margin:10px;
			border:0px;
			cursor: pointer;
			background: #dfdfdf;
			border-radius: 4px;
			text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
			font-size: 35px;
			font-weight: bolder;
			color:#333;
			outline:none;

		}
		.select_symbol_container{
			width: 100%;
			height: 100%;
			position: fixed;
			background: dodgerblue;
			z-index: 99;
			top:0px;
			left: 0px;
			justify-content: center;
			align-content: center;
			align-items: center;
			text-align: center;
			display: flex;
		}
		.radio_buttons{
			padding: 20px;
			background: #eee;
			width: 200px;
			border-radius: 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 80px;
			box-shadow: inset 4px 4px 10px rgba(255,255,255,0.5),
						inset -4px -4px 10px rgba(0,0,0,0.3),
						10px 20px 30px rgba(0,0,0,0.4);
		}
		.select_symbol_button_container button, .main_menu_button{
			padding:10px 20px;
			border:0px;
			font-size: 25px;
			background: #eebb00;
			outline: none;
			cursor: pointer;
			color: #fff;
			border-radius: 15px;
			box-shadow: inset 4px 4px 5px rgba(255,255,255,0.5),
						inset -4px -4px 5px rgba(0,0,0,0.3),
						2px 4px 10px rgba(0,0,0,0.5);
		}
		.symbol_buttons{
			background: #eee;
			color:#777;
			width: 70px;
			height: 70px;
			position: absolute;
			border-radius: 50%;
			justify-content: center;
			display: flex;
			align-items: center;
			font-size: 30px;
			font-weight: bolder;
			cursor: pointer;
			box-shadow: inset 4px 4px 5px rgba(255,255,255,0.5),
						inset -4px -4px 5px rgba(0,0,0,0.3),
						2px 4px 10px rgba(0,0,0,0.5);
		}
		.x_button{
			transform: translateX(-54px);
		}
		.o_button{
			transform: translateX(54px);
		}
		.symbol{
			opacity: 0;
			position: absolute;
			width: 100%;
			background: red;
			height: 100%;
			cursor: pointer;
		}
		.alert_div{
			width:150px;
			padding:20px;
			text-shadow: 0px 2px 5px rgba(0,0,0,0.2);
			background: #dd1100;
			position: fixed;
			bottom: -300px;
			color:#fff;
			z-index: 999;
			font-size: 12px;
			border-radius:10px;
			text-align: center;
			box-shadow: inset 4px 4px 5px rgba(255,255,255,0.5),
						inset -4px -4px 5px rgba(0,0,0,0.3),
						0px 40px 50px rgba(0,0,0,0.4);
		}
		.outer_table_container{
			background: transparent;
			width:250px;
			margin:auto;
			position: relative;
		}
		.win_stick{
			width:200px;
			opacity: 0;
			pointer-events: none;
			height:5px;
			background: red;
			position: absolute;
		}
		.one_stick{
			top:40px;
			left:25px;
		}
		.two_stick{
			top:120px;
			left:25px;
		}
		.three_stick{
			bottom:40px;
			left:25px;
		}
		.four_stick{
			bottom:120px;
			left:-60px;
			transform: rotate(90deg);
		}
		.five_stick{
			bottom:120px;
			left:25px;
			transform: rotate(90deg);
		}
		.six_stick{
			bottom:120px;
			left:110px;
			transform: rotate(90deg);
		}
		.seven_stick{
			top:120px;
			left:0px;
			width:250px;
			transform: rotate(45deg);
		}
		.eight_stick{
			top:120px;
			left:0px;
			width: 250px;
			transform: rotate(-45deg);
		}
	</style>
</head>
<body>
	<div class="select_symbol_container" id="select_symbol_container">
		<div class="select_symbol_button_container">
			<h2 style="font-size: 30px;font-weight: bolder;font-family: impact;color:#fff;text-shadow: 0px 4px 10px rgba(0,0,0,0.5);">Select Symbol</h2>
			<div class="radio_buttons">
				<label class="x_button symbol_buttons" for="x_input_symbol">&#10006;

					<input type="radio" name="symbol" class="x_symbol symbol" id="x_input_symbol" value="x">
				</label>
				<label class="o_button symbol_buttons" for="o_input_symbol">&#9711;
					<input type="radio" name="symbol" class="o_symbol symbol" id="o_input_symbol" value="o">
				</label>
			</div><br><br>
			<button onclick="start_game()">Start</button>
			<br><br><br>
		<h4>Developed By - <a href="https://t.me/ashuverma2304" style="color:#fff;">Ashwani Verma</a></h4>
		<br>
			<!--<button onclick="select_symbol(`x`)">X</button>
			<button onclick="select_symbol(`o`)">O</button>-->
		</div>
	</div>
	<div class="main_container">
		<div class="score_div">
			<h1>Score : <span id="score_text">0</span></h1>
		</div>
		<div class="outer_table_container">
			<table>
				<tr>
					<td>
						<button class="grid_buttons " onclick="change_tile(0,`one`)" id="one"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(1,`two`)" id="two"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(2,`three`)" id="three"></button>
					</td>
				</tr>

				<tr>
					<td>
						<button class="grid_buttons " onclick="change_tile(3,`four`)" id="four"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(4,`five`)" id="five"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(5,`six`)" id="six"></button>
					</td>
				</tr>
				<tr>
					<td>
						<button class="grid_buttons " onclick="change_tile(6,`seven`)" id="seven"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(7,`eight`)" id="eight"></button>
					</td>
					<td>
						<button class="grid_buttons " onclick="change_tile(8,`nine`)" id="nine"></button>
					</td>
				</tr>

			</table>
			<div class="win_stick one_stick"></div>
			<div class="win_stick two_stick"></div>
			<div class="win_stick three_stick"></div>
			<div class="win_stick four_stick"></div>
			<div class="win_stick five_stick"></div>
			<div class="win_stick six_stick"></div>
			<div class="win_stick seven_stick"></div>
			<div class="win_stick eight_stick"></div>
		</div>
		<!--<br><br>
		<div>My Symbol : <span class="my_symbol_container" id="my_symbol_container"></span></div>
	-->
		<br><br>
		<button class="main_menu_button" onclick="main_menu()" style="background:purple;">Main Menu</button>
		<br><br>
		<h4>Developed By - <a href="https://t.me/ashuverma2304" style="color:dodgerblue;">Ashwani Verma</a></h4>
		<br>
	</div>
	<div class="alert_div">
		<sapn class="alert_text">
			Hello Some Text..
		</span>
	</div>
	<script type="text/javascript">
		var dans= "",
			symbol = 'x',
			my_symbol = 'NULL',
			cpu_symbol = 'NULL',
			check_wining_for ='',
			win_status = false,
			score = 0,
			button_array = ['','','','','','','','',''],
			empty_tile = [0,1,2,3,4,5,6,7,8,9] ;

		console.log(button_array);

		$('#x_input_symbol').click(function(){
			if($(this).is(":checked")){
				$(".x_button").css({"background":"#44dd55", "color":"#fff"});
				$(".o_button").css({"background":"#eee", "color":"#777"});
			}
		});

		$('#o_input_symbol').click(function(){
			if($(this).is(":checked")){
				$(".x_button").css({"background":"#eee","color":"#777"});
				$(".o_button").css({"background":"#44dd55","color":"#fff"});
			}
		});

		function main_menu(){
			location.reload();
		}
		function show_alert(alert_text){
			$(".alert_text").html(alert_text);
			$(".alert_div").animate({"bottom":"10px"});
			setTimeout(function(){
				close_alert();
			},2000);
		}
		function close_alert(){
			$(".alert_div").animate({"bottom":"-300px"},1000);
		}
		function start_game(){
			var selected_input_symbol = "";
			if(document.getElementById("x_input_symbol").checked){
				selected_input_symbol = "x";
			}else if(document.getElementById("o_input_symbol").checked){
				selected_input_symbol = "o"
			}
			if(selected_input_symbol){
				select_symbol(selected_input_symbol);
				document.getElementById("select_symbol_container").style.display = "none";
			}else{
				show_alert("Select a Symbol before starting the game..");
			}
		}

		function show_win_sticks(stick_name){
			$(".grid_buttons").attr("disabled",true);
			$("."+stick_name).css({"opacity":"1"});
		}
		function restart_game(){
			setTimeout(function(){
				update_score_tele(score);
				var k = 0;
				button_array = ['','','','','','','','',''];
				empty_tile = [0,1,2,3,4,5,6,7,8,9];
				enable_tiles();
				$(".grid_buttons").html("");
				$(".win_stick").css({"opacity":"0"});
				disable_tiles();
				symbol = my_symbol;
				setTimeout(function(){
					win_status = false;
				},500);
			},2000);
		}

		function disable_tiles(){
			$(".grid_buttons").attr("disabled",true);
		}
		function enable_tiles(){
			var ik = 0;
			var enabele_tile_id = "";
			for(ik = 0; ik<=empty_tile.length; ik++){
				if(ik == 0){
					enabele_tile_id = "one";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 1){
					enabele_tile_id = "two";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 2){
					enabele_tile_id = "three";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 3){
					enabele_tile_id = "four";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 4){
					enabele_tile_id = "five";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 5){
					enabele_tile_id = "six";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 6){
					enabele_tile_id = "seven";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 7){
					enabele_tile_id = "eight";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}else if(ik == 8){
					enabele_tile_id = "nine";
					$("#"+enabele_tile_id).attr("disabled",false);
					console.log(enabele_tile_id);
				}
			}
		}
		function change_tile(btn_arry,id){
			if(symbol == "x"){
				button_array[btn_arry] = symbol;
				document.getElementById(id).innerHTML = "&#10006;";
				document.getElementById(id).disabled = true;
				check_winings(my_symbol);
				check_winings(cpu_symbol);
				check_all_turns();
				disable_tiles();
				if(dans == "" && win_status != true){
					setTimeout(function(){
						win_status = true;
						score -= 10;
						if(score <=0){
							score = 0;
							$("#score_text").html(score);
						}else if(score >= 1){
							$("#score_text").html(score);
						}
						//alert("Draw...");
						show_alert("Match Draw..!!");
						restart_game();
					},1000);
				}
				if(symbol == my_symbol){
					setTimeout(function(){
						if(win_status == false){
							cpu_turn();
						}
					},1000);
				}
				symbol = 'o';
				//console.log("My symbol :"+my_symbol);
				//console.log("CPU symbol :"+cpu_symbol);
				//console.log(button_array);
				//console.log(empty_tile);
				//console.log(symbol);
			}else if(symbol == "o"){
				button_array[btn_arry] = symbol;
				document.getElementById(id).innerHTML = "&#9711;";
				document.getElementById(id).disabled = true;
				check_winings(my_symbol);
				check_winings(cpu_symbol);
				check_all_turns();
				disable_tiles();
				if(dans == ""){
					setTimeout(function(){
						win_status = true;
						score -= 10;
						if(score <=0){
							score = 0;
							$("#score_text").html(score);
						}else if(score >= 1){
							$("#score_text").html(score);
						}
						//alert("Draw...");
						show_alert("Match Draw..!!");
						restart_game();
					},1000);
				}
				if(symbol == my_symbol){
					setTimeout(function(){
						if(win_status == false){
							cpu_turn();
						}
					},1000);
				}
				symbol = 'x';
				//console.log("My symbol :"+my_symbol);
				//console.log("CPU symbol :"+cpu_symbol);
				//console.log(button_array);
				//console.log(empty_tile);
				//console.log(symbol);
			}
		}

		function select_symbol(sym){
			if(sym == "x"){
				symbol="x";
				my_symbol = 'x';
				cpu_symbol = 'o';
				//document.getElementById("my_symbol_container").innerHTML = my_symbol;
				//console.log("My symbol : "+my_symbol);
				//console.log("CPU symbol : "+cpu_symbol);
			}else if(sym == 'o'){
				symbol="o";
				my_symbol = 'o';
				cpu_symbol = 'x';
				//document.getElementById("my_symbol_container").innerHTML = my_symbol;
				//console.log("My symbol : "+my_symbol);
				//console.log("CPU symbol : "+cpu_symbol);
			}
		}

		var target_tile = "";
		function cpu_turn(){
			var random_tile = cpu_decision();
			switch(random_tile){
				case 0:
					target_tile = "one";
					break;
				case 1:
					target_tile = "two";
					break;
				case 2:
					target_tile = "three";
					break;
				case 3:
					target_tile = "four";
					break;
				case 4:
					target_tile = "five";
					break;
				case 5:
					target_tile = "six";
					break;
				case 6:
					target_tile = "seven";
					break;
				case 7:
					target_tile = "eight";
					break;
				case 8:
					target_tile = "nine";
					break;
				default:
					target_tile ="";
			}
			change_tile(random_tile,target_tile);
			enable_tiles();
			//console.log("Target Tile : "+target_tile+" \nRandom Tile : "+random_tile);
		}

		function cpu_decision(decision){

			if(button_array[0] == "" && button_array[1] == cpu_symbol && button_array[2] == cpu_symbol){
				return 0;
			}else if(button_array[0] == cpu_symbol && button_array[1] == "" && button_array[2] == cpu_symbol){
				return 1;
			}else if(button_array[0] == cpu_symbol && button_array[1] == cpu_symbol && button_array[2] == ""){
				return 2;
			}



			 else if(button_array[3] == "" && button_array[4] == cpu_symbol && button_array[5] == cpu_symbol){
				return 3;
			}else if(button_array[3] == cpu_symbol && button_array[4] == "" && button_array[5] == cpu_symbol){
				return 4;
			}else if(button_array[3] == cpu_symbol && button_array[4] == cpu_symbol && button_array[5] == ""){
				return 5;
			}

			 else if(button_array[6] == "" && button_array[7] == cpu_symbol && button_array[8] == cpu_symbol){
				return 6;
			}else if(button_array[6] == cpu_symbol && button_array[7] == "" && button_array[8] == cpu_symbol){
				return 7;
			}else if(button_array[6] == cpu_symbol && button_array[7] == cpu_symbol && button_array[8] == ""){
				return 8;
			}


			 else if(button_array[0] == "" && button_array[3] == cpu_symbol && button_array[6] == cpu_symbol){
				return 0;
			}else if(button_array[0] == cpu_symbol && button_array[3] == "" && button_array[6] == cpu_symbol){
				return 3;
			}else if(button_array[0] == cpu_symbol && button_array[3] == cpu_symbol && button_array[6] == ""){
				return 6;
			}


			 else if(button_array[1] == "" && button_array[4] == cpu_symbol && button_array[7] == cpu_symbol){
				return 1;
			}else if(button_array[1] == cpu_symbol && button_array[4] == "" && button_array[7] == cpu_symbol){
				return 4;
			}else if(button_array[1] == cpu_symbol && button_array[4] == cpu_symbol && button_array[7] == ""){
				return 7;
			}


			 else if(button_array[2] == "" && button_array[5] == cpu_symbol && button_array[8] == cpu_symbol){
				return 2;
			}else if(button_array[2] == cpu_symbol && button_array[5] == "" && button_array[8] == cpu_symbol){
				return 5;
			}else if(button_array[2] == cpu_symbol && button_array[5] == cpu_symbol && button_array[8] == ""){
				return 8;
			}


			 else if(button_array[0] == "" && button_array[4] == cpu_symbol && button_array[8] == cpu_symbol){
				return 0;
			}else if(button_array[0] == cpu_symbol && button_array[4] == "" && button_array[8] == cpu_symbol){
				return 4;
			}else if(button_array[0] == cpu_symbol && button_array[4] == cpu_symbol && button_array[8] == ""){
				return 8;
			}

			 else if(button_array[2] == "" && button_array[4] == cpu_symbol && button_array[6] == cpu_symbol){
				return 2;
			}else if(button_array[2] == cpu_symbol && button_array[4] == "" && button_array[6] == cpu_symbol){
				return 4;
			}else if(button_array[2] == cpu_symbol && button_array[4] == cpu_symbol && button_array[6] == ""){
				return 6;
			}
			else{

				if(button_array[0] == "" && button_array[1] == my_symbol && button_array[2] == my_symbol){
					return 0;
				}else if(button_array[0] == my_symbol && button_array[1] == "" && button_array[2] == my_symbol){
					return 1;
				}else if(button_array[0] == my_symbol && button_array[1] == my_symbol && button_array[2] == ""){
					return 2;
				}



				 else if(button_array[3] == "" && button_array[4] == my_symbol && button_array[5] == my_symbol){
					return 3;
				}else if(button_array[3] == my_symbol && button_array[4] == "" && button_array[5] == my_symbol){
					return 4;
				}else if(button_array[3] == my_symbol && button_array[4] == my_symbol && button_array[5] == ""){
					return 5;
				}

				 else if(button_array[6] == "" && button_array[7] == my_symbol && button_array[8] == my_symbol){
					return 6;
				}else if(button_array[6] == my_symbol && button_array[7] == "" && button_array[8] == my_symbol){
					return 7;
				}else if(button_array[6] == my_symbol && button_array[7] == my_symbol && button_array[8] == ""){
					return 8;
				}


				 else if(button_array[0] == "" && button_array[3] == my_symbol && button_array[6] == my_symbol){
					return 0;
				}else if(button_array[0] == my_symbol && button_array[3] == "" && button_array[6] == my_symbol){
					return 3;
				}else if(button_array[0] == my_symbol && button_array[3] == my_symbol && button_array[6] == ""){
					return 6;
				}


				 else if(button_array[1] == "" && button_array[4] == my_symbol && button_array[7] == my_symbol){
					return 1;
				}else if(button_array[1] == my_symbol && button_array[4] == "" && button_array[7] == my_symbol){
					return 4;
				}else if(button_array[1] == my_symbol && button_array[4] == my_symbol && button_array[7] == ""){
					return 7;
				}


				 else if(button_array[2] == "" && button_array[5] == my_symbol && button_array[8] == my_symbol){
					return 2;
				}else if(button_array[2] == my_symbol && button_array[5] == "" && button_array[8] == my_symbol){
					return 5;
				}else if(button_array[2] == my_symbol && button_array[5] == my_symbol && button_array[8] == ""){
					return 8;
				}


				 else if(button_array[0] == "" && button_array[4] == my_symbol && button_array[8] == my_symbol){
					return 0;
				}else if(button_array[0] == my_symbol && button_array[4] == "" && button_array[8] == my_symbol){
					return 4;
				}else if(button_array[0] == my_symbol && button_array[4] == my_symbol && button_array[8] == ""){
					return 8;
				}

				 else if(button_array[2] == "" && button_array[4] == my_symbol && button_array[6] == my_symbol){
					return 2;
				}else if(button_array[2] == my_symbol && button_array[4] == "" && button_array[6] == my_symbol){
					return 4;
				}else if(button_array[2] == my_symbol && button_array[4] == my_symbol && button_array[6] == ""){
					return 6;
				}

				else{
					check_empty_tile();
					var random_tile_number = empty_tile[Math.floor(Math.random() * empty_tile.length)];
					//console.log("Empty Tile Number : "+random_tile_number);
					return random_tile_number;
				}
			}

		}

		var j = 0;
		function check_empty_tile(){
			empty_tile = [];
			for(j=0; j <= button_array.length; j++){
				if(button_array[j] == ''){
					empty_tile.push(j);
				}
			}
		}
		var i = 0;
		function check_all_turns(){
			var turns = '';
			for(i=0; i <= button_array.length; i++){
				if(button_array[i] == ''){
					turns++;
				}
			}
			//console.log(turns);
			dans = turns;
		}
		function check_winings(win_for){
			setTimeout(function(){
				if(win_for == cpu_symbol){
					check_wining_for = cpu_symbol;
				}else if(win_for == my_symbol){
					check_wining_for = my_symbol;
				}
				if(button_array[0] == check_wining_for && button_array[1] == check_wining_for && button_array[2] == check_wining_for){
					win_status = true;
					show_win_sticks("one_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[3] == check_wining_for && button_array[4] == check_wining_for && button_array[5] == check_wining_for){
					win_status = true;
					show_win_sticks("two_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[6] == check_wining_for && button_array[7] == check_wining_for && button_array[8] == check_wining_for){
					win_status = true;
					show_win_sticks("three_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[0] == check_wining_for && button_array[3] == check_wining_for && button_array[6] == check_wining_for){
					win_status = true;
					show_win_sticks("four_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[1] == check_wining_for && button_array[4] == check_wining_for && button_array[7] == check_wining_for){
					win_status = true;
					show_win_sticks("five_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[2] == check_wining_for && button_array[5] == check_wining_for && button_array[8] == check_wining_for){
					win_status = true;
					show_win_sticks("six_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[0] == check_wining_for && button_array[4] == check_wining_for && button_array[8] == check_wining_for){
					win_status = true;
					show_win_sticks("seven_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}else if(button_array[2] == check_wining_for && button_array[4] == check_wining_for && button_array[6] == check_wining_for){
					win_status = true;
					show_win_sticks("eight_stick");
					if(win_for == my_symbol){
						score += 50;
					}else{
						score -= 50;
					}
					if(score <= 0){
						score = 0;
						$("#score_text").html(score);
					}else if(score >= 1){
						$("#score_text").html(score);
					}
					restart_game();
					//alert(win_for+" = You Win");
					if(win_for == my_symbol){
						show_alert("You Win..!!");
					}else{
						show_alert("You Lose..");
					}
				}
				return 0;
				//console.log("Win For : "+win_for);
			},500);
		}

		function update_score_tele(a){
		    /*var req = new XMLHttpRequest();
		    req.open("POST","https://api.telegram.org/bot1562821122:AAH5dwfhZD_CXtNgpjs34YwiuWUvoNmdir4/setgamescore?chat_id=<?php echo $chat_id;?>&force=true&user_id=<?php echo $user_id?>&score="+a+"&message_id=<?php echo $message_id?>&inline_message_id=<?php echo $inline_message_id; ?>", true);
		    req.send();
		    //alert();*/
		}
	</script>
</body>
</html>