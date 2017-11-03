<?php
include('includes/header.php');
mostrarMensaje();
include('includes/navbar.php');
?>

<div class="container">
	<div class="row">
		<br><br><br>
		<div class="col-md-3"></div>
		<div class="col-md-5 col-sm-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-comment"></span> Chat
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</button>
						<ul class="dropdown-menu slidedown">
							<li>
								<a href="index">
									<span class="glyphicon glyphicon-off"></span>
									Salir
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<div ></div>
					<ul id="load_msg" class="chat"></ul>
				</div>
				<div class="panel-footer">
					<form name="add_tweet" method="post">
						<div class="form-group">
							<input type="hidden" id="i_t" name="i_t" value="<?php echo $id_user;?>">
							<textarea name="msg" id="msg" class="form-control" rows="2" onkeypress="process(event, this)"></textarea>
							<!--input type="text" name="tweet" id="tweet" class="form-control" rows="3"-->
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" id="enviar_enter" class="byenter">
								Enviar al presionar enter.
							</label>
						</div>
						<div class="form-group" align="right">
							<input type="button" name="send_button" id="send_button"  value="Enviar" class="btn btn-info">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-12 col-xs-12"></div>
		<div class="col-md-4 text-center col-sm-12 col-xs-12">
			© 2017 Derechos Reservados. Powered by <a href="http://linuxgx.blogspot.mx/">LiNuXiToS</a>
		</div>
	</div>
</div>
<script>
	function process(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) { //Enter keycode
			//var elementy = document.getElementById('enviar_enter');
			//var check = elementy.value;
			var checkedValue = document.querySelector('.byenter:checked').value;
			if(checkedValue=="on") {
				document.getElementById('send_button').click();
				//alert("Hola");
			}
			//alert("Sending your Message : " + document.getElementById('tweet').value);
		}
	}
	$(document).ready(function(){
		$('#send_button').click(function(){
			var msg_txt = $('#msg').val();
			var id_txt = $('#i_t').val();
			//trim() is used to remover spaces
			if($.trim(msg_txt) != ''){
				$.ajax({
					url:"ajax/insert_msg.php",
					method:"POST",
					data:{msg:msg_txt, id:id_txt},
					dataType:"text",
					success:function(data){
						$('#msg').val("");
					}
				});
			}else{
				alert("No campos vacíos.");
			}
		});
	
		setInterval(function(){
			//setInterval() method execute on every interval until called clearInterval()
			var i_t = $('#i_t').val();
			$('#load_msg').load("ajax/fetch_msg.php?i_t="+i_t).fadeIn("slow");
			//load() method fetch data from fetch.php page
		}, 1000);
	});
</script>

<?php
include('includes/footer.php');
?>