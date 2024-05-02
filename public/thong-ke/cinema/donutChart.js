var options = {
    series: [44, 55, 41, 17, 15],
    chart: {
        type: "donut",
    },

    labels: ["Bắp Caramel", "CoCaCoLa", "Combo 1", "Combo 2", "Combo 3"],
    legend: {
        position: "bottom",
    },
    responsive: [
        {
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: "bottom",
                },
            },
        },
    ],
};

var chart = new ApexCharts(
    document.querySelector("#donutChart"),
    options
);
chart.render();