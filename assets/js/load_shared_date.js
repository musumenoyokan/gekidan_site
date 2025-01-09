document.addEventListener("DOMContentLoaded", function() {
    fetch('/shared_date.html')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('shared-date').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching shared content:', error);
            document.getElementById('shared-date').innerHTML = '<p>コンテンツを読み込めませんでした。</p>';
        });
});
