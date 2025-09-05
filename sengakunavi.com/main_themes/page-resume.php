<?php get_header() ;?>
  <section class="support">
    <h2>
      <p>■就職サポート</p>
      <span>&emsp;履歴書の書き方</span>
    </h2>
    <div></div>
  </section>
  <section class="sengaku_wrap activity_wrap">
    <div class="sengaku_tochiiba activity_info">
      <h2>履歴書の書き方</h2>
      <div class="sengaku_about activity_about">
        <h3 class="activity_start">
          <p>履歴書とは</p>
          <img class="band" src="<?php echo get_template_directory_uri(); ?>/img/band1.jpg">
        </h3>
        <div class="comment">
          <p>履歴書とはあなたの自己紹介シートです。<br>
            様式はJIS規格・JIS規格類似様式・B4サイズがオススメです。<br>
            基本的に手書きでもパソコンでも大丈夫ですが、企業によっては手書きを指定されるところもあります。<br>
            ※まだまだ手書きを好む企業は多い傾向にあります。
            </p><br>
          <div class="resume_dl">
            <!-- <a href="img/履歴書（フォーマット）.xlsx" download="履歴書（フォーマット）.xlsx"> -->
            <a href="https://sengakunavi.com/wp-content/themes/main_themes/img/履歴書（フォーマット）.xlsx" download="履歴書（フォーマット）.xlsx">
              <p>履歴書をダウンロード</p>
              <p>(Excel)</p>
            </a>                               
          </div>
          <div class="resume_dl">
            <a href="https://sengakunavi.com/wp-content/themes/main_themes/img/履歴書（見本）.pdf" download="履歴書（見本）.pdf" target="_blank">
              <p>履歴書（見本）をダウンロード</p>
              <p>(PDF)</p>
            </a>                               
          </div>
        </div>
        <h4 class="interview_knowledge bold_p">
          <span>&nbsp;</span>
          <p>履歴書の書き方</p>
        </h4>
        <div class="comment">
          <p>履歴書は必ずボールペン、もしくは万年筆を使って記入しましょう。<br>間違えた場合には新しく書き直すか、訂正印を使うのが基本ルールです。<br>なので、いきなり書き始めずにまずは鉛筆などで下書きをしてみることをお勧めします。</p><br>
          <p>字の綺麗・汚いはさほど重要ではありません。<br>大切なことは丁寧に書こうとする姿勢です。<br>履歴書は企業に提出する数少ない書類の一つなので、時間をかけてじっくりと作成しましょう。</p><br>
        </div>            
      </div>
    </div>
    <div>
      <?php get_sidebar('useful');?>
      <?php get_sidebar('support');?>
      <?php get_sidebar('popular');?>
    </div>
  </section>
  <?php get_sidebar('sidebtn');?>
  <?php get_footer();?>