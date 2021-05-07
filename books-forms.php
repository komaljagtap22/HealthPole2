
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Search HTML Table Data by using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
   <h3 align="center">Employee Data</h3>   
   <br /><br />
<form action="/action_page.php">
<label for="fname">Enter name:</label><br>
  <input type="text" id="fname" name="fname" ><br>
<label for="email">Enter your email:</label>
<input type="email" id="email" name="email"><br>

  <label for="phone">Enter a phone number:</label>
  <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br>
 
  <div >
    <input type="text" name="search" id="search" placeholder="Search Book Details" class="form-control" />
   </div>
   <ul class="list-group" id="result"></ul>
   <br />
   <input type="submit">
   </form>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#search').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#search').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('books_data.json', function(data) {
   $.each(data, function(key, value){
    if (value.title.search(expression) != -1 || value.location.search(expression) != -1)
    {
     $('#result').append('<li class="list-group-item"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.title+' | <span class="text-muted">'+value.location+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#search').val($.trim(click_text[0]));
  $("#result").html('');
 });
});
</script>