const statistical_formats = document.getElementById("my_statistical_formats");
const my_cinema = document.getElementById("my_cinema");
const column_chart = document.getElementById("column_chart");
const bar_chart = document.getElementById("bar_chart");
const donut_chart_top_movies = document.getElementById("donut_chart_top_movies");
const tablesList = Array.from(document.getElementsByClassName("tables"));
statistical_formats.addEventListener("change", function () {
    const selectedValue = statistical_formats.value;
    const selectedValue1 = my_cinema.value;
    if (selectedValue === "chart") {
        if (selectedValue1 === "all") {
            bar_chart.classList.remove("d-none");
            column_chart.classList.add("d-none");
        } else {
            bar_chart.classList.add("d-none");
            column_chart.classList.remove("d-none");
        }
        donut_chart_top_movies.classList.remove("d-none");
        tablesList.forEach((element) => {
            element.classList.add("d-none");
        });
    } else {
        column_chart.classList.add("d-none");
        bar_chart.classList.add("d-none");
        donut_chart_top_movies.classList.add("d-none");
        tablesList.forEach((element) => {
            element.classList.remove("d-none");
        });
    }
});

my_cinema.addEventListener("change", function () {
    const selectedValue = my_cinema.value;
    const selectedValue1 = statistical_formats.value;
    if (selectedValue === "all") {
        if (selectedValue1 === "chart") {
            bar_chart.classList.remove("d-none");
            column_chart.classList.add("d-none");
        }
    } else {
        if (selectedValue1 === "chart") {
            bar_chart.classList.add("d-none");
            column_chart.classList.remove("d-none");
        }
    }
});