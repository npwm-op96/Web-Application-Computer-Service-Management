<div class="modal fade" id="edit-satisfaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
   <h5 class="modal-title" id="myModalLabel">ประเมินคะแนน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>



      </div>

      <div class="modal-body">



      			<form data-toggle="validator" action="/item-ajax/14" method="put">

      			<div class="form-group">

					<label class="control-label" for="title">ระดับคะแนน</label>

          <select name="satisfaction" value="" class="browser-default custom-select">
          	<option value=""></option>
          	<option value="1">ปรับปรุง</option>
            <option value="2">พอใช้</option>
            <option value="3">ปลานกลาง</option>
            <option value="4">ดี</option>
            <option value="5">ดีมาก</option>
          </select>
					<div class="help-block with-errors"></div>

				</div>



				<div class="form-group">

					<button type="submit"class="btn btn-success crud-submit-edit1">ประเมิน</button>

				</div>

      		</form>



      </div>

    </div>

  </div>

</div>
