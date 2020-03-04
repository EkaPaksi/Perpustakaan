  <script src="./assets/js/jquery-1.12.4.js"></script>
  <script src="./assets/js/jquery.dataTables.min.js"></script>
  <script src="./assets/js/dataTables.bootstrap.min.js"></script>
  <script src="./assets/timepicker/bootstrap-datepicker.js"></script>

</head>
<body>
<div class='panel panel-border panel-primary'>
<div class='panel-heading'> 
<h3 class='panel-title'><i class='fa fa-list'></i>Log Email</h3> 
    </div>  <div class='panel-body'> 
    <div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text" name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />

      <input type="button" name="reset" id="reset" value="Reset" class="btn btn-info" />
     </div>
    </div>
    <br />
	 <div class="='table table-hover">
    <table id="order_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Status</th>
       <th>Nama</th>
       <th>Email</th>
	   <th>Info</th>
	   <th>Tanggal</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"./list/fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
  
  
 }); 
 
 $('#reset').click(function(){
		location.reload();
	});
 
});
</script>
</script>