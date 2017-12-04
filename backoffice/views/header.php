
<div id="cabezote" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	<div class='time-frame'>
		<div id='date-part'></div>
		<div id='time-part'></div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 pull-right">
		<img src="" class="img-circle" alt="Profile">
		<p id="member"><?php echo $_SESSION["user_name"];?> <span class="fa fa-chevron-down"></span>
			<br>
			<ol id="admin">
				<li><a href="profile"><span class="fa fa-user"></span>Editas tu perfil</a></li>
				<li><a href=""><span class="fa fa-file-text"></span>Términos y Condiciones</a></li>
				<li><a href="salir"><span class="fa fa-times"></span>Salir</a></li>
			</ol>
		</p>
	</div>
</div>
