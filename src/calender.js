// このファイルはJavaScriptを記述するファイルです。
// ハンズオンイベント当日の課題2で使用します。
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".content td").forEach(function (td) {
    //気分の追加
    td.addEventListener("click", function () {
      const feelValues = document.getElementsByName("feel");
      let val = Array.from(feelValues).find(
        (feelValue) => feelValue.checked
      ).value;

      const dateElement = td.innerHTML;
      if (dateElement !== "" && !dateElement.includes("div")) {
        switch (val) {
          case "good":
            td.innerHTML += "<div>😀</div>";
            break;
          case "normal":
            td.innerHTML += "<div>😑</div>";
            break;
          case "bad":
            td.innerHTML += "<div>😭</div>";
            break;
        }
      }
    });

    //気分の削除
    td.oncontextmenu = () => {
      const div = td.querySelector("div");
      div.remove();
    };
  });
});
