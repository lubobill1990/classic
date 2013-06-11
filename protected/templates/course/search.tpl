{extends file='layouts/main.tpl'}

{block name=css}
    <link rel="stylesheet" href="/stylesheets/special/course/search.css">
{/block}

{block name=left}
<div id="search-container">
        <div id="search-result-list">
        {include file="file:[0]course/search_result.tpl" courses=$courses|default:[]}
        </div>
</div>

{/block}

{block name=js}
    <script type="text/javascript">

    </script>
{/block}