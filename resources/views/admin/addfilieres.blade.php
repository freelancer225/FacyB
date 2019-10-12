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
		Ajouter une sous filière
	</button> 
	<div class="collapse" id="collapseExample">
	  	<div class="well" style="background-color: #fff !important">
		    <form name="add_name" id="add_name">
		   			{{csrf_field()}}
		    	<p id="msg" class="alert alert-success"></p>
		    	{{-- <input type="hidden" value="{{csrf_token()}}" id="token"> --}}
	    	
				<table class="table table-bordered" id="dynamic_field">
					<tr>
						<td><input type="" name="name[]" id="name" class="form-control name_list"></td>
						<td>
							<select class="form-control" id="dom_id" name="dom_id[]">
								<option> Choisir une catégorie</option>
								@foreach(App\domains::all() as $cData)
									<option value="{{$cData->id}}">
										{{$cData->name}}
									</option>
								@endforeach
							</select>
						</td>
						<td><button type="button" name="add" id="add" class="btn btn-primary"> Ajouter</button></td>
					</tr>
				</table>
				<div class="form-group">
					<input type="button" class="btn btn-success" value="Enregistrer" id="btn">
				</div>
	    	</form>
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
              <th>Noms</th>
              <th>Domaines d'activités</th>
              <th>Actions</th>
              
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Domaines d'activités</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody id="filieres">
          	
            
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

		var i=1;

		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="" name="name[]" id="name" class="form-control name_list"></td><td><select class="form-control" id="dom_id" name="dom_id[]" ><option> Choisir une catégorie</option>@foreach(App\domains::all() as $cData)<option value="{{$cData->id}}">{{$cData->name}}</option>@endforeach</select></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
		});

		// $(document).on('click', '.btn_remove',function(){
		// 	var button_id = $(this).attr("id");
		// 	$("#row"+button_id+"").remove();

		// });


		$("#btn").click(function(){
			// var name = $("#name").serializeArray();
			// var token= $("#token").val();

			$.ajax({

				type:"POST",
				url: "<?php echo url('admin/saveOtherDomain') ?>",
				data:$('#add_name').serializeArray(),
				success:function(data){

					$("#msg").show();
                    $("#msg").html("la filière à été bien ajoutée");
                    $("#msg").fadeOut(2000);
                    $('#add_name')[0].reset();
				}
			});
		});

		
		
		var auto_refresh = setInterval(
			function(){
			$('#filieres').load('<?php echo url('admin/filieres');?>').fadeIn("slow");
			
			},100);

	});
</script>
@endsection


