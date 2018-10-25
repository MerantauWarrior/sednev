<?php
/* HTML E-mail sending */
if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(isset($_POST['nameUser']) && !empty($_POST['nameUser']) && isset($_POST['telUser']) && !empty($_POST['telUser']) && isset($_POST['emailUser']) && !empty($_POST['emailUser']) && isset($_POST['messageUser']) && !empty($_POST['messageUser'])){
		$to      = 'sheeff2008@gmail.com, boris117@yandex.ru';
		$subj 	= 'Письмо от TAXI';
		$from	= $_POST['nameUser'];
		$email = $_POST['emailUser'];
		$tel = $_POST['telUser'];
		$message	= wordwrap($_POST['messageUser'], 70);
		$headers = 'From: '.$email. "\r\n" .
						'To: Mr.Client <'.$to.'>' . "\r\n" .
							 'Reply-To: anyone@gmail.com' . "\r\n" .
							 'X-Mailer: PHP/' . phpversion();
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$body = '<html><body>
		<table cellpadding="0" cellspacing="0" border="0" width="450">
			<tr>
				<td>Дорбый день меня зовут </td>
				<td>'.$from.'</td>
			</tr>
			<tr>
				<td>Мой телефон:</td>
				<td>'.$tel.'</td>
			</tr>
			<tr>
				<td>Мой email:</td>
				<td>'.$email.'</td>
			</tr>
			<tr>
				<td>Текст сообшения: </td>
				<td>'.$message.'</td>
			</tr>
			<tr>
				<td>Дата отправки: '.date('Y-m-d').'</td><td></td>
				<td>Время отправки: '.date('H:i:s').'</td><td></td>
			</tr>
			<tr>
				<td>IP пользователя: '.$_SERVER['REMOTE_ADDR'].'</td>
			</tr>
		</table>
		</body></html>';
		$result = '';
		/**/
		if(mail($to, $subj, $body, $headers)){
			$result = 'Письмо передано почтовому серверу';
		}else{
			$result = 'Произошла ошибка при отправке письма';
		}
	}else{
		echo "Nothing is set";
	}
}else{
	echo "Method is not POST";
}


?>