'use strict';
{
	// お問い合わせフォームスマホ電話番号、数字入力
	const contact_tel = document.getElementById('contact_tel');
	//マウスが要素上に入った時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/contact/"){
			if(contact_tel != null){
				contact_tel.addEventListener('mouseover', () => {
					contact_tel.inputMode = "tel";
				}, false);
			};
		}});
	//マウスが要素上から離れた時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/contact/"){
			if(contact_tel != null){
				contact_tel.addEventListener('mouseleave', () => {
					contact_tel.inputMode = "none";
				}, false);
			};
		}});
	// 栃木採用勉強会フォームスマホ電話番号、数字入力
	const contact_tel_2 = document.getElementById('contact_tel_2');
	//マウスが要素上に入った時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/studytochigi/#tochigiform"){
			if(contact_tel_2 != null){
				contact_tel_2.addEventListener('mouseover', () => {
					contact_tel_2.inputMode = "tel";
				}, false);
			};
		}});
	//マウスが要素上から離れた時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/studytochigi/#tochigiform"){
			if(contact_tel_2 != null){
				contact_tel_2.addEventListener('mouseleave', () => {
					contact_tel_2.inputMode = "none";
				}, false);
			};
		}});
	// 茨城採用勉強会フォームスマホ電話番号、数字入力
	const contact_tel_3 = document.getElementById('contact_tel_3');
	//マウスが要素上に入った時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/studyibaraki/#ibarakiform"){
			if(contact_tel_3 != null){
				contact_tel_3.addEventListener('mouseover', () => {
					contact_tel_3.inputMode = "tel";
				}, false);
			};
		}});
	//マウスが要素上から離れた時
	window.addEventListener('DOMContentLoaded', function(){
		if(getPageTitle === "https://sengakunavi.com/studyibaraki/#ibarakiform"){
			if(contact_tel_3 != null){
				contact_tel_3.addEventListener('mouseleave', () => {
					contact_tel_3.inputMode = "none";
				}, false);
			};
		}});
	// エントリーフォームスマホ電話番号、数字入力
	const telnumber = document.getElementById('telnumber');
	//マウスが要素上に入った時
	window.addEventListener('DOMContentLoaded', function(){
		let corp_url =   location.href;
		if(corp_url.indexOf('corp') !== -1){
			if(telnumber != null){
				telnumber.addEventListener('mouseover', () => {
					telnumber.inputMode = "tel";
				}, false);
			};
		}});
	//マウスが要素上から離れた時
	window.addEventListener('DOMContentLoaded', function(){
		let corp_url =   location.href;
		if(corp_url.indexOf('corp') !== -1){
			if(telnumber != null){
				telnumber.addEventListener('mouseleave', () => {
					telnumber.inputMode = "none";
				}, false);
			};
		}});
	// お問い合わせフォーム メッセージエリア入力判定（入力あり白、入力なしグレー）
	function contactmessage(){
		text.style.backgroundColor = '#ffffff';
		if (text.value.length === 0){
			text.style.backgroundColor = '#f0f0f0';
		}
	}
	let text = document.getElementById('message_1');
	if( document.getElementById('message_1') ){
		text.addEventListener('keyup', contactmessage);
	};
	window.addEventListener('DOMContentLoaded', function(){
		if( document.getElementById('message_1') ){
			text = document.getElementById('message_1');
			contactmessage();
		}
	});
	// 勉強会 メッセージエリア入力判定（入力あり白、入力なしグレー）
	function tochigiknow(){
		tochigi_knows.style.backgroundColor = '#ffffff';
		if (tochigi_know.selected){
			tochigi_knows.style.backgroundColor = '#f0f0f0';
		}
	}
	let tochigi_knows = document.getElementById('tochigi_knows');
	let tochigi_know = document.getElementById('tochigi_know');
	if( document.getElementById('tochigi_knows') ){
		tochigi_knows.addEventListener('click', tochigiknow);
	};
	function ibarakiknow(){
		ibaraki_knows.style.backgroundColor = '#ffffff';
		if (ibaraki_know.selected){
			ibaraki_knows.style.backgroundColor = '#f0f0f0';
		}
	}
	let ibaraki_knows = document.getElementById('ibaraki_knows');
	let ibaraki_know = document.getElementById('ibaraki_know');
	if( document.getElementById('ibaraki_knows') ){
		ibaraki_knows.addEventListener('click', ibarakiknow);
	};
	// エントリーフォーム メッセージエリア入力判定（入力あり白、入力なしグレー）
	function entry_message(){
		entrymessage.style.backgroundColor = '#ffffff';
		if (entrymessage.value.length === 0){
			entrymessage.style.backgroundColor = '#f0f0f0';
		}
	}
	let entrymessage = document.getElementById('entrymessage');
	if( document.getElementById('entrymessage') ){
		entrymessage.addEventListener('keyup', entry_message);
	};
	window.addEventListener('DOMContentLoaded', function(){
		if( document.getElementById('entrymessage') ){
			entrymessage = document.getElementById('entrymessage');
			entry_message();
		}
	});
	// スマホナビ
	let res_navi_area = document.getElementById('res_navi_area');
	let res_navi_useful = document.getElementById('res_navi_useful');
	res_navi_useful.addEventListener('mouseover',() => {
		res_navi_area.classList.remove('res_navi_area_hidden');
		res_navi_area.classList.add('res_navi_area_display'); 
	});
	res_navi_useful.addEventListener('mouseleave',() => {
		res_navi_area.classList.remove('res_navi_area_display');
		res_navi_area.classList.add('res_navi_area_hidden');
	});
	let res_navi_support = document.getElementById('res_navi_support');
	let res_navi_findwork = document.getElementById('res_navi_findwork');
	res_navi_findwork.addEventListener('mouseover',() => {
		res_navi_support.classList.remove('res_navi_support_hidden');
		res_navi_support.classList.add('res_navi_support_display'); 
	});
	res_navi_findwork.addEventListener('mouseleave',() => {
		res_navi_support.classList.remove('res_navi_support_display');
		res_navi_support.classList.add('res_navi_support_hidden');
	});
	// タイトル取得

		var getPageTitle = document.querySelector('title').innerText;
		var corp_display = document.getElementById('corp_display');


	// 総ページ数
	let page_number = 0;
	// ページャー要素カウンター
	let i = 0;
	// 現在の表示されているページ（page_display）
	let page_display = 1;
	// ページャー表示の親要素取得
	let btnstn = document.getElementById('btnstn');
	// ページャー配列生成
	var array = new Array(); //配列作成
	array = []; //要素を格納（空）
	// 過去のページの色を格納
	let past_page_display = 0;
	// 1ページ内の表示投稿（最大）件数（page_post_max)
	// ↓ここを変動させる4ページまでが最適
	// 
	let page_post_max =    36;
	// タイトルでホーム画面であれば処理
	window.addEventListener('DOMContentLoaded', function(){
		// ルートURLかどうかをチェック
		if(window.location.pathname === "/"){
			// 投稿が1件以上あるか判定
			if(corp_display != null){
				// 投稿件数（corp_display.children.length）
				let post_number = corp_display.children.length;
				// 総ページ数を算出（page_number）
				page_number = (Math.ceil(post_number / page_post_max));
				// 2ページ以上あるか判定
				if(page_number > 1){
					pager();
					pager_element();
					pager_range();
				};
			}
		}
	});

	// ページャーテキスト生成（array配列に格納）
	function pager(){
		array.push('<'); 
		for(i = 0;i < page_number; i++){
			array.push(i + 1);  
		}
		array.push('>'); 
	};
	// ページャータグ生成 テキストをatagに格納
	function pager_element(){
		array.forEach(element => {
			let btn_a_tag = document.createElement("a");
			let btn_div_tag = document.createElement("div");
			let btn_li_tag = document.createElement("li");
			btn_a_tag.textContent = element;
			btn_div_tag.appendChild(btn_a_tag);
			btn_li_tag.appendChild(btn_div_tag);
			btnstn.appendChild(btn_li_tag);
			let btn_a_background = btn_a_tag.style.background;
			let btn_a_color = btn_a_tag.style.color;
			btn_a_tag.addEventListener('mouseover',() => {
				btn_a_tag.style.background = '#f99293';
			})
			btn_a_tag.addEventListener('mouseleave',() => {
				btn_a_tag.style.background = btn_a_background;
				btn_a_tag.style.color = btn_a_color;
			})
			btn_a_tag.addEventListener('click',() => {
				btn_a_tag.style.background = '#ffffff';
				page_display = btn_a_tag.textContent;
				pager_range();
				corp_move();
			})
		});
	}
	// ページャークリック
	// 表示画面によるページャーの表示範囲判定
	function pager_range(){
		// <をクリック
		if (page_display == "<"){
			page_display = past_page_display - 1;
			// >をクリック
		} 
		if (page_display == ">"){
			page_display = parseInt(past_page_display) + 1;
		};
		// 1ページの表示は<を非表示
		if(page_display == 1){
			btnstn.children[0].style.display ="none";
			btnstn.children[(page_number + 1)].style.display ="block";
			// 最終ページの表示は>を非表示
		} else if (page_display == page_number){
			btnstn.children[(page_number + 1)].style.display ="none";
			btnstn.children[0].style.display ="block";
			// 中間ページの表示は<>を表示
		} else {
			btnstn.children[0].style.display ="block";
			btnstn.children[(page_number + 1)].style.display ="block";
		}

		// 現在のページをグレー色にする
		let btn_li_tag_gray;
		let btn_div_tag_gray;
		let btn_a_tag_gray;
		if(!isNaN(page_display)){
			// 過去のページを色戻し
			btnstn.children[(past_page_display)].style.color = '#111111';
			btn_li_tag_gray = btnstn.children[past_page_display];
			btn_div_tag_gray = btn_li_tag_gray.children[0];
			btn_a_tag_gray = btn_div_tag_gray.children[0];
			btn_a_tag_gray.style.backgroundColor = '#ffffff';
			btn_a_tag_gray.style.opacity = 1; 
			// 現在のページをグレー色にする
			btnstn.children[(page_display)].style.color = '#c0c0c0';
			btn_li_tag_gray = btnstn.children[page_display];
			btn_div_tag_gray = btn_li_tag_gray.children[0];
			btn_a_tag_gray = btn_div_tag_gray.children[0];
			btn_a_tag_gray.style.backgroundColor = '#ffffff';
			btn_a_tag_gray.style.opacity = 0.7; 
			// 過去の色格納
			past_page_display = page_display;
			// ページによって投稿を表示
			post_display();
		}
	}
	// ページによって投稿を表示
	function post_display(){
		// 表示終了投稿
		let post_end = (page_display * page_post_max) - 1;
		// 表示開始投稿
		let post_start = ((page_display - 1) * page_post_max); 
		for (let step = 0; step < corp_display.children.length; step++) {
			corp_display.children[(step)].style.display ="block";
			if (post_start > step || post_end < step) {
				corp_display.children[(step)].style.display ="none";
			}};
		return;
	}
	// 掲載企業一覧に移動
	function corp_move(){
		let corp_list_top = document.getElementById('homepublish'); // 移動させたい位置の要素を取得
		let rect = corp_list_top.getBoundingClientRect();
		let position = rect.top;    // 一番上からの位置を取得
		scrollBy(0, position);
	}	
	
// ebook閉じる動作
	let ebook_open = document.getElementById('ebook_open');
		let ebook_close = document.getElementById('ebook_close');
		ebook_close.addEventListener('click',() => {
			ebook_open.style.display = 'none';
		});

};