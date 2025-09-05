
<a name="entry_form" id="entry_form" style="margin: -2em 0 0; padding: 2em 0 0;"></a>
<div class="contact_form entry_form" >
	<h3>エントリーフォーム</h3>
	<div class="inner">
		<?php echo do_shortcode('[contact-form-7 id="1096" title="エントリーフォーム（スマホ）"]'); ?>
	
	<!---->
	<?php if (0): ?>
	<form action="#">
		<div class="message">
			<p>お仕事への応募は、以下のエントリーシートからどうぞ。内容確認後、弊社担当よりご連絡差し上げます。</p>
		</div>
		
		<dl class="job_title">
			<dt>求人</dt>
			<dd><span class="in"></span><div style="width: 1px; height: 1px; overflow: hidden;">[text job_title]</div><div style="width: 1px; height: 1px; overflow: hidden;">[text job_url]</div></dd>
		</dl>
		<dl class="job_type">
			<dt>職種</dt>
			<dd><span class="in"></span><div style="width: 1px; height: 1px; overflow: hidden;">[text job_url]</div></dd>
		</dl>
		<dl>
			<dt>お名前<span class="required">必須</span></dt>
			<dd>[text* your-name]</dd>
			
			<dt>ふりがな<span class="required">必須</span></dt>
			<dd>[text* your-ruby]</dd>
			
			<dt>性別<span class="required">必須</span></dt>
			<dd>[radio gender use_label_element "男性" "女性"]</dd>
			
			<dt>生年月日<span class="required">必須</span></dt>
			<dd class="birthday"><span class="dt">[select* birthday_y include_blank "2015" "2014" "2013" "2012" "2011" "2010" "2009" "2008" "2007" "2006" "2005" "2004" "2003" "2002" "2001" "2000" "1999" "1998" "1997" "1996" "1995" "1994" "1993" "1992" "1991" "1990" "1989" "1988" "1987" "1986" "1985" "1984" "1983" "1982" "1981" "1980" "1979" "1978" "1977" "1976" "1975" "1974" "1973" "1972" "1971" "1970" "1969" "1968" "1967" "1966" "1965" "1964" "1963" "1962" "1961" "1960" "1959" "1958" "1957" "1956" "1955" "1954" "1953" "1952" "1951" "1950" "1949" "1948" "1947" "1946" "1945" "1944" "1943" "1942" "1941" "1940" "1939" "1938" "1937" "1936" "1935" "1934" "1933" "1932" "1931" "1930" "1929" "1928" "1927" "1926" "1925" "1924" "1923" "1922" "1921" "1920" "1919" "1918" "1917" "1916" "1915" "1914" "1913" "1912" "1911" "1910" "1909" "1908" "1907" "1906" "1905" "1904" "1903" "1902" "1901" "1900"]<span class="sep">年</span>[select* birthday_m include_blank "1" "2" "3" "4" "5" "6" "7" "8" "9" "10" "11" "12"]<span class="sep">月</span>[select* birthday_d include_blank "1" "2" "3" "4" "5" "6" "7" "8" "9" "10" "11" "12" "13" "14" "15" "16" "17" "18" "19" "20" "21" "22" "23" "24" "25" "26" "27" "28" "29" "30" "31"]<span class="sep">日</span></span>
<span class="wpcf7-custom-item-error birthday_error"></span></dd>
			
			<dt>電話番号<span class="required">必須</span></dt>
			<dd class="tel">
				[text* your-tel01]<span class="sep">-</span>[text* your-tel02]<span class="sep">-</span>[text* your-tel03]
<span class="wpcf7-custom-item-error tel_error"></span>
			</dd>
			
			<dt>備考</dt>
			<dd>[textarea textarea-198 placeholder "ご質問や気になる点などご自由にご記入下さい"]</dd>
		</dl>
		
		<div class="submit"><a href="javascript: void(0);"><img src="/cms/wp-content/themes/pluswork_sp/images/contact_btn.jpg" alt="送信" class="responsive" /></a></div>
		
		<div style="width: 1px; height: 1px; overflow: hidden;">[submit]</div>
	</form>
	<?php endif; ?>
	</div>
</div>