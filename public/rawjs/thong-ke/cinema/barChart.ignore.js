var options = {
  series: [
    {
      data: [400, 430, 448, 470, 540, 580, 690, 1100],
    },
  ],
  chart: {
    type: "bar",
    height: 350,
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      horizontal: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  xaxis: {
    categories: [
      "Hai Bà Trưng",
      "Quốc Thanh",
      "Bình Dương",
      "Huế",
      "Mỹ Tho",
      "Kiên Giang",
      "Lâm Đồng",
      "Đà Lạt",
    ],
  },
};

var chart = new ApexCharts(document.querySelector("#bar_chart"), options);
chart.render();
