"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  var topBtn = $('.js-pageTop'),
    line = $('.js-line');
  topBtn.hide();
  line.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 300, 'swing');
    return false;
  });

  //Lineボタン表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      line.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      line.fadeOut();
    }
  });

  //Lineモーダル表示設定
  var close = $('.js-lineClose'),
    container = $('.js-lineModal');

  //開くボタンをクリックしたらモーダルを表示する
  line.on('click', function () {
    container.addClass('is-active');
    return false;
  });

  //閉じるボタンをクリックしたらモーダルを閉じる
  close.on('click', function () {
    container.removeClass('is-active');
  });

  //モーダルの外側をクリックしたらモーダルを閉じる
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.lineModal__content').length) {
      container.removeClass('is-active');
    }
  });

  //ドロワーメニュー
  $('.js-hamburger').on('click', function () {
    if ($('.js-hamburger').hasClass('is-open')) {
      $('.js-drawer-menu').removeClass('is-open');
      $("body").removeClass('is-open');
      $(this).removeClass('is-open');
    } else {
      $('.js-drawer-menu').addClass('is-open');
      $('body').addClass('is-open');
      $(this).addClass('is-open');
    }
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)
  $(document).on('click', 'a[href*="#"]', function () {
    var time = 400;
    var header = $('header').innerHeight();
    var target = $(this.hash);
    if (!target.length) return;
    var targetY = target.offset().top - header;
    $('html,body').animate({
      scrollTop: targetY
    }, time, 'swing');
    return false;
  });
});
var swiper = new Swiper(".js-swiper", {
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  }
});

var pc_item_cnt = $('.publish_com .item').length;
$('.publish_com .itemBox').addClass('item_cnt-' + pc_item_cnt);

var publish_com_swiper = new Swiper(".publish_com .itemBox", {
  loop: false,
  slidesPerView: 2,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // 前後の矢印
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    769: {
      slidesPerView: 3,
    },
    960: {
      slidesPerView: 4,
    },
    1250: {
      slidesPerView: 5,
    }
  }
});
