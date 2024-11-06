function searchItems() {
    const keyword = document.getElementById('search').value;
    if (keyword.length === 0) {
        document.getElementById('search-results').innerHTML = '';
        return;
    }
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `search.php?keyword=${keyword}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('search-results').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}