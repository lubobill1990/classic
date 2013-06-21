<div id="course_resource_list">
{foreach $resources as $res}
{include file="file:[0]courseResource/item.tpl" resource=$res}
{/foreach}
</div>