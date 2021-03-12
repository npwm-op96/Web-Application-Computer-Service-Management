<div class="modal fade" id="edit-chat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
  
      <div class="modal-content">
  
        <div class="modal-header">
     <h5 class="modal-title primary" id="myModalLabel">Chats</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  
  
  
        </div>
        <input  type="text" hidden name="id" value="" id="id_ticket">
  
        <div class="modal-body">
                    <div class="form-group">

                        <div class="card" style="">
                            {{-- content chat --}}
                            <div class="container">
                                {{-- <div class="card mt-2">
                                <div class="card-body"> --}}
                                    {{-- <h5 class="card-title">Special title treatment</h5> --}}
                                    <div id="chatsmessage" class="card-text"></div>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                  {{-- </div>
                            </div>  --}}
                            </div>                       
                            {{-- end content  --}}
                            <div class="input-group">
                                <input type="text" class="form-control" id="content" value="" placeholder="Recipient's username" aria-label="Enter to text" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="addmessage btn btn-outline-secondary" type="button">Sent</button>
                                </div>
                              </div>
                          </div>
                        </div>
  
                      <label class="control-label" for="title"></label>
  
                      <div class="help-block with-errors"></div>
  
                  </div>

                  <div class="form-group">
                      <div class="row">
                          <div class="cols-12">

                       
                          {{-- <div class="cols-2">
                            <button type="submit"class="btn btn-success crud-submit-edit1">ส่งข้อความ</button>

                          </div> --}}

                      </div>
  
  
                  </div>
  
        </div>
  
      </div>
  
    </div>
  
  </div>
  <script>
// $( document ).ready(function() {


  $("body").on("click",".edit-chat",function(){
    let id_ticket =''
    id_ticket =  document.getElementById("id_ticket").value;
            // let id_ticket = $( "#id_ticket" ).val();

            if(id_ticket!=null){
              console.log(id_ticket)
            $.ajax({
                url: "/messages",
                method: 'GET',
                data: { 
                    id_ticket:id_ticket
                },
                success: function(data) {
                chatsmessage = data[0].chatsmessage

                // var chatsmessage = result.data
                // console.log(chatsmessage)
                // $("#chatsmessage" ).append(result);
                $.each(chatsmessage, function(index,value){
                  $("#chatsmessage" ).append("<div>"+value.content+"</div>");
                });
                // console.log(chatsmessage)
                },
            });
          }
  });
  $("body").on("click",".addmessage",function(){
    

    var content =  $('#content').val();
            var chat_id = 1
            if(content!=null){
              console.log(content)
            $.ajax({
                url: "/messages",
                method: 'POST',
                data: { 
                  content:content,
                  chat_id:chat_id
                },
                success: function(data) {
                  var messages =data[0]
                  $.ajax({
                url: "/messages",
                method: 'GET',
                data: { 
                    id_ticket:id_ticket
                },
                success: function(data) {
                chatsmessage.push(messages)
                $.each(chatsmessage, function(index,value){
                  $("#chatsmessage" ).append("<div class='d-flex justify-end'>"+value.content+"</div>");
                });
                },
            });
                },
            });
          }
  });
  </script>
  