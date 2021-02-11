<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style type="text/css">
		body{
			font-family: arial;
			justify-content: center;
			align-content: center;
			display: flex;
			background: dodgerblue;
		}
		.main_container{
			width:400px;
			background: #eee;
			text-align: center;
			border-radius: 15px;
			padding: 20px;
		}
		.progress_bar{
			width:100%;
			height:50px;
			background: #ddd;
			border-radius: 50px;
			overflow: hidden;
			position: relative;
		}
		.progress_bar_inner{
			position:absolute;
			width:100%;
			height:100%;
			background: #55dd55;
			transition: all 0.2s;
		}
		.decision_btn{
			width:70px;
			height:70px;
			border-radius: 50%;
			border: 0px;
			color:#fff;
			cursor: pointer;
			font-size: 35px;
			outline: none;
			box-shadow: inset 4px 4px 10px rgba(255,255,255,0.5),
						inset -4px -4px 10px rgba(0,0,0,0.3),
						2px 2px 5px rgba(0,0,0,0.5);
		}
		.decision_btn:active{
			transform: translateY(2px);
			box-shadow: inset 2px 2px 10px rgba(255,255,255,0.5),
						inset -2px -2px 10px rgba(0,0,0,0.3),
						2px 2px 5px rgba(0,0,0,0.5);
		}
		.right{
			background: #00cc33;
		}
		.wrong{
			background: #ff5500;
		}
		.score{
			padding: 10px;
			background: #ddd;
			border-radius: 50px;
		}
		#field{
			padding: 15px;
			font-size: 30px;
			font-weight: bold;
			border-radius: 5px;
			color:#333;
			margin:auto;
		}
		.starting_div,.final_score_div{
			width:100%;
			height: 100%;
			background: dodgerblue;
			position: fixed;
			display: flex;
			justify-content: center;
			align-items:center;
			top:0px;
			left: 0px;
		}
		.final_score_div{
			display: none;
		}
		.starting_div button, .final_score_div button{
			padding:10px 20px;
			border-radius: 10px;
			background:#33dd33;
			font-size: 20px;
			color:#fff;
			border:0px;
			box-shadow: inset 3px 3px 10px rgba(255,255,255,0.6),
						inset -3px -3px 10px rgba(0,0,0,0.6),
						2px 2px 5px rgba(0,0,0,0.5);
			outline: none;
		}
		.starting_div button:active ,.final_score_div button:active{
			transform: scale(0.97) translateY(3px);
			box-shadow: inset 1px 1px 5px rgba(255,255,255,0.6),
						inset -1px -1px 5px rgba(0,0,0,0.6),
						1px 1px 5px rgba(0,0,0,0.5);

		}
	</style>
</head>
<body>
	<div class="main_container">
		<div class="score">Score: <span id="score">0</span></div><br>
		<div id="field"></div>
		<br><br>
		<button class="right decision_btn" onclick="set_score(true)">&#10004;</button>
		<button class="wrong decision_btn" onclick="set_score(false)">&#10006;</button>
		<br><br><br>
		<div class="progress_bar">
			<div class="progress_bar_inner" id="progress_bar_inner"></div>
		</div>
		<br>

	</div>
	<div class="starting_div" id="starting_div">
			<button onclick="start_game();">Start</button>
	</div>

	<div class="final_score_div" id="final_score_div">
		<div style="text-align: center;background: #eee;padding: 20px;border-radius: 10px;">
			<h1>Score</h1>
			<h2 class="final_score" id="final_score">200</h2>
			<br>
			<button onclick="start_game();">Restart</button>
		</div>
	</div>


	<script type="text/javascript">
		var score,a,b,c,d,wrong_ans,right_ans,ans_array,final_ans,time_int,progress_bar;
		score = 0;

		function start_game(){
			score = 0;
			progress_bar = 100;
			document.getElementById("starting_div").style.display = "none";
			document.getElementById("final_score_div").style.display = "none";
			document.getElementById("score").innerHTML = score;
			time_int = setInterval(function(){
				if(progress_bar <= 0){
					clearInterval(time_int);
					document.getElementById("progress_bar_inner").style.width = progress_bar+"%";
					document.getElementById("final_score").innerHTML = score;
					document.getElementById("final_score_div").style.display = "flex";
					return 0;
				}
				document.getElementById("progress_bar_inner").style.width = progress_bar+"%";
				progress_bar--;
			},100);
		}

		function random_num(){
			a = Math.floor(Math.random() * 200);
			b = Math.floor(Math.random() * 200);
			c = ["+","-","*","/"];
			d = c[Math.floor(Math.random() * c.length)]

			wrong_ans = (Math.random() * 200).toFixed(2);
			right_ans = (eval(a+d+b).toFixed(2));
			ans_array = [wrong_ans,right_ans];
			final_ans = ans_array[Math.floor(Math.random() * ans_array.length)];

			document.getElementById("field").innerHTML = ""+a+" "+d+" "+b+" = "+final_ans+" ?";
		}
		random_num();
		function set_score(ans){
			if(ans == check_ans()){
				if(progress_bar <= 100){
					progress_bar += 20;
				}
				score += 10;
				document.getElementById("score").innerHTML = score;
				random_num();
			}else{
				if(score != 0){
					progress_bar -= 20;
				}
				score -= 10;
				document.getElementById("score").innerHTML = score;
				random_num();
			}
		}

		function check_ans(){
			console.log(final_ans+"\n"+right_ans);
			if(final_ans == right_ans){
				return true;
			}else{
				return false;
			}
		}
	</script>
</body>
</html>