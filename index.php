<?php
/* settings */
$token = "your token";// токен vk api
$group_id = "";// id или короткая ссылка на группу (без https://vk.com/)
/* settings */


$arr = json_decode(file_get_contents('http://api.vk.com/method/groups.getById?group_id=' . $group_id .'&fields=cover&access_token=' . $token . '&v=5.61'), true);
$arrmembers = json_decode(file_get_contents('http://api.vk.com/method/groups.getMembers?group_id=' . $group_id . '&access_token=' . $token . '&v=5.61'), true);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vkgroup.css">
</head>

<div class="vkgroup">
    <div class="vkcover">
    <img src="<? echo $arr['response']['0']['cover']['images']['4']['url']; ?>" alt="" class="vkcoverimg">
    </div>
    <div class="vkgcont">

        <img src="<? echo $arr['response']['0']['photo_50']; ?>" alt="" class="avatar">
        <div class="vktext">
            <span class="grouph"><? echo $arr['response']['0']['name']; ?></span>
            <br>
            <span class="groupmembers"><? echo $arrmembers['response']['count']; ?> подписчиков</span>
        </div>
        <div class="buttons">
            <a href="https://vk.com/<?echo $arr['response']['0']['screen_name']?>" class="vkbutton">Открыть</a>
        </div>
    </div>
</div>
