
  //string to byte
  function get_bytes(str) {

    var i, tmp = escape(str);
    var bytes = 0;

    for (i = 0; i < tmp.length; i++) {
      if (tmp.charAt(i) == "%") {
        if (tmp.charAt(i + 1) == "u") {
          bytes += 2;
          i += 5;
        } else {
          bytes += 1;
          i += 2;
        }
      } else {
          bytes += 1;
      }
    }

    return bytes;
  }

  function label_view(element){

    element.focus(function() {
      $(this).prev().hide()  
    });

    element.blur(function() {
      if($(this).val()=='')
        $(this).prev().show()  
    });
  }

  function is_empty(el){
    return !$.trim(el.html())
  }

  function popup(url, width, height){

    var pos_left = (screen.width) ? (screen.width-width)/2 : 100;
    var pos_top = (screen.height) ? (screen.height-height)/2 : 100;

    var options = "toolbar = 0,directories = 0,status = no,menubar = 0,scrollbars = no,resizable = no,width = "+ width + ",height = " + height + ",resizable = no, mebar = no,left = " + pos_left + ",top=" + pos_top;

    return window.open(url,'_blank', options);
  }

  function wrap_mask() {
    var height = $(document).height();
    var width = $(window).width();
    $('#wrap_mask').css({'width':width,'height': height});
    $('#wrap_mask').fadeTo("slow",0.7);
  }

  function wrap_mask_close(){
    $('#wrap_mask').fadeOut("slow");
  }


  function custom_alert(data){

    var html = "";
    html += '<div> ';
    html += '  <div class="modal-dialog"> ';
    html += '    <div class="modal-content"> ';
    html += '      <div class="modal-header"> ';
    html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> ';
    html += '        <h4 class="modal-title"> ';

    if(data['ERROR'] == 'WA' || data['ERROR'] == 'WC')
      html += '      <span class="glyphicon glyphicon-warning-sign"></span> '+data['ERROR_TITLE'];

    if(data['ERROR'] == 'OA' || data['ERROR'] == 'OC')
      html += '      <span class="glyphicon glyphicon-ok"></span> '+data['ERROR_TITLE'];

    html += '      </h4> ';
    html += '    </div> ';
    html += '    <div class="modal-body">'+data['ERROR_MESSAGE']+'</div> ';
    html += '    <div class="modal-footer"> ';
    html += '      <button id="alert-confirm" type="button" class="btn btn-default" data-dismiss="modal"> ';
    html += '        <span class="glyphicon glyphicon-ok"></span> 확인 ';
    html += '      </button>';

    if(data['ERROR'] == 'WC' || data['ERROR'] == 'OC') {
      html += '    <button id="alert-cancel" type="button" class="btn btn-default" data-dismiss="modal"> ';
      html += '      <span class="glyphicon glyphicon-remove"></span> 취소';
      html += '    </button>';
    }

    html += '    </div>';
    html += '    </div>';
    html += '  </div>';
    html += '</div>';

    $("#custom-alert").html(html);
    $("#custom-alert").show();
    $("#custom-alert").modal({keyboard: false, backdrop: 'static'});
    $("#custom-alert").modal("show");
    $("#custom-alert").css({marginTop:'200px'});
    $("#custom-alert .modal-header").css({background:'#1677ce', color:'#FFFFFF'});
    $(document).keydown(function(e){

      if(e.keyCode==13) {
        $("#alert-confirm").focus();
        $("#alert-confirm").trigger('click');
      } else {
        return true;
      }
    });
  }


  function base64_encode(str) {

    var key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';

    var i = 0;
    var len = str.length;
    var c1;
    var c2;
    var c3;
    var e1;
    var e2;
    var e3;
    var e4;
    var result = [];
   
    while (i < len) {
      c1 = str.charCodeAt(i++);
      c2 = str.charCodeAt(i++);
      c3 = str.charCodeAt(i++);
     
      e1 = c1 >> 2;
      e2 = ((c1 & 3) << 4) | (c2 >> 4);
      e3 = ((c2 & 15) << 2) | (c3 >> 6);
      e4 = c3 & 63;
     
      if (isNaN(c2)) {
        e3 = e4 = 64;
      } else if (isNaN(c3)) {
        e4 = 64;
      }
     
      result.push(e1, e2, e3, e4);
    }
   
    return result.map(function (e) { return key.charAt(e); }).join('');
  }

