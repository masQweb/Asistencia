<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 echo form_open();

	 		echo form_label('Username : ');
		 	$data = array(
		 		'nombre'  =>  'user_name',
		 		'edad'    => 'user_name',
		 		'value' => set_value('username'),
		 		'style' => 'width:90%'
		 	);
		 	echo form_radio($data);

		echo form_label('Sexo ');
echo form_submit($data);

	 	echo form_close(); 
	 ?>
</div>