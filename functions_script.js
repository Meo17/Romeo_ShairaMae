$(document).ready(function()
{
    var string =  $('.text').text();
    var inputVal    = string.split(',');
    var text  = inputVal[0];
    var test2 =   inputVal[1];
    var _array = [];
    inputVal.forEach((item, index)=>{
        // console.log(item);
        if(typeof item !== 'undefined' && item != "" ){
            _array.push(item);
        }
    });
    var max = Math.max.apply(Math,_array); // 3
    var min = Math.min.apply(Math,_array); // 1

    $(".num").each(function() {
        var value = $(this).text();
        var schoolname =  $(this).attr("schoolname");
        if (max == value ) {
           $('#text_winner').text(schoolname);
        }
    });


    $("#scores").attr({
       "max" : 1,        // substitute your own
       "min" : 0          // values (or variables) here
    });

    $("#addstud").click(function() {
        $("#hidecol").show();
    });

    $("#save_school").click(function() {
         var  dataString = {
            schoolname  : $("#schoolname").val(),
          };

          if ($("#schoolname").val() == "") {
                alert('Please input the School Name!');window.location='index.php';
          } else {
             $.ajax({
              type: "POST",
              url: "add_school.php",
              data: dataString,
              success: function () {
                  alert('Successfully Save!');window.location='index.php';
                  $("#hidecol").hide();
              }
            });
          }
    });

    $("#save_student").click(function() {

         var  data  = {
              school_id   : $("#select_school").val(),
              full_name   : $("#studname").val(),
              score       : $("#scores").val(),

          };

          if ($("#studname").val() == "" || $("#scores").val() == "" ) {
                alert('Please input the fields !');window.location='index.php';
          } else {
              $.ajax({
                  type: "POST",
                  url: "add_student.php",
                  data: data,
                  success: function () {
                      alert('Successfully Save!');window.location='index.php';
                      $("#hidecol").hide();
                  }
                });
          }
    });


    $("#studname").change(function() {

         var  data  = {
              school_id   : $("#select_school").val(),
              full_name   : $("#studname").val(),
          };

          $.ajax({
          type: "POST",
          url: "check_name.php",
          data: data,
          }).done(function( data ) {
         
             if(data == "true" ) {
               $("#check").show();
               $("#save_student").attr('disabled', true);
             } else {
               $("#check").hide();
               $("#save_student").removeAttr('disabled');
             }

          });
    });
})