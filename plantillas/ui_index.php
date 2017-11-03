<?php
include('includes/header.php');
mostrarMensaje();
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">
				<a href="http://linuxgx.blogspot.mx/">LiNuXiToS</a> - Chat
			</h1>
		</div>
	</div>
	<div class="row">
		<br><br>
		<div class="col-md-4 col-sm-12 col-xs-12"></div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<form role="form" name="add_user" method="post" action="index">
				<div class="form-group float-label-control">
					<label for="">Nombre de Usuario</label>
					<input id="nickname" autofocus pattern="[á^-,*,{,},',',~,+,.()#$%&!?¡¿]+" type="text" name="nickname" class="form-control" placeholder="Nombre de Usuario" required="required">
				</div>
				<div class="form-group" align="right">
					<input type="submit" name="btn_iniciar" id="btn_iniciar"  value="Iniciar" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<br><br><br><br>
		<div class="col-md-4 col-sm-12 col-xs-12"></div>
		<div class="col-md-4 text-center col-sm-12 col-xs-12">
			© 2017 Derechos Reservados. Powered by <a href="http://linuxgx.blogspot.mx/">LiNuXiToS</a>
		</div>
	</div>
</div>

<script>
	$("input#nickname").on({
		keydown: function(e) {
		if (e.which === 32)
			return false;
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});
</script>

<?php
include('includes/footer.php');
?>