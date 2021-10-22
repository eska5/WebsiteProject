function local() {
    if (localStorage.numberofviews) {
        localStorage.numberofviews = Number(localStorage.numberofviews) + 1;
    } else {
        localStorage.numberofviews = 1;
    }
    document.getElementById("result").innerText = "Number of People that visited this site :" + localStorage.numberofviews;

}