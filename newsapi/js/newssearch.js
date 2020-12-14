
const searchFrom = document.querySelector(".search");
const input = document.querySelector(".input");
const newsList = document.querySelector(".news-list");

searchFrom.addEventListener('submit', retrieve);

function retrieve(e) {

    e.preventDefault()

    const apiKey = 'c6a44802bb6b448eaec67c5f51bc04bb'
    let topic = input.value;
    console.log(topic)

    let url = `http://newsapi.org/v2/everything?q=${topic}&from=2020-11-14&sortBy=publishedAt&apiKey=${apiKey}`

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.articles.forEach(article =>{
            let li = document.createElement('li');
            let a = document.createElement('a');
            a.setAttribute('href', article.url );
            a.setAttribute('target', '_blank');
            a.textContent = article.title;
            li.appendChild(a);
            newsList.appendChild(li);
        })
    })
}