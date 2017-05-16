<?php 
	if (isset($_POST['save'])) {
		$pertanyaan = $_POST['pertanyaan'];
		$i = count($pertanyaan);
		echo "$i";
		
	}
 ?>
	<div class="box-body">
	    <form class="form-horizontal" method="POST">
	        <div id="addinput" class="box-body">
	            <div class="form-group">
	                <div class="col-sm-12">
		                 <input name="periode" type="text" class="form-control" placeholder="Periode Penilaian">
		            </div>
		        </div>	
		        <div class="form-group">
	                <div class="col-sm-12">
		                 <a class="btn btn-info btn-block btn-flat pull-left" href="#" id="addNew">Tambah Perencanaan</a>
		            </div>
		        </div>		        
				
		    </div>   
    </div>
    <div class="box-footer">
        <input name="save" type="submit" class="btn btn-info pull-left" value="Simpan">
    </div>
    </form>    		

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
<script type="text/javascript">
$(function() {
var addDiv = $('#addinput');
var i = $('#addinput').size() + 1;

$('#addNew').live('click', function() {
$('<div id="new" class="form-group"><div class="col-sm-11"><input name="pertanyaan['+i+']" type="text" class="form-control" placeholder="Perencanaan" required></div><div class="col-sm-1"><a class="btn btn-danger btn-flat pull-right" href="#" id="remNew"><i class="fa fa-minus"></a></div></div>').appendTo(addDiv);
i++;
return false;
});

$('#remNew').live('click', function() {
if( i > 2 ) {
	$('#new').remove();
i--;
}
return false;
});
});

</script>