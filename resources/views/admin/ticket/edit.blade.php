<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">ตัวเลือก</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>



      </div>

      <div class="modal-body">



      		<form data-toggle="validator" action="/item-ajax/14" method="put">

      			<div class="form-group">

					<label class="control-label" for="title">สถานะ</label>

          <select name="status" class="browser-default custom-select" onchange="StatusCheck(this);">
            <option value="success">Success</option>
            <option value="waiting">Waiting</option>
            <option value="accept">Accept</option>
            <option value="failed">Failed</option>
          </select>





					<div class="help-block with-errors"></div>

				</div>

				<div class="form-group">

					<label class="control-label" for="title">เจ้าหน้าที่ไอที</label>

					<input  name="id_staff" value="{{Auth::user()->emps->id_emp}}" disabled class="form-control" data-error="Please enter details." required>

         <div id="progress" style="display: none;">
         <br>
        <label for="progress">ผลการดำเนินการ</label>
        <textarea  name="proceed"  class="form-control" data-error="Please enter details." required></textarea><br />

        </div>
         <div id="end_time" style="display: none; ">
         <br>
        <label for="end_time">เวลาในการเสร็จสิน</label> <input type="datetime-local"  name="end_time"  class="form-control" data-error="Please enter details." required><br />
        </div>

					<div class="help-block with-errors"></div>

				</div>

				<div class="form-group">


					<button type="submit" class="btn btn-success crud-submit-edit">อัพเดทระบบแจ้งซ่อม</button>

				</div>

      		</form>



      </div>

    </div>

  </div>

</div>
<script>
function StatusCheck(that) {
    if (that.value == "waiting"||that.value == "failed") {
        document.getElementById("progress").style.display = "block";
        document.getElementById("end_time").style.display = "none";
    }
    else if (that.value == "success"){
          document.getElementById("end_time").style.display = "block";
          document.getElementById("progress").style.display = "none";

    } else {

        document.getElementById("end_time").style.display = "none";

    }

}

$(function(){
  var d = new Date(),
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h;
  if(m < 10) m = '0' + m;
  $('input[type="time"][value="now"]').each(function(){
    $(this).attr({'value': h + ':' + m});
  });
});
</script>
