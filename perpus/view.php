<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Menampilkan Dokumen PDF</title>
    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    <!--<link rel='stylesheet' href='assets/css/jquery-ui-custom.css'>-->
    
    <!-- Akhir dari Bagian css -->
    <!-- Bagian js -->
    <script src='assets/js/jquery-1.10.1.min.js'></script>       
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- akhir dari Bagian js -->
    
</head>
<div class="container"> 
    <h2>Contoh Mengload Dokumen PDF</h2> 

    <div class="row">
        
        <?php 
        $query=mysql_query($con,"select * from perpus WHERE id=5");
        $data=mysql_fetch_row($query);
        ?>
        
        <div class='col-md-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <div class='pull-left'>Undang-Undang Dasar Negara Republik Indonesia 1945</div>
                    <br>
                </div>
                <div class='panel-body'>
                
                    <div style='border-bottom:1px solid #000'><?php echo $data[id]; ?></div>
                    <div><?php echo $data[nama]; ?></div><br>
                    <div>
                        <embed src="hukumPdf/<?php echo $data[file]; ?>.pdf" type='application/pdf' width='100%' height='700px'/>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div> 
</body>
</html>