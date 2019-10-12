@extends('admin.layouts.master')

@section('content')

<style type="text/css">
	.panel-default>.panel-heading {
    color: #fff !important;
    background-color: #337ab7 !important;
    
}
</style>

<div class="col-md-9">
	<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="text-align: left!important">
		<span class="badge badge-light">
			<span class="glyphicon glyphicon-plus"></span>
		</span>
		Ajouter un domaine d'activité
	</button> 
	<div class="collapse" id="collapseExample">
	  	<div class="well" style="background-color: #fff !important">
		    <p id="msg" class="alert alert-success"></p>
		    <input type="hidden" value="{{csrf_token()}}" id="token">
	    	<div class="form-group">
	    		<label class= "control-label">Domaine d'activité</label>
	    		<input type="text" placeholder="Entrez le nom du domaine d'activité" id="dom_name" class="form-control">
	    	</div>	
	    	<div class="form-group">
	    		<input type="submit" class="btn btn-success" value="Enregistrer le domaine" id="btn">
	    	</div>
	  	</div>
	</div>
	<div class="panel panel-default" style="margin-top: 5px;">
        <div class="panel-heading">
          <h3 class="panel-title">Filières</h3>
        </div>
        <div class="panel-body" >
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              
              <th>Actions</th>
              
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody id="domains">
          	
            
          </tbody>
        </table>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		$("#msg").hide();

		$("#btn").click(function(){
			var dom_name = $("#dom_name").val();
			var token= $("#token").val();

			$.ajax({
				type:"post",
				data:"dom_name=" + dom_name + "&_token=" + token,
				url: "<?php echo url('admin/saveDomain') ?>",
				success:function(data){
					$("#msg").show();
                    $("#msg").html("la filière à été bien ajoutée");
                    $("#msg").fadeOut(2000);
				}
			});
		});

		var auto_refresh = setInterval(
			function(){
			$('#domains').load('<?php echo url('admin/domains');?>').fadeIn("slow");
			
			},100);

		


	});
</script>
@endsection


