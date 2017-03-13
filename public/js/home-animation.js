$(document).ready(function () {

  //Logo animation

  TweenLite.fromTo(".header-logo", 0.8,

  {
    autoAlpha: 0,
    y: -20
  },
  {
    y: 0,
    autoAlpha: 1,
    delay: 0.8

  });

  //Body animation

  TweenLite.fromTo("body", 1,{
    autoAlpha: 0
  },
  {
    autoAlpha: 1,
    delay: 0.3
  })

  //Naviagation animation

  TweenLite.fromTo(".navigation-element", 0.9,
  {
  autoAlpha:0,
  y: -10
  },
  {
    y:0,
    autoAlpha: 1,
    delay:1.2
  });

  //Login/register animation

  TweenLite.fromTo(".header-subnav", 1,
  {
    autoAlpha:0,
    y:-20

  },
  {
    autoAlpha: 1,
    y:0,
    delay: 0.5

  });

  });
