

<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">แจ้งปัญหา</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        

      </div>

      <div class="modal-body">



      		<form data-toggle="validator" action="{{ route('posts.store') }}" method="POST">

      			<div class="form-group">

					<label class="control-label" for="title">รหัสผู้แจ้ง</label>

					<input type="text" name="id_emp" value="{{ Auth::user()->id_emp}}" disabled class="form-control" data-error="Please enter title." required />

					<div class="help-block with-errors"></div>

				</div>

				<div class="form-group">

					<label class="control-label" for="title">รายละเอียด</label>

					<textarea name="content" class="form-control" data-error="Please enter details." required></textarea>

					<div class="help-block with-errors"></div>

				</div>
        <div class="form-group">

					<label class="control-label" for="title">สถานะ</label>
					<input type="text" name="status" value="waiting" class="form-control" disabled>
					<br>
					<label class="control-label" for="title">ระบุประเภท</label>
					
					<select name="problem_type" class="browser-default custom-select">
			  <?php
			use App\Type_problem;
			  ?>
			  <?php $type_problem = Type_problem::latest()->get(); ?>
			  @foreach ( $type_problem as $type_problem)
				  
			  
            	<option value="{{$type_problem->name_type}}">{{$type_problem->name_type}}</option>

				@endforeach
            </select>

					<div class="help-block with-errors"></div>

				</div>

				<div class="form-group">

					<button type="submit" class="btn crud-submit btn-success">แจ้งรายการ</button>

				</div>

      		</form>

      </div>

    </div>

  </div>

</div>
