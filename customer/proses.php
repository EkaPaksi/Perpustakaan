<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d H:i:s');
			$harga = $_POST['berat'];
			$harga2 = $harga*5000;
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:
                            break;
                        case "input":						
							mysql_query("INSERT INTO customer VALUES (NULL,'$_POST[nama]','$_POST[alias]','$_POST[email]',NULL,NULL)");
							header('location:../index.php?p=cust');
	                    break;
                        case "hapus":
							mysql_query("DELETE FROM customer WHERE id='$_GET[id]'");
							header('location:../index.php?p=cust');
	                    break;
                        case "update":
							mysql_query("UPDATE customer SET nama='$_POST[nama]', alias='$_POST[alias]', email='$_POST[email]', edit_time='$date' WHERE id='$_POST[id]'");
							header('location:../index.php?p=cust');  
						break;
						}
						
?>
      