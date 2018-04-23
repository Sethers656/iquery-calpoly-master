$(function () {

  $(".lobby").hide();
  //$(".top_q").hide();

  var msg_count = -1;
  var room = "";
  var voted = [false, false, false, false, false, false, false, false];
  var local_msg_count = 0;
  var socket = io();

  var user = {
    "username": "anonymous",
    "votedQuestions": [],
    "room": null,
    "askedQuestions": [] //time = new Date();

  };

  $('#create_button').click(function(){
    var qqquota = $('#input_vote_value').val();
    room = $('#input_rm_name').val();
    socket.emit('recieve name', room, qqquota);
    return false;
  });

  $('#leave_button').click(function(){
    socket.emit('leave', room);
    return false;
  });

  socket.on('name_used', function(){
    alert("name already used");
  });

  socket.on('name good', function(){
    $(".room-area").toggle();
    $(".lobby").toggle();
  });

  $('#send_msg_button').click(function(){
    socket.emit('chat message', $('#m').val(), $('#input_rm_name').val());
    user.questions.push($('#m').val()); //log question
    user.askedQuestions.push($('#m').val(), time);
    socket.emit('user', user); //Sends user object
    return false;
  });

  socket.on('chat message', function(msg){
    for(i=4;i>1;i--){
      var sh = $('#'+(i-1)).html();
      $('#'+i).text(sh);
    }
    $('#1').text(msg);
  });

  $("button").click(function(){ //When vote button is clicked do..
    var id = ($(this).attr('id'));
    if(voted[id] == false){
      socket.emit('vote', room, id);
      voted[id] = true;
    }
  });

  $('#clear_button').click(function(){
    $("h2").remove();
  });

  socket.on('teacher_recieved', function(q){
    $.playSound('question.mp3')
    var msg = q;
    //$("top_q").toggle();
    $(".top_q").append("<h2>"+q+"</h2>");
  });

    // If browser status changes...
  $(window).on("unload", function(e) {
    socket.emit('leave', room); //close room
  });
});
