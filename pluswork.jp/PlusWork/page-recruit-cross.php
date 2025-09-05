<?php get_header(); ?>

<main>
    <section>
        <div class="headerBackground"></div>
        <div class="titleLine">
            <p>RECRUIT</p>
            <h2>本音でトーク</h2>
        </div>
    </section>

    <section class="pankuzuList">
        <a href="<?php echo home_url(); ?>">TOP</a>&emsp;>&emsp;リクルート
    </section>

    <section class="rec_category">
        <div class="recruit_List">
            <a class="rec_button" href="<?php echo home_url(); ?>/recruit-message">
                <div class="rec">メッセージ</div>
            </a>
            <a class="rec_point_botton" href="<?php echo home_url(); ?>/recruit-cross">
                <div class="rec">本音でトーク</div>
            </a>
            <a class="rec_button" href="<?php echo home_url(); ?>/recruit-job">
                <div class="rec">どんな仕事？</div>
            </a>
            <a class="rec_button" href="<?php echo home_url(); ?>/recruit-welfare">
                <div class="rec">働きやすさ</div>
            </a>
        </div>
        <!-- スマホ -->
        <div class="sp_recruit_List">
            <div class="sp_rec_List">
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-message">
                    <div class="rec">メッセージ</div>
                </a>
                <a class="rec_point_botton" href="<?php echo home_url(); ?>/recruit-cross">
                    <div class="rec">本音でトーク</div>
                </a>
            </div>
            <div class="sp_rec_List">
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-job">
                    <div class="rec">どんな仕事？</div>
                </a>
                <a class="rec_button" href="<?php echo home_url(); ?>/recruit-welfare">
                    <div class="rec">働きやすさ</div>
                </a>
            </div>
        </div>
    </section>


    <div class="cross_top">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cross-talk.jpg" alt="クロストーク">
    </div>

    <section class="cross_talk">
        <div class="cross_img">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/永田.jpg" alt="人">
                <p class="c-name">永田 良子</p>
                <div class="borderLine"></div>
                <p class="c-position">老人ホーム<br>紹介事業部</p>
            </div>
            <span class="cross"></span>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/大田.JPG" alt="人">
                <p class="c-name">大田 貴子</p>
                <div class="borderLine"></div>
                <p class="c-position"><br>人材紹介事業部<br></p>
            </div>
            <span class="cross"></span>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/吉田.JPG" alt="人">
                <p class="c-name">吉田 美由紀</p>
                <div class="borderLine"></div>
                <p class="c-position"><br>求職支援部</p>
            </div>
        </div>
    </section>

    <section class="cross_talk01">
        <div class="talk">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_white.png" alt="ロゴ">
            <p>CROSS TALK - 01</p>
            <h1>Q.今の仕事で楽しいと思うことは？</h1>
        </div>

        <div class="dialogue_area">
            <div class="d_right">
                <div class="speechBubble">
                    私たち老人ホーム紹介事業部では、ご家族やご本人に最適な施設を見つけられた時が一番の喜びですね。「安心して暮らせます」と言っていただけると、本当にやっていて良かったなと思います。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
                <div class="speechBubble_l">
                    それ、素敵ですね！人材紹介では、求職者の方が自分に合った仕事に出会えた時が嬉しいです。特に、長くお仕事に悩んでいた方が「やっと自分に合った職場を見つけました」と喜んでくれると、やりがいを感じますね。
                </div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    職業訓練でも、受講生の方がスキルを身につけて自信を持って就職活動に臨んでくれるのを見ると、すごく嬉しいです。特に、資格を取得して新しい道を切り開いていく姿は感動しますね。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
                <div class="speechBubble_l">
                    部署ごとに「人の人生に寄り添う」という共通点がありますね。私たちの事業では、高齢の方だけでなく、そのご家族の負担を軽減することで、家族全体の生活をサポートできるのが楽しいです。</div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    そうですね。人材紹介事業も、ただ職を紹介するだけでなく、求職者の方が「自分らしい働き方」を見つけられるように寄り添うことが大切だと思っています。その結果、企業側からも「良い人材を紹介してくれてありがとう」と言ってもらえると、双方に価値を提供できたと感じます。
                </div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
                <div class="speechBubble_l">
                    私たちの職業訓練では、特に再就職を目指す方や、スキルアップをしたい方の背中を押せるのが嬉しいですね。「学ぶことで未来が開ける」と感じてもらえる瞬間が楽しいです。</div>
            </div>
        </div>
    </section>

    <section class="cross_talk02">
        <div class="talk">
            <p>CROSS TALK - 02</p>
            <h1>Q.正直、つらいと思うことは？</h1>
        </div>

        <div class="dialogue_area">
            <div class="d_right">
                <div class="speechBubble">ご家族の思いとご本人の希望が合わない時がつらいですね。どちらの気持ちも理解できるだけに、どう折り合いをつけるか悩むことがあります。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
                <div class="speechBubble_l">
                    それ、すごく分かります…。私たち人材紹介事業部でも、求職者の方が希望する条件と、企業が求める条件が合わない時があります。特に、長く仕事が見つからない方に「もう自分には無理かもしれない」と言われると、何とか力になりたいけど、限界を感じることもありますね。
                </div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    職業訓練でも似たような悩みがあります。訓練を受ける方の中には、最初から自信をなくしている方も多くて、「本当に自分にできるのかな…」と不安を感じている姿を見ると、私も心が痛くなります。それでも一緒に頑張っていくしかないんですけどね。
                </div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
                <div class="speechBubble_l">
                    つらいですよね…。特に、こちらがいくらサポートしても、最終的にはご本人やご家族が決断する部分が多いので、思い通りにいかないこともあります。でも、その中でも少しでも安心してもらえるようにと、毎回ベストを尽くしています。
                </div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    私たちも同じです。特に、面接でうまくいかなかったと報告を受けると、「何かもっとできることがあったんじゃないか」と自問自答してしまいます。でも、寄り添い続けることが大事なんですよね。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
                <div class="speechBubble_l">
                    そうですね。受講生の方が「やっぱり自分には向いていないかも…」と諦めそうになった時は、どう励ましていいのか悩むこともあります。でも、小さな成功体験を積んでもらうことで、少しずつ自信を取り戻してくれることもあって、そこが救いです。
                </div>
            </div>
        </div>
    </section>

    <section class="cross_talk03">
        <div class="talk3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_white.png" alt="ロゴ">
            <p>CROSS TALK - 03</p>
            <h1>Q.続けていける理由はなに？</h1>
        </div>

        <div class="dialogue_area">
            <div class="d_right">
                <div class="speechBubble">
                    私の場合、ご家族やご本人から「ここにお願いして良かった」と感謝の言葉をいただく瞬間ですね。誰かの人生の大切な場面に寄り添えることが、何よりのモチベーションになっています。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
                <div class="speechBubble_l">
                    それ、分かります！私たちも、求職者の方が新しい職場で活躍している姿を見ると、本当にやりがいを感じます。特に、長く就職が決まらなかった方が「自分に合った職場に出会えました」と報告してくれると、続けてきて良かったと思いますね。
                </div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    私も同じです。受講生の方が新しいスキルを身につけて自信を取り戻していく姿を見ると、「この仕事を続けていきたい」と強く感じますね。やっぱり、私たちの仕事は誰かの人生を前に進めるサポートができるのが魅力です！
                </div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-永田.jpg" alt="人">
                    <p class="d-name">永田</p>
                </div>
                <div class="speechBubble_l">
                    つらいこともありますが、やっぱり「人の役に立てている」という実感が支えになっていますよね。私たちの仕事って、表には見えないかもしれませんが、確実に誰かの生活を支えているんだなって思います。</div>
            </div>
            <div class="d_right">
                <div class="speechBubble">
                    本当にそうですね。私たちも企業と求職者をつなぐことで、どちらにも良い影響を与えられるのが嬉しいです。それに、チームメンバーと支え合いながら進んでいける環境があるのも続けられる理由です。</div>
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-大田.JPG" alt="人">
                    <p class="d-name">大田</p>
                </div>
            </div>
            <div class="d_right">
                <div class="talk_area">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/talk-吉田.JPG" alt="人">
                    <p class="d-name">吉田</p>
                </div>
                <div class="speechBubble_l">
                    これからも、利用者や受講生の皆さん、そして仲間たちと一緒に、より良いサービスを提供していきたいですね。やっぱり、この仕事には続けていくだけの価値がありますね！</div>
            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>