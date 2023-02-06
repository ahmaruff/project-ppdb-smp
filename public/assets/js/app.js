function displayDate(element) {
    var tgl = element.dataset.tgl;

    var date = new Date(tgl);

    var options = {
        timeZone: 'Asia/Jakarta',
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };

    var formatedDate = date.toLocaleDateString('id-ID',options);
    element.innerHTML = formatedDate;
    console.log(formatedDate);
}

function shorten(str, maxLen, separator = ' ') {
    if (str.length <= maxLen) return str;
    return str.substr(0, str.lastIndexOf(separator, maxLen));
}