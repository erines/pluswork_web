<?php
 /*
Template Name: LPページ
*/
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<title></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/lp/style.css?<?php echo time(); ?>" />
	<?php 
		wp_enqueue_script( 'smp_common', get_stylesheet_directory_uri() . '/lp/js/smp_common.js?'.time(), array( 'jquery') ); 
		wp_enqueue_script( 'fixed', get_stylesheet_directory_uri() . '/lp/js/fixed.js?'.time(), array( 'jquery') ); 
		wp_head(); 
	?>

<!-- swipe -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/lp/swiper/css/swiper.css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/lp/swiper/js/swiper.jquery.min.js"></script>
</head>

<body class="home">
<div id="viewport">
  <header id="header">
    <div class="inner txt_bnr">
      <h1 class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/main_image.jpg?1" alt="栃木で医療関連のお仕事を探すなら！　栃木医療求人センター" class="responsive"/></h1>
      <div class="slide">
        <div class="js-swiper-container">
          <h2><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide_ttl.png" alt="嬉しい好条件のお仕事がたくさん"></h2>
          <div class="swiper-container">
            <ul class="cl swiper-wrapper">
              <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide1.jpg" alt="週休2日" class="responsive"></li>
              <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide2.jpg" alt="駅チカ" class="responsive"></li>
              <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide3.jpg" alt="日勤のみ" class="responsive"></li>
                            <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide4.jpg" alt="大学病院近く" class="responsive"></li>
              <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide5.jpg" alt="残業なし" class="responsive"></li>
              <li class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/slide6.jpg" alt="賞与4か月以上" class="responsive"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- / #header--> 
  </header>
  <div class="main">
    <div class="section section1">
      <h2>こんなお悩みありませんか？</h2>
      <div class="inner">
        <div class="box cl">
          <ul>
            <li>今の職場の<strong>人間関係に疲れた...</strong>心機一転別の職場に転職したい</li>
            <li>転職したいけど、<strong>給料が下がるのはちょっと...</strong></li>
            <li>仕事は大変なのに、<strong>給料が低すぎる...</strong></li>
            <li><strong>家から近く</strong>て、しっかり<strong>休みも取れる</strong>職場はないかな</li>
            <li>子育てと<strong>仕事の両立が大変...</strong></li>
            <li>せっかく資格はもっているのに、<strong>今の仕事に活かせていない</strong></li>
            <li><strong>資格も経験も無い</strong>けど介護の仕事に挑戦してみたい！</li>
            <li><strong>働きながら</strong>次の仕事を探しているけど、なかなか進まない...</li>
            <li>求人誌やインターネットで仕事を探しているけど、なかなかいい<strong>仕事が見つからない</strong></li>
            <li><strong>資格も経験も無い</strong>けど介護の仕事に挑戦してみたい！</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section section2">
      <h2>その悩み栃木医療求人センターが<br>
      解決します！</h2>
      <div class="inner">
        <div class="box cl">
          <ul>
            <li>
              <h3>職場の詳細情報もバッチリ把握</h3>
              <p>新しい職場に転職したはいいものの、「想像してたのと違う...」なんてことはよくある話です。地域密着で運営をしているので、<strong>実際の職場の雰囲気や人間関係</strong>など、他の求人サイトや情報誌では絶対に分からない情報も提供可能です。</p>
            </li>
            <li>
              <h3>企業側との条件交渉も可能</h3>
              <p><strong>給与、夜勤、お休み、子育てとの両立</strong>など、条件面の交渉はなかなか言いづらいものです。キャリアアドバイザーがあなたの変わりに施設側に交渉致します。地域に特化しているので交渉もスムーズ！給与や休日、子育てとの両立など、あなたのわがままにお応えします！</p>
            </li>
            <li>
              <h3>働きながらの転職活動も可能</h3>
              <p>現在就労中でなかなか時間を取れない・・・という方も多いはずです。栃木医療求人センターでは出張や電話でのご相談も行っております。また面接日程の調整など、<strong>全て完全無料で、何度でも対応可能</strong>ですのでお気軽にご相談ください！</p>
            </li>
            <li>
              <h3>あなた選任のアドバイザー徹底サポート</h3>
              <p>お仕事情報の紹介から面接のセッティングまですべて代行します。一人では悩んでしまう<strong>履歴書の作成や面接のサポート</strong>もばっちり！転職はプロに相談するのが成功のカギです。</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section section3">
      <div class="inner">
        <h2>栃木医療求人センターが<br>
          選ばれている３つの理由</h2>
        <div class="box cl">
          <div class="content">
            <div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section3_img1.jpg" alt="" /></div>
            <div class="text">
              <h3>栃木エリアに徹底特化</h3>
              <p>栃木に専門特化しているから、高収入好待遇案件など<strong>通常公開されていない求人も網羅！</strong></p>
            </div>
          </div>
          <div class="content">
            <div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section3_img2.jpg" alt="" /></div>
            <div class="text">
              <h3>医療関連のお仕事に専門特化</h3>
              <p>介護職に専門特化しているから業界専門のキャリアコンサルタントによる<strong>超実践的なアドバイス</strong>が可能！</p>
            </div>
          </div>
          <div class="content">
            <div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section3_img3.jpg" alt="" /></div>
            <div class="text">
              <h3>完全無料サポート</h3>
              <p><strong>介護専門の転職アドバイザー</strong>があなたの希望に合ったお仕事が見つかるまで<strong>完全無料で徹底サポート！</strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section4">
      <h2>栃木医療求人センターの<br>
      サポート内容のご紹介</h2>
      <div class="inner">
        <h3 class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section3_h3.jpg" alt="キャリアアドバイザーが完全無料であなたの転職をサポート致します。" class="responsive" /></h3>
        <div class="box cl">
          <ul>
            <li>
              <h3>キャリアカウンセリング</h3>
              <p>求職者様のご経験や保有資格、志望動機に合わせた就職がうまくいくための、カウンセリングを行います。</p>
            </li>
            <li>
              <h3>厳選した優良求人のご紹介</h3>
              <p>キャリアアドバイザーが<strong>厳選した優良求人をご紹介</strong>します。自分では、収集できない職場の雰囲気、実際に働いている方の声、給料、人間関係などの情報もお伝えしますので、<strong>効率よくぴったりのお仕事を探す</strong>ことができます。</p>
            </li>
            <li>
              <h3>書類作成サポート</h3>
              <p>自分で履歴書や職務履歴書などを書く場合、何をどうやって書いたらいいのかわからない...という方もいらっしゃるはず。そうならないよう、<strong>転職活動を専門にサポートしている私たちがしっかりアドバイス致します！</strong></p>
            </li>
            <li>
              <h3>面接対策</h3>
              <p>面接は、<strong>しっかりした準備が必要</strong>です。マナーや服装、よく聞かれる質問など、一つ一つを確認していき、あなたの転職がスムーズに進むよう、<strong>徹底的にサポートしていきます！</strong></p>
            </li>
            <li>
              <h3>退社、入社の準備</h3>
              <p>退社・入社が円滑に進むように、準備すべきことや必要な書類などに関して、アドバイス致します。</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section section5 txt_bnr">
      <div class="inner">
        <h2>簡単！5ステップ！<br>
        転職サポートの流れ</h2>
        <div class="cl">
          <div class="content">
            <h3>STEP1　エントリー（応募）</h3>
            <p>下部に設定されているエントリーフォームを記入し、送信ボタンをクリックして下さい</p>
          </div>
          <div class="content">
            <h3>STEP2　面談日程の設定</h3>
            <p>キャリアアドバイザーよりメールまたはお電話をさせていただき、面談日程の設定をさせていただきます。</p>
          </div>
          <div class="content">
            <h3>STEP3　面談 施設紹介</h3>
            <p>弊社にて、専任のキャリアアドバイザーと面談の上、あなたにぴったりの施設をご紹介致します。遠方の地域の方は実際に訪問し、面談させていただきますので、お気軽にご相談下さい。</p>
          </div>
          <div class="content">
            <h3>STEP4　面談 見学</h3>
            <p>ご希望の施設にて面接です。実際に見学をしていただくことも可能です。</p>
          </div>
          <div class="content">
            <h3>STEP5　内定 就業開始</h3>
            <p>希望する企業からの内定が出たら、就業開始日などの相談を行います。</p>
          </div>
        </div>
        <div class="btn"><a href="#entry" class="op"><span class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section5_btn.png" alt="サポート充実！あなたの就職活動を全力でサポートします！ 簡単30秒 エントリーフォームへ進む お電話からも受付中" class="responsive" /></span><span class="text">受付時間：平日9:00～18:00<br>電話番号 0285-24-8115</span></a></div>
      </div>
    </div>
    <div class="section section6">
      <div class="inner">
        <h2>栃木医療求人センターを利用する<br>
        ５つのメリット</h2>
        <table>
          <tbody>
            <tr>
              <td><h3>1.医療関連の分野に圧倒的に強い！<br>　医療関連に専門特化した転職エージェント</h3>
                <p>栃木県で「看護師・薬剤師・PT/OT/S」など、医療関連のお仕事に専門特化しているから、手厚いサポートが可能！求職者の転職事情・実際の現場を知っているからこそ、的確なアドバイスができます！</p>
                <p>自分では言いづらい、就労条件の交渉や就業開始の調整なども私たちにお任せください！</p></td>
            </tr>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <td><h3>2.自信を持った求人のみご紹介！<br>　好条件の求人を多数保有</h3>
                <p>WEBや求人情報誌には公開されていない求人情報から、あなたにぴったりの案件をご紹介致します！</p>
                <p>自社独自の求人ですので施設の状況を完全に把握しております。そのため、あなたの希望にぴったり合った求人しか紹介しません！</p></td>
            </tr>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <td><h3>3.転職サポートは完全無料！</h3>
                <p>転職希望者様からは一切お金を受け取っておりません。</p>
                <p>サポートは転職に関わるものであれば、何でもお引き受け致します！</p></td>
            </tr>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <td><h3>4.対応力に自信あり！<br>　地域と時間に縛られない柔軟性</h3>
                <p>遠方の地域でも実際に訪問し、面談させていただきます！</p>
                <p>ご希望であれば土日祝日、夜間も対応致します！</p></td>
            </tr>
          </tbody>
        </table>
        <table>
          <tbody>
            <tr>
              <td><h3>5.求職者様目線の徹底サポート！</h3>
                <p>お仕事の相談からご紹介まではもちろんのこと、入社後も専属のアドバイザーが相談相手として定期的にサポートします！</p>
                <p>どんな些細なことでも大丈夫です！何でもお聞かせください！！</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="section section7">
      <div class="inner">
        <h2>よくある質問</h2>
        <h3>エントリー（応募）やサポートにお金はかかりますか？</h3>
        <table>
          <tbody>
            <tr>
              <th>A.</th>
              <td>エントリーはもちろん無料です。サポートにつきましても、費用は一切いただいておりません。キャリアカウンセリング、案件のご紹介、面接アドバイス、各種書類作成、面接日の設定など、転職に必要な事は選任のキャリアアドバイザーが無料でサポート致します。</td>
            </tr>
          </tbody>
        </table>
        <h3>就労までどれくらいかかりますか？</h3>
        <table>
          <tbody>
            <tr>
              <th>A.</th>
              <td>ご応募していただいてから、最短1週間程度での就労が可能です。また就労開始時期についてご要望がある場合は、ご相談の上、調整させていただきます。</td>
            </tr>
          </tbody>
        </table>
        <h3>未経験、ブランクがある...それでも大丈夫ですか？</h3>
        <table>
          <tbody>
            <tr>
              <th>A.</th>
              <td>大丈夫です！未経験、無資格、資格はあるけど取得したばかり、経験はあるけどブランクがある、そのような方々でも安心して働くことができるお仕事をご紹介します。また、研修が充実している施設様もございますので、実務経験のない方・ブランクがある方はもちろん、スキルアップをしたい方からのご相談も承ります。</td>
            </tr>
          </tbody>
        </table>
        <h3>まずは、求人の内容を聞くだけでも大丈夫ですか？</h3>
        <table>
          <tbody>
            <tr>
              <th>A.</th>
              <td>全く問題ございません。今すぐの転職を考えていない方にも、求人情報をご提供させていただいております。またお仕事とのマッチングを考えますと、一度お会いしてお話する機会を設けていただくことをおすすめしています。</td>
            </tr>
          </tbody>
        </table>
        <h3>紹介された求人があまり気に入らない場合は断っても大丈夫ですか？</h3>
        <table>
          <tbody>
            <tr>
              <th>A.</th>
              <td>お断りいただいて全く問題ありません。本当に働きたいと思うお仕事が見つかるまでしっかりサポートさせていただきます</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="section section8">
      <div class="inner cl">
        <h2>自分でやるとこんなに大変！ <br>
        転職はプロの私たちに<br>
        お任せください</h2>
        <div class="mb08p"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section8_img1.png" alt="自分で転職活動をした場合　1.求人情報収集　数日～1ヶ月程度　2.応募書類の作成　3時間　3.応募　平均5社　4.応募　1社30分～1時間　5.内定　3～5日で返答　6.現職退職準備　2週間～1ヶ月　7.入社　各種書類の提出" class="responsive"/></div>
        <div class="mb00"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/section8_img2.png" alt="栃木医療求人センターがサポートした場合　左図１～４は専任のキャリアアドバイザーが徹底的にサポート！　面接対策や条件交渉などしっかりサポートさせていただきます！　最短1週間でお仕事決定！　内定後までアドバイスさせていただきます！　少しでも迷ったら、まずはご相談ください！" class="responsive"/></div>
      </div>
    </div>
	<!--
    <div class="section section_form" id="entry">
      <h2>エントリーフォーム</h2>
      <div class="inner">
        <form action="#">
          <div class="bg_inner">
            <dl>
              <dt>お名前<span class="must">必須</span></dt>
              <dd class="input_txt">
                <input type="text" />
              </dd>
            </dl>
            <dl>
              <dt>ふりがな<span class="must">必須</span></dt>
              <dd class="input_txt">
                <input type="text" />
              </dd>
            </dl>
            <dl>
              <dt>電話番号<span class="must">必須</span></dt>
              <dd class="input_txt">
                <input type="text" placeholder="000-0000-0000" />
              </dd>
            </dl>
            <dl>
              <dt class="vat">備考欄</dt>
              <dd class="input_textarea">
                <textarea name="" placeholder="ご質問、ご要望など何かありましたらご相談下さい。"></textarea>
              </dd>
            </dl>
            <dl>
              <dt class="vat last">個人情報の取扱について<span class="must">必須</span></dt>
              <dd class="input_textarea">
                <div class="textarea">個人情報の取り扱いについて<br><br>弊社は応募者の個人情報をお預かりすることになりますが、そのお預かりした個人情報の取扱について、下記のように管理し、保護に努めて参ります。<br><br>【個人情報の利用目的】<br><br>1)応募者への連絡、採用選考のため。<br>2)次の各号のいずれかに該当すると認められる場合には、利用目的の達成に必要な範囲を超えて個人情報を利用することがあります。</div>
                <div class="txt">上記方針について</div>
                <ul class="cl">
                  <li>
                    <label>
                      <input type="radio" name="agree" value="1" checked="checked">
                      <span>同意する</span></label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="agree" value="0">
                      <span>同意しない</span></label>
                  </li>
                </ul>
                <div class="btn op">
                  <input type="submit" value="送信">
                </div>
              </dd>
            </dl>
          </div>
        </form>
      </div>
    </div>
	-->
	<?php echo do_shortcode('[contact-form-7 id="32" title="LP"]'); ?>
    <div class="section section9">
      <div class="inner">
        <h3>運営会社のご案内</h3>
        <div class="cl">
          <table class="table">
            <tbody>
              <tr>
                <th>社名</th>
                <td>株式会社プラスワーク</td>
              </tr>
              <tr>
                <th>代表者</th>
                <td>宮田直樹</td>
              </tr>
              <tr>
                <th>設立</th>
                <td>平成14年12月</td>
              </tr>
              <tr>
                <th>資本金</th>
                <td>5,000万円</td>
              </tr>
              <tr>
                <th>事業内容</th>
                <td>労働者派遣事業（般）09-300171<br>職業紹介事業　09-ユ-300089<br>アウトソーシング（業務委託請負）事業<br>スクール（求職者支援訓練）事業<br>老人ホーム・介護施設紹介事業</td>
              </tr>
              <tr>
                <th>本社・小山校</th>
                <td>〒323-0032<br>栃木県小山市天神町1丁目9番9号<br>TEL：0285-24-8115<br>FAX：0285-24-8114<br>お問い合わせ：<br>oyama@pluswork.jp<br>Facebookページ：<br>http://www.facebook.com/pluswork.jp</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3215.2389763738593!2d139.79758421527606!3d36.30651128005331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f4eec426487cf%3A0xb637b5d9989a39c0!2z44CSMzIzLTAwMzIg5qCD5pyo55yM5bCP5bGx5biC5aSp56We55S677yR5LiB55uu77yZ4oiS77yZ!5e0!3m2!1sja!2sjp!4v1520055170621" width="100%" height="374" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    
    <!-- /main --> 
  </div>
  <footer> 
    
    <!-- /footer--> 
  </footer>
  
  <!-- /viewport--> 
</div>
<div class="footer_fixed fixed_nav txt_bnr">
  <div class="inner">
    <div class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/lp/images/fixed_nav01.png" alt="ご応募お問合せはこちらから！" class="responsive"/></div>
    <ul class="cl">
      <li><a href="#entry" title="簡単30秒！　WEBで応募"></a></li>
      <li><a href="tel:<?php echo cr_get_option("tel"); ?>" title="今すぐ　電話で応募"></a></li>
    </ul>
    <div class="time">平日9:00～18:00</div>
  </div>
</div>
<?php 
		wp_footer(); 
?>
</body>
</html>
