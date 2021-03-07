<style>
.nav{
    cursor:pointer;
    color:blue;
    margin:10px 0;
}
.nav:hovor{
    text-decoration:underline;
}
</style>
<legend>目前位置 : 首頁 > 分類網誌 > <span id='nav'></span></legend>
<fieldset style="display:inline-block;vertical-align:top;width:12%">
<legend>分類網誌</legend>
    <div id="t1" onclick="nav(this)" class="nav">健康新知</div>
    <div id="t2" onclick="nav(this)" class="nav">菸害防治</div>
    <div id="t3" onclick="nav(this)" class="nav">癌症防治</div>
    <div id="t4" onclick="nav(this)" class="nav">慢性病防治</div>
</fieldset>
<fieldset style="display:inline-block;width:75%">
<legend>文章列表</legend>
<div class="titles"></div>
</fieldset>

<script>
$("#nav").text($(#t1).text());
geTtitle(1)

function nav(type){
    let str=$(type).text()
    $("#nav").text(str)
    let t=$(type).arrt('id').replace("t","")
    geTtitle(t)
}
function geTtitle(type){
    $.get("api/getTitle.php",{id},function(titles){
        $(".titles").html(titles)
    })
}
function getNews(id){
    $.get("api/getNews.php",{id},function(news){
        $(".titles").html(news )
    })
}
</script>