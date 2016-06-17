<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Einstellung des Viewports um mögliche Konflikte mit mobilen Geräten aus dem Weg zu gehen -->
    <title>Philipp Gabriel | Webstandards | Erweiterter Entwurf</title>
    <meta name="author" content="Philipp Gabriel">
    <link rel="stylesheet" href="../css/foundation.min.css" />
    <!-- Einbindung eines Frameworks, in diesem Fall Foundation 6 in einer angepassten Version. Siehe dazu zurb.foundation.com -->
    <link rel="stylesheet" href="../css/app.min.css" />
    <!-- <link rel="stylesheet" href="css/app.css" /> -->
    <!-- <link rel="stylesheet" href="css/foundation.css"> -->
</head>

<body><div class="row column">
    <div class="medium-8">
<form id="myForm" data-abide="ajax" action="mail.php" method="post">
    <div class="contactform">
        <div class="item item-pair">
          <label for="name">Full Name
            <input type="text" name="name" id="name" class="small-input cat_textbox" required   pattern="[a-zA-Z]+"  maxlength="255">
             <small class="error small-input">Name is required and must be a string.</small>
          </label>
          <label for="email">Email Address
            <input type="email" name="email" id="email" class="small-input cat_textbox" maxlength="255" required  >
             <small class="error small-input">An email address is required.</small>
          </label>
        </div>
        <div class="item">
          <label>Comments</label>
          <textarea  cols="10" name="message" id="message" rows="4" class="cat_listbox" required ></textarea>
          <small class="error">Please enter your comments</small>
        </div>
        <div class="item">
          <input class="button alert small" type="submit" value="Submit" id="catwebformbutton" name="btnSubmit">
        </div>
    </div>
</form>
    </div>
    </div>
    
    
</body>
<script>
 $('#myForm').submit(function(e) {
    //prevent default form submitting so it can run the ajax code first 
    e.preventDefault();

    $(this).on('valid', function() {    //if the form is valid then grab the values of these IDs (name, email, message) 
      var name = $("input#name").val();
      var email = $("input#email").val();
      var message = $("textarea#message").val();

      //Data for reponse (store the values here)
      var dataString = 'name=' + name +
        '&email=' + email +
        '&message=' + message;

      //Begin Ajax call
      $.ajax({
        type: "POST",
        url:"mail.php", //runs the php code 
        data: dataString, //stores the data to be passed 
        success: function(data){ // if success then generate the div and append the the following
          $('.contactform').html("<div id='thanks'></div>");

            $('#thanks').html("<br /><h4>Thanks!</h4>")
            .append('<p><span style="font-size:1.5em;">Hey</span> <span class="fancy">'+ name +'</span>,<br />I&acute;ll get back to you as soon as I can ;)</p>')
            .hide()
            .fadeIn(1500);
        },
        error: function(jqXHR, status, error){ //this is to check if there is any error
            alert("status: " + status + " message: " + error);
        }
      }); //End Ajax call 
      //return false;
    });
  });    
</script>
<script>
    $(document).foundation('abide', 'events'); // this was originally before the above code, but that makes the javascript code runs twice before submitting. Moved after and that fixes it.
</script>
</html>