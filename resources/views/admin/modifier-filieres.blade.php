@extends('admin.layouts.master')

@section('content')

<style type="text/css">
	.panel-default>.panel-heading {
    color: #fff !important;
    background-color: #337ab7 !important;
    
}
</style>

<div class="col-md-9">
	<div class="panel panel-default" style="margin-top: 5px;">
        <div class="panel-heading">
          <h3 class="panel-title">Filières</h3>
        </div>
        <div class="panel-body" >
        	<p id="msg" class="alert alert-success"></p>
		    <input type="hidden" name="" value="{{$data[0]->id}}" id="id"/>
		    <input type="hidden" value="{{csrf_token()}}" id="token">

            <table class="table table-bordered" id="dynamic_field">
					<tr>
						<td><input type="" name="name" id="name" class="form-control name_list"></td>
						<td>
							<select class="form-control" id="dom_id" name="dom_id">
								<option> Choisir une catégorie</option>
								@foreach(App\domains::all() as $cData)
									<option value="{{$cData->id}}">
										{{$cData->name}}
									</option>
								@endforeach
							</select>
						</td>
					</tr>
				</table>
				<div class="form-group">
					<input type="button" class="btn btn-success" value="Enregistrer" id="btn">
                    <a href="{{url('/admin/domaines')}}" class="btn btn-primary" id="btn">Terminer</a>
				</div>
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
			var id = $("#id").val();
			var token= $("#token").val();

			$.ajax({
				type:"post",
				data:"id=" + id + "&dom_name=" + dom_name + "&_token=" + token,
				url: "<?php echo url('admin/saveDomain') ?>",
				success:function(data){
					$("#msg").show();
                    $("#msg").html("La filière à été bien modifié");
                    $("#msg").fadeOut(2500);
				}
			});
		});

		var refresh = setInterval(
			function(){

			$('#domains').load();
		},100);

		


	});
</script>
@endsection


