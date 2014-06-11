<p><span class="course-intro-detail-left">开课院系:</span><span
        class="course-intro-detail-right">{$class->major->dep->name}</span></p>
<p><span class="course-intro-detail-left">年级:</span><span class="course-intro-detail-right">{$class->grade}</span></p>
<p><span class="course-intro-detail-left">教师:</span><span class="course-intro-detail-right">
    {$split=""}
    {foreach $class->teachers as $teacher}
        {$split}<a href="/teacher/{$teacher->id}">{$teacher->name}</a>
        {$split=', '}
    {/foreach}
</span></p>
<p><span class="course-intro-detail-left">时间:</span><span class="course-intro-detail-right">
    {$split=""}
    {foreach $class->timeSites as $time_site}
        {$split}{$time_site->getTimeString()}
        {$split=", "}
    {/foreach}
    </span></p>
<p><span class="course-intro-detail-left">地点:</span><span class="course-intro-detail-right">
    {$split=""}
    {foreach $class->timeSites as $time_site}
        {$split}{$time_site->classroom}
        {$split=", "}
    {/foreach}
    ({$class->campus})
    </span></p>
<p><span class="course-intro-detail-left">课程类型:</span><span
        class="course-intro-detail-right">{$class->course_type}</span></p>
<p><span class="course-intro-detail-left">学分:</span><span class="course-intro-detail-right">{$class->credit}</span></p>
<p><span class="course-intro-detail-left">课程网站:</span><span class="course-intro-detail-right">暂无</span></p>
<p><span class="course-intro-detail-left">教材:</span><span class="course-intro-detail-right">
        {if $textbooks}
        <a target="_blank" href="{$textbooks[0]->url|default:'#'}">{$textbooks[0]->name|default:'暂无'}</a>
        {else}
        暂无
        {/if}
    </span>
</p>