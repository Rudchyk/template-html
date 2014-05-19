-- init.js --

sourcePath = "/wp-content/themes/teme_name/"

-- Ссылки --

/wp-admin - Ccылка на админ панель
/wp-login.php?action=register - Ccылка на панель регистрация
<?=get_permalink(page_ID);?> - Ccылка на страницу
<?=bloginfo('url');?> - Ccылка на главную

-- Contact Form 7 --

[contact-form-7 id="4" title="Контактная форма 1"]

-- Выпадающее меню --

.sub-menu{}

-- Комментарии --

/*comments.php*/
.nocomments{}
.cancel-comment-reply{}
.respond-header-nologget{}
.respond-header-logget{}
.commentform{}
/*end comments.php*/

/*comments avatar*/
.avatar{}
.avatar-60{}
.photo{}
/*end comments avatar*/

.comment-reply-link{}

/*вложенность комментариев*/
.depth-1{}
.depth-2{}
.depth-3{}
/*вложенность комментариев*/

.children{}

-- Галлерея (NextGEN Gallery) --

HTML:
<div class="ngg-galleryoverview">
    <!-- Slideshow link -->
    <div class="slideshowlink">
        <a class="slideshowlink" href="#">[Show as slideshow]</a>
    </div>
    <!-- Thumbnails -->
    <div class="ngg-gallery-thumbnail-box">
        <div class="ngg-gallery-thumbnail">
            <a href="#" title="" target="_blank" rel="nofollow">
                <img title="" alt="" src="img.jpg">
            </a>
        </div>
    </div>
    <div class="ngg-gallery-thumbnail-box">
        <div class="ngg-gallery-thumbnail">
            <a href="#" title="" target="_blank" rel="nofollow">
                <img title="" alt="" src="img.jpg">
            </a>
        </div>
    </div>
    <div class="ngg-gallery-thumbnail-box">
        <div class="ngg-gallery-thumbnail">
            <a href="#" title="" target="_blank" rel="nofollow">
                <img title="" alt="" src="img.jpg">
            </a>
        </div>
    </div>
    <!-- Pagination -->
    <div class="ngg-navigation">
        <span class="current">1</span>
        <a class="page-numbers" href="#">2</a>
        <a class="page-numbers" href="#">3</a>
        <a class="next" href="#">►</a>
    </div>
</div>
CSS:
.ngg-galleryoverview{}
.slideshowlink{}
.ngg-gallery-thumbnail-box{}
.ngg-gallery-thumbnail a{}
.ngg-gallery-thumbnail{}
.ngg-gallery-thumbnail a:hover{}
.ngg-gallery-thumbnail img{}
.ngg-navigation{}
.ngg-navigation a,
.ngg-navigation span{}
.ngg-navigation a.page-numbers,
.ngg-navigation a.next,
.ngg-navigation a.prev,
.ngg-navigation span.page-numbers,
.ngg-navigation span.next,
.ngg-navigation span.prev{}
.ngg-navigation a.next,
.ngg-navigation a.prev{}
.ngg-navigation .current,
.ngg-navigation a:hover,
.ngg-navigation span{}
.ngg-navigation .page-numbers{}
.ngg-navigation .next{}
.gallery-link{}

-- Wp-polls --

HTML:
<div class="wp-polls">
    <form class="wp-polls-form" action="/" method="post">
        <p style="display: none;">
            <input type="hidden" id="poll_2_nonce" name="wp-polls-nonce" value="6d6da9eeeb">
        </p>
        <p style="display: none;">
            <input type="hidden" name="poll_id" value="2">
        </p>
        <p style="text-align: center;">
            <strong>Title poll</strong>
        </p>
        <div class="wp-polls-ans">
            <ul class="wp-polls-ul">
                <li><input type="radio" id="poll-answer-6" name="poll_2" value="6"> <label for="poll-answer-6">Плохо</label></li>
                <li><input type="radio" id="poll-answer-7" name="poll_2" value="7"> <label for="poll-answer-7">Норм</label></li>
            </ul>
            <p style="text-align: center;">
                <input type="button" name="vote" value="   Vote   " class="Buttons" onclick="poll_vote(2);">
            </p>
            <p style="text-align: center;">
                <a href="#ViewPollResults" onclick="poll_result(2); return false;" title="View Results Of This Poll">View Results</a>
            </p>
        </div>
    </form>
</div>
CSS:
.wp-polls{}
.wp-polls-form{}
.wp-polls-ans{}
.wp-polls-ul{}
.wp-polls-ul li{}
.wp-polls-ul input{}
.wp-polls-ul label{}
.Buttons{}
.Buttons:hover{}

-- Youtube Gallery --

<?php echo do_shortcode('
            [youtubegallery cols=3]
            http://www.youtube.com/watch?v=cRdxXPV9GNQ
            http://vimeo.com/13470805
            http://www.youtube.com/watch?v=jJK-G9-dLzw
            [/youtubegallery]
            '); ?>

<div id="youtube_gallery_1" class="youtube_gallery">
    <div class="youtube_gallery_center">
        <div id="youtube_gallery_item_1" class="youtube_gallery_item">
            <div class="youtube_gallery_player">
                <a class="thickbox" href="http://www.youtube.com/embed/cRdxXPV9GNQ?autoplay=1&amp;hd=1&amp;rel=0&amp;KeepThis=true&amp;TB_iframe=true&amp;height=370&amp;width=640?autoplay=1&amp;hd=1&amp;rel=0" title="Avatar Trailer The Movie (New Extended HD Trailer)">
                    <img src="http://homa.viking-r.pp.ua/wp-content/plugins/youtube-simplegallery/img/play.png" alt=" " class="ytsg_play" border="0">
                    <img src="http://homa.viking-r.pp.ua/wp-content/plugins/youtube-simplegallery/scripts/timthumb.php?src=http://img.youtube.com/vi/cRdxXPV9GNQ/0.jpg&amp;w=480&amp;h=270&amp;zc=1" border="0">
                </a><br>
                <div class="youtube_gallery_caption">Avatar Trailer The Movie (New Extended HD Trailer)</div>
            </div>
        </div>
        <br clear="all" style="clear: both;">
        <div class="youtube_gallery_divider"></div>
    </div>
</div>

.youtube_gallery{}
.youtube_gallery_item{}
.youtube_gallery_item .ytsg_play + img{}
.youtube_gallery_caption{}


-- Функции --

Возвращает постоянную ссылку на запись, для дальнейшего использования в php
<?=get_permalink($id);?>