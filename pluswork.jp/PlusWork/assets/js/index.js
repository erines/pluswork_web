
// TOPボタン
const scrollbtn = document.querySelector('.scroll');
window.addEventListener('scroll', () => {
    let scroll_Y = window.scrollY;
    if (scroll_Y > 150) {
        scrollbtn.classList.add('active');
    } else {
        scrollbtn.classList.remove('active');
    }
});

const backbtn = document.querySelector('.gotop');
window.addEventListener('scroll', () => {
    let scroll_Y = window.scrollY;
    if (scroll_Y > 150) {
        backbtn.classList.add('active');
    } else {
        backbtn.classList.remove('active');
    }
});

// ローディングアニメーション
const loading = document.querySelector('.loading');
window.addEventListener('load', () => {
    setTimeout(() => {
        loading.classList.add('hide');
    }, 2500);
}, false);

// TOP カテゴリー色分け
const newsList = document.querySelector('.newsList');
const categoryList = newsList.children;
Array.from(categoryList).forEach(function (child) {
    if (child.querySelector('.category').textContent === "お知らせ") {
        child.querySelector('.category').style.backgroundColor = "orange";
    } else if (child.querySelector('.category').textContent === "ジョブカレッジ") {
        child.querySelector('.category').style.backgroundColor = "red";
    } else if (child.querySelector('.category').textContent === "その他") {
        child.querySelector('.category').style.backgroundColor = "black";
    }
});
