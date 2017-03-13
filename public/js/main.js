

//MENUE BUTTON TEST
$(document).ready(function () {

  var url = window.location.protocol + "//" + window.location.host;

  var bars = $('.menu-bar');
  var menu = $('.mobile-menu');
  var menuButton = $('.menu-button');
  var timeline = new TimelineMax({paused: true});
  var open = false;
  var body= $('body');

  timeline
  .to(bars[0], 0.3, {
    top: '5px',
    rotation: 45,
  }, 0)
  .to(bars[1], 0.3, {
    opacity: 0
  }, 0)
  .to(bars[2], 0.3, {
    top: '-7px',
    rotation: -45,
  }, 0)
  .to(menu, 0.3, {
    css:{display:'flex'}
  })

  menuButton.on('click', function () {
    $(this).toggleClass('active');
    if (open) {
      timeline.reverse();
      open = false;
    } else {
      timeline.play();
      open = true;
    }
  });

  menu.on('click', function(){
    if(open){
      timeline.reverse();
      open = false;
    }

  });


  //Kernfeature


  //Weiter Button Welcome text
var button = $('.welcome-text').find('a');

button.on('click', function(event){
  event.preventDefault();
  console.log('button');
  $.ajax({
    type:"POST",
    url: url+"/getPageContent/2",
  }).done(function(data, textStatus, jqXhr){
    var bookwrapper = $('.book-wrapper');
    var databookwrapper = $(data).find('.book-wrapper');

    var buttons = $('.button-wrapper');
    var databuttons = $(data).find('.button-wrapper');
    var main = $('.main_book');

    main.before(databuttons);
    bookwrapper.replaceWith(databookwrapper);

  });

});
  //Next Button
  var ButtonNext = '.button-next';

  $(document).on('click', ButtonNext, function(event){
    var page_id = $(this).attr('id');
    getNewQuestion(page_id);
  });

  //Back Button
  var ButtonBack = $('.button-back');

  ButtonBack.on('click', function(event){
    event.preventDefault();
    var page_id = $(this).attr('id');
    getNewQuestion(page_id);
  })

  function getNewQuestion(page_id){
    event.preventDefault();

    $name = 'answer_count_'+page_id;

    //Answer Count Berechnen
    if(page_id != 9){
      if(localStorage.getItem('count') == null || localStorage.getItem('count') == 0){
        localStorage.setItem('count', 0);
        var old_count = parseFloat(localStorage.getItem('count'));
        var current_count = parseFloat(localStorage.getItem($name));
        var new_count = old_count + current_count;
        localStorage.setItem('count', new_count);
      }else{
        var old_count = parseFloat(localStorage.getItem('count'));
        var current_count = parseFloat(localStorage.getItem($name));
        var new_count = old_count + current_count;
        localStorage.setItem('count', new_count);
      }

      //Antwort string erstellen
      if(localStorage.getItem('answers') == null){
        localStorage.setItem('answers', '');
        var old_answers = localStorage.getItem('answers');
        var current_answer = localStorage.getItem(page_id);
        var new_answers = localStorage.setItem('answers', current_answer);
      }else{
        var old_answers = localStorage.getItem('answers');
        var current_answer = localStorage.getItem(page_id);
        var new_answers = localStorage.setItem('answers', old_answers+','+current_answer);
      }
    }


    var current_answers = localStorage.getItem('answers');

    $.ajax({
      type: 'POST',
      url: url+'/getPageContent/' + page_id,
      data: {'images': current_answers},
      dataType: "html",
      success: function (data) {

        var question = $('<div>').append(data).find('#question-wrapper').html();
        $('#question-wrapper').html(question);

        var answer = $('<div>').append(data).find('#answerpage-wrapper').html();
        $('#answerpage-wrapper').html(answer);

        var next = $('<a>').append(data).find('.button-next').attr('id');
        $('.button-next').attr('id', next);

        var back = $('<a>').append(data).find('.button-back').attr('id');
        $('.button-back').attr('id', back);
      }
    });
  }

//Antwort speichern

  var answerImg = '.answer_img';

  $(document).on('click', answerImg, function(event){
    event.preventDefault();
    event.stopPropagation();
    var page_id = $('.button-next').attr('id');

    var target = $(event.target);
    var parent = target.parent();
    var img = parent.find('.answer_img');

    var img_attr = img.attr('alt');
    var img_id = parseFloat(img.attr('id'));
    //page_answer_count setzen damit er überschrieben werden kann
    //Antworten die keine Auswirkung auf Ergebniss haben sollen
    if(page_id >= 9) {
      return false;
    }else{
      localStorage.setItem(page_id, img_attr);
    }
    //Answer Count zum Typberechnen
    if(page_id == 4 || page_id == 5){
      $name = 'answer_count_'+page_id;
      localStorage.setItem($name, 0);
    }else if( page_id >= 9) {
      return false;
    }else{
      $name = 'answer_count_'+page_id;
      localStorage.setItem($name, img_id);
    }

    $('.answer_img__selected').removeClass('answer_img__selected');
    img.addClass('answer_img__selected');
  });


//Fertig stellen Antworten in db speichern

var finishButton = '.finish_button';

$(document).on('click', finishButton, function(event){
  event.preventDefault();

  var answers = localStorage.getItem('answers');
  var count = localStorage.getItem('count');

  $.ajax({
    type: "POST",
    url: url+'/anastasia/setAnswers/',
    data: {'answers': answers, 'count' : count},
    success: function (data,status) {
      console.log(data);
      localStorage.clear();
      window.location.href = url+'/home';
    }
  });

});


// Animationen ?
var question = $('.question-text');

question.css('border', '1px solid red');
TweenLite.fromTo(question, 1.0,
{
  autoAlpha: 0,
},
{
autoAlpha: 1
});
//  Productsorting add Class

  $('.categorie').on('click', function(event){

    $(this).addClass("sorting-selected");

  });


  //Footer newsletter

  var newsletter = '#newsletter-submit';

  $(document).on('click', newsletter, function(event){
    event.preventDefault();
    var email = $('#newsletter-email').val();

    $.ajax({
      type:"POST",
      url:url+'/footer/setNewsletter',
      data:{email:email},
      success: function(data){
        var messages = JSON.parse(data);
        if (messages.hasOwnProperty('errors')) {
          $(".form-error").remove();
          $(".form-success").remove();
          $('.footer-newsletter-info').append("<span class=\"form-error\"></br></br>"+messages.errors+"</span>");
        }else{
          $(".form-error").remove();
          $(".form-success").remove();
          $('.footer-newsletter-info').append("<span class=\"form-success\"></br></br>"+messages.success+"</span>");
        }
      }
    })
  });

  //Footer Contact

  var contact = '#contact-submit';

  $(document).on('click', contact, function(event){
    event.preventDefault();

    var email = $('#contact-email').val();
    var subject = $('#contact-subject').val();
    var message = $('#contact-message').val();

    $.ajax({
      type:"POST",
      url:url+'/footer/setContact',
      data:{email:email, subject:subject, message:message},
      success: function(data){
        console.log(data);

        var messages = JSON.parse(data);

        if (messages.hasOwnProperty('errors')) {
          console.log('error');
          $(".form-error").remove();
          $(".form-success").remove();
          $('.footer-contact-info').append("<span class=\"form-error\"></br></br>"+messages.errors+"</span>");
        }else{
          $(".form-error").remove();
          $(".form-success").remove();
          $('.footer-contact-info').append("<span class=\"form-success\"></br></br>"+messages.success+"</span>");
        }

      }
    })


  });

  //Backend SetOrderStatus

  var status = '#orderstatus';

  $(document).on('click', status,function(event){
      event.preventDefault();
      event.stopPropagation();

      var target = $(event.target);
      var href = target.attr('href');
      var status = href.substr(href.length - 1);

      var order_id = $('h3').attr('id');

      $.ajax({
        type: "POST",
        url:url+"/backend/order/SetOrderStatus/"+status,
        data:{'order_id':order_id},
        success: function(data, status){

          $('.abo_progress--complete').removeClass('abo_progress--complete');
          var li = target.parent();

          li.attr("class","abo_progress--complete");
        }

      })

  });

  //Rating

  var crown = ".crown";

  $(document).on('click', crown,function(event){
      event.preventDefault();
      event.stopPropagation();

    var current_crown = $(event.target);
    var rating = current_crown.attr('id');

    var div = current_crown.parent();
    var product_id = div.attr('id');

    //URL austauschen!!
      $.ajax({
        type: "POST",
        // url:url+"/profile/setRating/"+product_id,
        url: "http://localhost:8888/Endprojekt-Anastasia/profile/setRating/"+product_id,
        data:{'rating':rating},
        success: function(data, status){
          // console.log(status);
          // console.log(data);
          //
        }
      });

  });








  // $(document).on('click', crown, function(event){
  //   event.preventDefault();
  //   event.stopPropagation();
  //   var crown = $(event.target);
  //   var crown_id = crown.attr('id');
  //   var wrapper = crown.parent();
  //   var product_id = wrapper.attr('id');
  //   console.log('product_id: '+product_id);
  //   console.log('crown_id: '+crown_id);
  //   $.ajax({
  //     type: "POST",
  //     url:"http://localhost:8888/Endprojekt-Anastasia/backend/profile/setRating/"+product_id,
  //     data:{'crown_id':crown_id},
  //     success: function(data, status){
  //       console.log(data);
  //       console.log(status);
  //     }
  //
  //   });
  //
  //
  // });
//Dokument Readey Funktion END
});



// TweenLite.fromTo(
//  element,
//  duration,
//  {fromVars},
//  {toVars}
// );
