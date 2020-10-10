jQuery( document ).ready(function($) {

    $.ajax({
       url: 'https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json',
       error: function() {
          $('#info').html('<p>An error has occurred</p>');
       },
       dataType: 'json',
       async: false,
       type: 'GET',  
       success: function(data) {
         var theContent = data; var row = '' ;
         //console.log(data);
          
          for (var i=0; i<data.length; i++) {

             row += '<tr><td>' + data[i].name+ '</td><td>' + data[i].species + '</td><td><dl class="foods"> <dt><strong class="label">Likes:</strong></dt><dd>';
             for( var j=0; j<data[i].foods.likes.length; j++ ) {
              row += '<span>- ' + data[i].foods.likes[j] + '</span><br>';
             }
             row += '</dd><dt><strong class="label">Dilikes:</strong></dt><dd>';
             for( var j=0; j<data[i].foods.dislikes.length; j++ ) {
              row += '<span>- ' + data[i].foods.dislikes[j] + '</span><br>';
             }
             row += '</dd></dl></td></tr>';
                
          }
          $('#myTable').append(row);
       }
    });


});