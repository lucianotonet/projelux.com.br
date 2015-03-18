$(function () {	
	

	/* STICKY MENU */
    //var sticky_main_menu_offset_top = $('#sticky-main-menu').height();
    var sticky_main_menu_offset_top = $('#main-menu').height();
    var offset = 0;

    var sticky_main_menu = function(){
        var scroll_top = $(window).scrollTop();   

        //if (scroll_top > sticky_main_menu_offset_top && scroll_top < offset) { 
        if (scroll_top > sticky_main_menu_offset_top) { 
            console.log(scroll_top+">"+sticky_main_menu_offset_top);
        	// $('#sticky-main-menu').removeClass('hidden');
            $('#sticky-main-menu').css('margin-top', '0px');
            //.removeClass('hidden').slideDown();  			        	     
        } else {
            console.log(scroll_top+"<"+sticky_main_menu_offset_top);
                // $('#sticky-main-menu').addClass('hidden');
                $('#sticky-main-menu').css('margin-top', '-50px');
            // ().addClass('hidden');        	
        }   

        offset = scroll_top;
    };
    sticky_main_menu();
    $(window).scroll(function() {
         sticky_main_menu();
    });


    /* BACK TO TOP */
    $("a[href='#top']").click(function(e) {
    	e.preventDefault();
    	$("html, body").animate({ scrollTop: 0 }, 1000);
    });


    /* FILTERS */
    $('#content').isotope();


    /**  AJAX FORM  **/ 
    $('form.contact-form').submit(function(e) {
    
        e.preventDefault();
        $("button.submit i, button.submit span").toggleClass('hidden');
        
        //get input field values
        // var to_email        = $('input[name=to]').val(); 
        var user_name       = $('input[name=name]').val(); 
        var user_email      = $('input[name=email]').val();
        var mail_subject    = $('input[name=subject]').val();
        var mail_message    = $('textarea[name=message]').val();
    
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        // if(to_email==""){ 
        //     $('input[name=to]').css('border-color','red'); 
        //     proceed = false;
        // }
        if(user_name==""){ 
            $('input[name=name]').css('border-color','red'); 
            proceed = false;
        }
        if(user_email==""){ 
            $('input[name=email]').css('border-color','red'); 
            proceed = false;
        }
        if(mail_subject=="") {    
            $('input[name=subject]').css('border-color','red'); 
            proceed = false;
        }
        if(mail_message=="") {  
            $('textarea[name=message]').css('border-color','red'); 
            proceed = false;
        }

        //everything looks good! proceed...
        if(proceed) 
        {
            // $('.loading').addClass('show');
            // $("button.submit").hide();

            $('#mail-emulate').hide();

            // $(".loading-img").show(); //show loading image
            // $(".submit_btn").hide(); //hide submit button
            
            //data to be sent to server         
            var post_data = new FormData();    
            // post_data.append( 'toEmail', to_email );
            post_data.append( 'userName', user_name );
            post_data.append( 'userEmail', user_email );
            post_data.append( 'userSubject', mail_subject );
            post_data.append( 'userMessage',mail_message);
            
            
            //instead of $.post() we are using $.ajax()
            //that's because $.ajax() has more options and can be used more flexibly.

            $.ajax({
                url: $("form.contact-form").attr('action'),
                data: post_data,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType:'json',
                success: function(data){
                    console.info(data);
                    //load json data from server and output message     
                    if(data.type == 'error')
                    {
                        // output = '<div class="error">'+data.text+'</div>';
                        $('.alert').removeClass('hidden').removeClass('alert-success').addClass('alert-danger').html(data.text).show(500);
                    }else{
                        // output = '<div class="success">'+data.text+'</div>';

                        $('form.contact-form').slideUp(500, function(){
                            $('.alert').removeClass('hidden').html(data.text).show(500);
                        });
                        
                        //reset values in all input fields
                        $('form.contact-form input').val(''); 
                        $('form.contact-form textarea').val(''); 
                    }
                    
                    $("div.email-sent").html(output).addClass('show').slideDown();
                    //$("div.email-sent").hide().html(output).slideDown(); //show results from server
                    //$(".loading").hide(); //hide loading image
                    $(".loading").removeClass('show');
                    $("button.submit i, button.submit span").toggleClass('hidden');
                    // $("form.contact-form .submit").show(); //show submit button
                    // $('form.contact-form').slideUp(500, function(){
                    //     $('.alert').removeClass('hidden').html(data.text).show(500);
                    // });



                    // DEBUG                    
                    // if( data.debug[3] ){
                    //     var anexo = data.debug[3];
                    //     $('#mail-emulate').hide();
                    //     $('#mail-emulate .panel-body').html( data.debug[3] );
                    //     $('#mail-emulate').show();
                    // }
                    

                }
            });
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("form.contact-form input, form.contact-form textarea").keyup(function() { 
        $("form.contact-form input, form.contact-form textarea").css('border-color',''); 
        $("div.email-sent").slideUp();
    });

    /**  end TRABALHE CONOSCO FORM  **/



});