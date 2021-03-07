<fieldset>
<legend>目前位置 : 首頁 > 人氣文章區</legend>
<table>
    <tr>
        <td width="20%">標題</td>
        <td width="60%">內容</td>
        <td width="20%"></td>
    </tr>
    <?php
    $count=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($count/$div);
    $now=(isset($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;

    $all=$News->all(['sh'=>1]," order by good desc limit $start,$div");
    foreach($all as $news){
    ?>
    <tr>
        <td class="header"><?=$news['title'];?></td>
        <td class="tt" style="position:relative">
            <span class="title"><?=mb_substr($news['text'],0,30,'utf8');?>...</span>
            <div class="text all">
            <h3><?=$ttt[$news['type']];?></h3>
            <?=nl2br($news['text']);?>
            </div>
            
        </td>
        <td>
        <span id="vie<?=$news['id'];?>"><?=$news['good'];?></span>個人說<img src="icon/02B03.jpg" style="width:20px;height:20px">
            <?php
                if(!empty($_SESSION['login'])){
                    $ck=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]);
                    if($ck){
                        ?>
                        <a href="#" id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>'),'<?=$_SESSION['login'];?>','2'">收回讚</a>
                        <?php
                    }else{
                        ?>
                        <a href="#" id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>'),'<?=$_SESSION['login'];?>',''">讚</a>
                        <?php
                    }
                }
            ?>
        </td>
    </tr>
    <?php
    }
?>
</table>
<div class="ct">
<?php
if(($now-1)>0){
    echo "<a href='backend.php?do=pop&p=".($now-1)."'> &lt; </a>";
}
for($i=1;$i<=$pages;$i++){
    $fs=($i==$now)?"28px":"18px";
    echo "<a href='backend.php?do=pop&p=$i' style='font-size:$fs'> $i </a>";
}
if(($now+1)<=$pages){
    echo "<a href='backend.php?do=pop&p=".($now+1)."'> &gt; </a>";
}
?>
</div>
</fieldset>
<script>
$(".header").hover(function(){
    $(this).next().children('.text').toggle()
})
$(".tt").hover(function(){
    $(this).next().children('.text').toggle()
})
</script>