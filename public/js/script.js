// モーダル関係
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

// フォロー関係
$(function follow(user_id) {
  $.ajax({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    url: '/follow/${user_id}',
    type: "POST",
  })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
});
