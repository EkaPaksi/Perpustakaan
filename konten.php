<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
			<?php
                    $p=isset($_GET['p'])?$_GET['p']:null;
                    switch($p){
                        default:
echo'<div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><i class="fa fa-home"></i> Dashboard</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <Center><h2><b>Hai '.$hasil['nama'].'</b></h2></center>
                                    </div> 
                                </div>';
                            break;
							case "tambahk":						
							include "user/tambah.php";
							break;
							case "olahk":						
							include "user/karyawan.php";
							break;
							case "list":						
							include "list/index.php";
							break;
							case "upload":						
							include "upload/index.php";
							break;	
							case "perpus":						
							include "perpus/index.php";
							break;
							case "view":						
							include "perpus/view.php";
							break;
							case "change_passwd":						
							include "admin/index.php";
							break;
								
								}
												
								?>
</body>
</html>