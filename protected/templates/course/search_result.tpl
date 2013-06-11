<div class="clearfix" id="search-header">
    <h3 class="fl">搜索"{$search_keyword|default:''}"的结果</h3>
    <span class="fr">共{$courses|count}条</span>
</div>
{foreach $courses as $course}
{include file="file:[0]course/_search_item.tpl"}
{/foreach}