var barColors = ["#FF436B", "#FFCD56", "#4BC0C0", "#9966FF", "#22BA70", "#D73038", "#079BFE"];
var xValuesBar1 = ["Tôn giáo tâm linh", "Triết học khoa học", "Kinh tế chính trị", "Văn hóa nghệ thuật", "Tâm lý kỹ năng", "Kiến thức tổng hợp", "Văn phòng phẩm"];
var yValuesPie1 = [10000000, 17000000, 5000000, 23000000, 15000000, 7000000, 16000000];
var yValuesPie2 = [12000000, 7000000, 15000000, 4000000, 8000000, 12000000, 19000000];
var yValuesPie3 = [6000000, 14000000, 7500000, 8000000, 4000000, 6000000, 8500000];

new Chart("pieChart1", {
    type: "pie",
    data: {
        labels: xValuesBar1,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesPie1
        }]
    },
    options: {

    }
});

new Chart("pieChart2", {
    type: "pie",
    data: {
        labels: xValuesBar1,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesPie2
        }]
    },
    options: {

    }
});

new Chart("pieChart3", {
    type: "pie",
    data: {
        labels: xValuesBar1,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesPie3
        }]
    },
    options: {

    }
});


var currentChart = 't1';

document.querySelector('#select').addEventListener('change', function() {
    document.querySelectorAll('.' + currentChart).forEach(element => {
        element.classList.toggle('hide');
    });

    var value = document.querySelector('#select').value;

    // Ẩn chart thứ nhất và hiển thị chart thứ hai khi chọn 'Tháng 2'
    if (value === 't2') {
        document.querySelectorAll('.t1').forEach(element => {
            element.classList.add('hide');
        });

        document.querySelectorAll('.t2').forEach(element => {
            element.classList.remove('hide');
        });

        currentChart = 't2';
    } else {
        // Hiển thị chart thứ nhất cho các giá trị khác
        document.querySelectorAll('.t1').forEach(element => {
            element.classList.remove('hide');
        });

        // Ẩn chart thứ hai cho các giá trị khác 'Tháng 2'
        document.querySelectorAll('.t2').forEach(element => {
            element.classList.add('hide');
        });

        currentChart = 't1';
    }
});
