<?php $cost = 5;
  	
$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
$salt = base64_encode($salt);
$salt = str_replace('+', '.', $salt);
$hash = crypt('KNOWledge', '$2y$10$'.$salt.'$');
  	
  	echo $hash;
  	$hsh = crypt('KNOWledge', $hash);
  	echo "\n";
  	echo $hsh;
  	?>
