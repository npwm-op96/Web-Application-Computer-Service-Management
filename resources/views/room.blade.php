



      		<form action="{{ url('/chats') }}" method="post">
  
    
				<div class="form-group">

					<label class="control-label" for="title">เจ้าหน้าที่ไอที</label>

					<input  name="id_ticket" value="" disabled class="form-control" data-error="Please enter details." required>

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
        

					<input type="submit" class="btn btn-success">

				</div>

      		</form>


