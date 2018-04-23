
  $(function () {

    $(".lobby").hide();
    $(".recentq").hide();
    $("#1").hide();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#ul1").hide();
    $("#ul2").hide();
    $("#ul3").hide();
    $("#ul4").hide();


    var msg_count = 0;
    var room = "";
    var voted = [false, false, false, false, false, false, false, false];
    var socket = io();

    var user = {
      "username": "anonymous",
      "votedQuestions": [],
      "room": null,
      "askedQuestions": [] //time = new Date();

    };

    // Connect to socket.io
               var socket = io.connect('http://127.0.0.1:3000');
               // Check for connection
               if(socket !== undefined){
                   console.log('Connected to socket...');
                 };

    $('#create_button').click(function(){
      user.room = $('#input_rm_name').val(); //This might have to be moved to sendMSG
      room = $('#input_rm_name').val();
      socket.emit('join name', room);
      return false;
    });

    $('#leave_button').click(function(){
      socket.emit('leave', room);
      return false;
    });

    socket.on('name taken', function(){
      alert("room does not exist");
    });

    socket.on('name good', function(){
      $(".prompt").hide();
      $(".recentq").toggle();
      $(".room-area").toggle();
      $(".lobby").toggle();
    });

    socket.on('get out!', function(){
      socket.emit('student leave', room);
      socket.emit('user', user); //send user data to server
      console.log("room exiting and saving data");
    });

    $('#send_msg_button').click(function(){
      socket.emit('chat message', $('#m').val(), $('#input_rm_name').val());
      var time = new Date();
      user.askedQuestions.push($('#m').val(), time);
      return false;
    });

    socket.on('chat message', function(msg){
      msg_count ++;
      for(i=4;i>1;i--){
        var sh = $('#'+(i-1)).html();
        $('#'+i).text(sh);
        var th = $('#ul'+(i-1)).html();
        $('#ul'+i).text(th);
        voted[i]=voted[i-1];
      }
      voted[1]=false;
      $('#1').text(msg);
      $('#ul1').text("1");
      $("#"+msg_count).toggle();
      $("#ul"+msg_count).toggle();
    });

    $("button").click(function(){
      var id = ($(this).attr('id'));
      if(voted[id] == false){
        var current_votes = $('#ul'+id).html();
        user.votedQuestions.push(question);
        var question = $('#'+id).html();
        user.votedQuestions.push(question);
        socket.emit('vote', room, id, current_votes, question);
        voted[id] = true;
      }
    });

    socket.on('vote_recieved', function(buttonID){
      $('#ul'+buttonID).html(function(i, val) {return +val+1});
    });

    // If browser status changes...
  $(window).on("unload", function(e) {
    socket.emit('student leave', room); //untested in this function
    console.log("student left room");
  });

  });
