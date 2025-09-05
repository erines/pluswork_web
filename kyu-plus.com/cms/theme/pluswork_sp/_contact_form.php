
<div class="contact_form" id="contact_form">
	<h3>お問い合せフォーム</h3>
	<div class="inner">
		<?php echo do_shortcode('[contact-form-7 id="7242" title="お問い合わせフォーム（スマホ）_copy"]'); ?>
	<!-- [contact-form-7 id="7234" title="エントリーフォーム（スマホ）_修正版"]  [contact-form-7 id="7242" title="お問い合わせフォーム（スマホ）_copy"]-->
	<?php if (0): ?>
	<form action="#">
		<div class="message">
			<p>お仕事に関するご質問や、弊社へのお問い合わせは、以下のお問い合わせフォームからどうぞ。<br />
内容確認後、弊社担当よりご連絡差し上げます。<br />
尚、回答に時間がかかる場合がありますので、お急ぎの方はお電話にてお問い合わせください。</p>
		</div>
		
		<dl>
			<dt>お名前<span class="required">必須</span></dt>
			<dd>[text* your-name]</dd>
			
			<dt>ふりがな<span class="required">必須</span></dt>
			<dd>[text* your-ruby]</dd>
			
			<dt>メールアドレス<span class="required">必須</span></dt>
			<dd>[email* your-email]</dd>
						
			<dt>電話番号<span class="required">必須</span></dt>
			<dd class="tel">
				[text your-tel01]<span class="sep">-</span>[text your-tel02]<span class="sep">-</span>[text your-tel03]
			</dd>
			
			<dt>お問い合わせ内容<span class="required">必須</span></dt>
			<dd>[textarea* textarea-198 placeholder "掲載中の求人や、仕事内容についてご自由にご記入下さい"]</dd>
		</dl>
		
		<div class="submit"><a href="javascript: void(0);"><img src="/cms/wp-content/themes/pluswork_sp/images/contact_btn.jpg" alt="送信" class="responsive" /></a></div>
		<div style="width: 1px; height: 1px; overflow: hidden;">[submit]</div>
	</form>
	<?php endif; ?>
	</div>
</div>