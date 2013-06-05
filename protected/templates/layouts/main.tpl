<!DOCTYPE html>
<html>

<head>
    <title>{$page_title}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

    <link rel="stylesheet" href="/stylesheets/screen.css">
    {block name=css}{/block}
</head>

<body>

{include file='layouts/header.tpl'}

<div id="content" class="w960 bc clearfix">
    <div id="content-left" class="fl">{block name=left}{/block}</div>
    <div id="content-right" class="fr">{block name=right}{/block}</div>
</div>

{include file='layouts/footer.tpl'}

<script type="text/javascript" src='/javascripts/require.2.1.5.js'></script>
<script type="text/javascript" src='/javascripts/main.js'></script>
<script type="text/javascript">
require(['jquery','components'], function ($){

});
</script>
{block name=js}{/block}

</body>
</html>
