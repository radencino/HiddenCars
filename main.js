
  // jQuery for page scrolling feature - requires jQuery Easing plugin
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });
  });

  // JavaScript form validation
  $(function() {
    $("input,textarea").jqBootstrapValidation({
      preventSubmit: true,
      submitError: function($form, event, errors) {
        // additional error messages or events
      },
      submitSuccess: function($form, event) {
        event.preventDefault(); // prevent default submit behaviour
        // get values from FORM
        var name = $("input#name").val();
        var email = $("input#email").val();
        var subject = $("input#subject").val();
        var message = $("textarea#message").val();
        // Check for white space in name for Success/Fail message
        if (name.indexOf(' ') >= 0) {
          name = name.split(' ').slice(0, -1).join(' ');
        }
        $.ajax({
          url: "contact.php",
          type: "POST",
          data: {
            name: name,
            email: email,
            subject: subject,
            message: message
          },
          cache: false,
          success: function() {
            // Success message
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success')
              .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-success')
              .append("<strong>Your message has been sent. </strong>");
            $('#success > .alert-success')
              .append('</div>');
            //clear all fields
            $('#contactForm').trigger("reset");
          },
          error: function() {
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger')
              .html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append("<strong>Sorry " + name + ", it seems that our mail server is not responding. Please try again later!");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#contactForm').trigger("reset");
          },
        })
      },
      filter: function() {
        return $(this).is(":visible");
      },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
      e.preventDefault();
      $(this).tab("show");
    });
  });

