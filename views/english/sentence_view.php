<!-- search -->
<br/>
<div class="row">
    <!-- sub-navigation -->
    <div class="large-2 show-for-medium-up columns">
        &nbsp;
    </div>
    <div class="large-3 columns hide-for-small-only">
        <h1 class='headline'>经典必备500句</h1>
    </div>
    <div class="large-3 small-8 columns">
        <input class="englishSearchInput" type="text" placeholder='book, author, isbn'/>            
    </div>
    <div class="large-2 small-2 columns">
        <a href="#" class="button tiny englishSearchBtn">Search</a>
    </div>
    <div class="large-2 small-2 columns hide-for-small-only">
        <a href="#" class="button tiny">查看进度</a> 
    </div>
</div>
<div class="row show-for-small-only">
    <div class="columns small-12">
        <a href="#" class="button tiny expand">查看进度</a> 
    </div>
</div>
<!-- content -->
<div class="row" id="content">
    <div class='large-12 small-12 columns'>
        <div class="large-2 show-for-medium-up columns">
            &nbsp;
        </div>
        <div class="large-8 small-12 columns">            
            <img class='hide-for-small-only' src='img/english/listen_article.jpg'>
            <div class="res_express">
                <span class="label">
                    Lasted Resources&nbsp;. . . . . .&nbsp;
                    <span class="pl">
                        (&nbsp;<a href='#'>More</a>&nbsp;)
                    </span>
                </span>
            </div>
            <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-4">
                <?php
                foreach ($data['books'] as $book) {
                    echo "<li><a data-reveal-id='myModal' class='bookImg' href='index.php/english/sentence/showSpecBookDetail" .
                    "?id={$book['id']}'>" .
                    "<img class='th' title='{$book['name']}' " .
                    "alt='{$book['name']}' data-orign=''".
                    "src='img/english/book/{$book['imgPath']}'/></a></li>";
                }
                ?>
            </ul>
            <div id="myModal" class="reveal-modal" data-reveal>
            </div>
        </div>
        <div class="large-2 show-for-large-up columns">      
            <img src='img/english/listen_aside.jpg'/>
        </div>    
    </div>
    <!-- footer-->
    <div class='large-12 small-12 columns gray-link'>
        <span id="icp"> &copy; 2005 - 2012 devilTian.com, all rights reserved </span>
    </div>
</div>
<script type="text/javascript">
    $(document).foundation().ready(function() {
        $('a.bookImg').click(function() {
            $.ajax({
                url: $(this).attr('href'),
                dataType: "html",
                success: function(html) {
                    $('#myModal').html(html).foundation('reveal', 'open');
                }
            });
            return false;
        });
    });
</script>
