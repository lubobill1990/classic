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
{block name=right}
    <form action="" id="catalog-form">
        <ul id="search-catalog">
            <li>
                <ul id="search-in-user">
                    <li class="search-catalog-tag">
                        <label for="search-user" class="search-catalog-all">
                            <input type="checkbox" id="search-user" name="search_user"/>
                            用户</label></li>
                </ul>
            </li>
            <li>
                <ul id="search-in-department">
                    <li class="search-catalog-tag">
                        <label for="department-all" class="search-catalog-all">
                            <input type="checkbox" id="department-all" name="search_departments_all"
                                   {$search_departments=$smarty.request.search_departments|default:[]}
                                   {if $smarty.request.search_departments_all|default:''=='on' or empty($search_departments)}checked{/if}/>
                            所有院系</label></li>
                    {foreach $departments as $department}
                        <li class="search-catalog-tag">
                            <label for="department-{$department->id}" class="search-catalog-single">
                                <input type="checkbox" class="department-single" id="department-{$department->id}"
                                       name="search_departments[]"
                                       value="{$department->id}"/>
                                {$department->name}</label>
                        </li>
                    {/foreach}
                </ul>
            </li>

        </ul>

    </form>
{/block}

{block name=js}
    <script type="text/javascript">
        require(['jquery'], function ($) {
            function init_star() {
                $('.stars').each(function () {
                    $(this).find('.star-on').css('width', $(this).data('rating') * 20 + "%");
                });
            }

            $(document).ready(function () {
                init_star();
            });
            $('#search-catalog .search-catalog-all input[type=checkbox]').change(function () {
                if ($(this).prop('checked')) {
                    $(this).closest('.search-catalog-tag').parent().find(".search-catalog-single input[type=checkbox]:checked").each(function () {
                        $(this).prop('checked', false);
                    })
                } else {
                    if($(this).closest('.search-catalog-tag').parent().find(".search-catalog-single").length>0){
                        $(this).prop('checked', true);
                    }
                }
            })
            $('#search-catalog .search-catalog-single input[type=checkbox]').change(function () {
                if ($(this).prop('checked')) {
                    $(this).closest('.search-catalog-tag').parent().find(".search-catalog-all input[type=checkbox]").prop('checked', false);
                }else{
                    if ($(this).closest('.search-catalog-tag').parent().find(".search-catalog-single input[type=checkbox]:checked").length == 0) {
                        $(this).closest('.search-catalog-tag').parent().find('.search-catalog-all input[type=checkbox]').prop('checked', true);
                    }
                }
            })
        });
    </script>
{/block}