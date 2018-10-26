<?php
/* HTML E-mail sending */
if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(isset($_POST['nameUser']) && !empty($_POST['nameUser']) && isset($_POST['messageUser']) && !empty($_POST['messageUser'])){
		$to      = 'boris117@yandex.ru';
		$subj 	= 'Заказ звонка с сайта';
		$from	= $_POST['nameUser'];
		$tel = $_POST['telUser'];
		$headers = 'From: '.$to. "\r\n" .
						'To: Mr.Client <'.$to.'>' . "\r\n" .
							 'Reply-To: '.$to.'' . "\r\n" .
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