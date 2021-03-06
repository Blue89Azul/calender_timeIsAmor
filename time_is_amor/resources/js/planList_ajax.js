$(function() {
    $(".week > td").on("click", function(e) {
        let clickDay = parseInt($(this).text(), 10);
        let clickMonth = $(this).children().data("month");
        $(".clickMonth").text(clickMonth + "月");
        $(".clickDay").text(clickDay + "日");
        var baseUrl = $('meta[name="_base_url"]').attr('content');
        console.log(baseUrl + '/planList');
        console.log(clickDay);
        console.log(clickMonth);
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseUrl + '/planList',
                type: 'post',
                data: {
                    'clickDay': clickDay,
                    'clickMonth': clickMonth,
                },
                dataType: 'text',
            })
            .done(function(data) {
                $(".week > td").addClass("checked");
                $(".plan-list").css("display", "block");
                if(window.matchMedia("(min-width:768px)").matches){
                  $(".calendar__table").css("height", "60vh");
                }else {
                  $(".calendar__table").css("height", "40vh");
                }
                // テキストの追加の記述
                $(".plan-list").html($.parseJSON(data));
                var target = $(e.target); //ターゲットを使うことでイベント中の箇所のみ取得可能。
                if (target.data('name')) {
                    $(".holiday").text(target.data('name'));
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                // 通信失敗時の処理
                alert('ファイルの取得に失敗しました。');
                console.log("ajax通信に失敗しました");
                console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
                console.log("textStatus     : " + textStatus); // タイムアウト、パースエラー
                console.log("errorThrown    : " + errorThrown.message); // 例外情報
                console.log("URL            : " + url);
            });
    });

    // 予定一覧表示アニメーション
  if(window.matchMedia("(min-width:768px)").matches){
    $(".calendar-footer").on("click", function() {
        $(".calendar__table").css("height", "84vh");
        $(".plan-list").css("display", "none");;
        $(".clickDay").text("");
        $(".clickMonth").text("");
        $(".holiday").text("");
    });
  } else {
    $(".calendar-footer").on("click", function() {
        $(".calendar__table").css("height", "65vh");
        $(".plan-list").css("display", "none");;
        $(".clickDay").text("");
        $(".clickMonth").text("");
        $(".holiday").text("");
    });
  }
});
