<div class="item clearfix">
    <img src="/images/common/default.png" class="fl"/>

    <div class="item-detail" class="fl">
        <h2><a target="_blank" href="/course/{$course->id}">{$course->name}</a></h2>

        <p class="stars" data-rating="{$course->score}">
            <span class="item-detail-left">评分:</span>
            <span class="star">
                <span class="star-off"><span class="star-on"></span></span>
            </span>
        </p>
    {if $course->classes|count==1}
        {$class=$course->classes[0]}
        <p><span class="item-detail-left">开课院系:</span><span class="item-detail-right">{$class->major->dep->name}
            - {$class->major->name}</span></p>

        <p><span class="item-detail-left">课程类型:</span><span class="item-detail-right">{$class->course_type}</span></p>

        <p><span class="item-detail-left">学分:</span><span class="item-detail-right">{$class->credit}</span></p>

        <p><span class="item-detail-left">教材:</span><span class="item-detail-right"><a>微积分 - 南京大学出版社</a></span></p>
        {else}
        <p><span class="item-detail-left">开课院系:</span><span class="item-detail-right">
            {$course->getClassDepartmentAndMajorInfo()}
        </span></p>
    {/if}
    </div>
</div>