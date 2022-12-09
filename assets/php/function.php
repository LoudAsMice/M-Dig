<?php 

function query($query){
	global $koneksi;
	$sql = $koneksi->query($query);
	$fetch = [];
	while ($fetchs = $sql->fetch_assoc()) {
		$fetch[] = $fetchs;
	}
	return $fetch;
}

function insert($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
}
function update($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
}

function delete($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
	return "1";
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function kirimemail($subject, $body, $to){
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Host = 'smtp.hollateam.id';
	$mail->Port = 465;
	$mail->SMTPAuth = true;
	$mail->Username = 'info@hollateam.id';
	$mail->Password = 'JunedGTG@2022###1';
	$mail->setFrom('info@hollateam.id', 'Informasi');
	$mail->addReplyTo('jangan-balas@hollateam.id', 'No Reply');
	$mail->addAddress($to, $to_name);
	$mail->Subject = $subject;
	$mail->msgHTML(file_get_contents('message.html'), __DIR__);
	$mail->Body = $body;

	if (!$mail->send()) {
	return 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	return 'The email message was sent.';
	}
}
 ?>
