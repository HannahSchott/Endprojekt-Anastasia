$(document).ready(function () {

  TweenLite.fromTo(".welcome-text", 1,

  {
    autoAlpha: 0,
    y: -20
  },
  {
    y: 0,
    autoAlpha: 1,
    delay: 0.5

  });

  var heading = $('.welcome-text').find('h3');

  TweenLite.fromTo(heading, 1.1,

  {
    autoAlpha: 0,
    y: -20
  },
  {
    y: 0,
    autoAlpha: 1,
    delay: 0.8

  });

  var text = $('.welcome-text').find('p');


    TweenLite.fromTo(text, 1.5,

    {
      autoAlpha: 0,
      y: -20
    },
    {
      y: 0,
      autoAlpha: 1,
      delay: 1.2

    });

  var button = $('.welcome-text').find('a');



    TweenLite.fromTo(button, 1.1,

    {
      autoAlpha: 0,
    },
    {
      y: 0,
      autoAlpha: 1,
      delay: 2

    });
//DOCUMENT READY END
});
