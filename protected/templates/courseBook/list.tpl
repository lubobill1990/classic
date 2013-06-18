<div class="slide clearfix">
    <div class="slide-prev off"></div>
    <div class="slide-next"></div>
    <div class="slide-main">
        <div class="slide-ul-wrapper">
        {$i=0}
        <ul>
        {foreach $books as $book}
            {if $i!=0&&$i%4==0}
            </ul>
            <ul>
            {/if}
        {include file="file:[0]courseBook/item.tpl" book=$book}
            {$i=$i+1}
        {/foreach}
        </ul>
        </div>
    </div>
</div>
