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
							$file = $_FILES['file']['name'];
							mysql_query("INSERT INTO perpus(judul,pengarang,penerbit,thn_terbit,abstrak,file,create_time,create_user) VALUES('$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[thn_terbit]','$_POST[abstrak]','$file','$date','$_POST[create_user]')");
							move_uploaded_file($_FILES['file']['tmp_name'],'../upload/'.$file);
							header('location:../index.php?p=perpus');
	                    break;
                        case "hapus":
							mysql_query("DELETE FROM perpus WHERE id='$_GET[id]'");
							header('location:../index.php?p=perpus');
	                    break;
                        case "update":
						if(isset($_POST['ubah_foto'])){ 
							    $x=$_POST['x'];
								$foto         =$_FILES['file']['tmp_name'];
								$foto_name    =$_FILES['file']['name'];
								$tempat_foto  = '../upload/'.$foto_name;
								if (!$foto==""){
									$buat_foto=$foto_name;
									$d = '../upload/'.$x;
									@unlink ("$d");
									copy ($foto,$tempat_foto);
								}else{
									$buat_foto=$x;
								}
							mysql_query("UPDATE perpus SET judul='$_POST[judul]',pengarang='$_POST[pengarang]', penerbit='$_POST[penerbit]', thn_terbit='$_POST[thn_terbit]', abstrak='$_POST[abstrak]' ,file='$buat_foto', edit_user='$_POST[edit_user]', edit_time='$date' WHERE id='$_POST[id]'");
							header('location:../index.php?p=perpus');  
							}else{
							mysql_query("UPDATE perpus SET judul='$_POST[judul]',pengarang='$_POST[pengarang]', penerbit='$_POST[penerbit]', thn_terbit='$_POST[thn_terbit]', abstrak='$_POST[abstrak]' , edit_user='$_POST[edit_user]', edit_time='$date' WHERE id='$_POST[id]'");
							header('location:../index.php?p=perpus');
							}
						break;
						}
						
?>
      