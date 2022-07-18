<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<title>tim kiem bang PHP vs AJAX</title>
</head>
<style>
	* {
		padding: 0;
		margin: 0;
		box-sizing: border-box;
	}

	.search {
		width: 400px;
		height: 40px;
		margin: auto;
		background-color: red;
		position: relative;
		border-radius: 5px;
		margin-top: 50px;


	}

	[type=text] {
		width: 100%;
		height: 100%;
		position: absolute;
		font-size: 16px;
		border: 1px solid black;
		border-radius: 4px;
		left: 0;
		top: 0;
		outline: none;
		padding: 0px 20px 0px 40px;
		color: #4B9C84;


	}

	[type=submit] {
		height: 30px;
		width: 30px;
		position: absolute;
		top: 50%;
		left: 0;
		transform: translateY(-50%);
		background: none;
		border: none;
		border-right: 1px solid black;
		color: #4B9C84;
		cursor: pointer;
		/* border-radius: 5px; */
	}

	input::placeholder {
		font-size: 16px;
		color: #e3e3e3;
		font-style: italic;
	}

	.result {
		width: 100%;
		height: 200px;
		overflow-y: scroll;
		position: absolute;
		top: 100%;
		left: 0;
	}

	.result p {
		padding: 10px;
		cursor: pointer;

	}

	.result p:hover {
		background: #f2f2f2;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#search').keyup(function() {
			$('.result').remove();

			var valEl = $(this).val();


			if (valEl.length) {
				$('#btnEL').after('<div class="result"></div>');
				$.get("ajax.php", {
					val: valEl
				}, function(data) {
					$('.result').html(data);

					$('.result p').click(function() {
					var a =($(this).text());
					$('[type=text]').val(a);
					$('.result').remove();
				});
				});
				
				// đoạn mã này k chạy anh ạ
			}
			// else{
			// 	$('.result').remove();
			// }


		});
		// $(document).on("click",".result p",function(){
		// 	// alert($(this).text());
		// 	const a = $(this).text();
		// 	$('[type=text]').val(a);
		// 	$('.result').remove();

		// })

		// $('.result').click( "p",function ( e ){
		// 	alert ( "pageX is:"+ e.pageX + "pageY is:" +  e.pageY);
		// });
		// $(window).contextmenu( function( e ){
		// 	  //code ở đây
		// 	  e.preventDefault();
		//    });


		


	});
</script>

<body>
	<div class="search">

		<input id="search" type="text" placeholder="tim kiem...">


		<button id="btnEL" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
	</div>




</body>

</html>