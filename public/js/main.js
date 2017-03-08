

//MENUE BUTTON TEST
$(document).ready(function () {

//   if(window.innerHeight > window.innerWidth){
//     alert("Please use Landscape!");
// }


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


  //Kernfeature

  //Next Button
  var ButtonNext = $('.button-next');

  ButtonNext.on('click', function(event){
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
    console.log('getNewQuestion');

    //Answer Count Berechnen
    if(localStorage.getItem('answer_count') == null){
       localStorage.setItem('answer_count', '0');
       var old_count = parseFloat(localStorage.getItem('answer_count'));
       var count = parseFloat(localStorage.getItem('answer_count:'+page_id));
       var new_count = old_count + count;
       localStorage.setItem('answer_count', new_count);
    }else{
      var old_count = parseFloat(localStorage.getItem('answer_count'));
      var count = parseFloat(localStorage.getItem('answer_count:'+page_id));

      var new_count = old_count + count;
      localStorage.setItem('answer_count', new_count);
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

    var current_answers = localStorage.getItem('answers');
    console.log(current_answers);

    $.ajax({
      type: 'POST',
      url: 'http://localhost:8888/Endprojekt-Anastasia/anastasia/getPageContent/' + page_id,
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
    console.log('AnswerImg');
    event.preventDefault();
    event.stopPropagation();
    var page_id = $('.button-next').attr('id');

    var target = $(event.target);
    var parent = target.parent();
    var img = parent.find('.answer_img');



    var img_attr = img.attr('alt');
    var img_id = img.attr('id');

    //page_answer_count setzen damit er überschrieben werden kann
    //Antworten die keine Auswirkung auf ergebniss haben sollen
    localStorage.setItem(page_id, img_attr);
    if(page_id == 4 || page_id == 5 || page_id == 9){
      localStorage.setItem('answer_count:'+page_id, '0');
    }else{
      localStorage.setItem('answer_count:'+page_id, img_id);
    }

    $('.answer_img__selected').removeClass('answer_img__selected');
    img.addClass('answer_img__selected');
  });


//Fertig stellen Antworten in db speichern

var finishButton = '.finish_button';

$(document).on('click', finishButton, function(event){
  event.preventDefault();

  var answers = localStorage.getItem('answers');


  $.ajax({
    type: "POST",
    url: 'http://localhost:8888/Endprojekt-Anastasia/anastasia/setAnswers/',
    data: {'answers': answers},
    success: function (data) {
      window.location.href = 'http://localhost:8888/Endprojekt-Anastasia/home';
  }
});

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
      url:'http://localhost:8888/Endprojekt-Anastasia/footer/setNewsletter',
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
      url:'http://localhost:8888/Endprojekt-Anastasia/footer/setContact',
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
//Dokument Readey Funktion END
});



// TweenLite.fromTo(
//  element,
//  duration,
//  {fromVars},
//  {toVars}
// );
