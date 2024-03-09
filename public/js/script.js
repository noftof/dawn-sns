$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  // $('.modalClose').on('click', function () {
  //   $('.modal').fadeOut();
  //   return false;
  // });
});




// $(function () {
//   $('.modalopen').on('click', function () {
//     var postId = $(this).data('postid'); // data-postid属性からポストIDを取得
//     $('#postId').val(postId); // hiddenフィールドにポストIDを設定
//     $('#upPost').val(postContent);
//     var target = $(this).data('target');
//     $('#' + target).fadeIn(); // モーダルを表示
//   });

//   $('.modalClose').on('click', function () {
//     $('.modal').fadeOut(); // モーダルを閉じる
//   });
// });
