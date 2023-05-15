let myChart1 = document.getElementById('myChart1').getContext('2d');
let test1 = new Chart(myChart1, {
    type: 'pie',
    data: {
        labels: __ydata,
        datasets: [{
            label: 'Education Level',
            data: __xdata,
            backgroundColor: [
                 'rgba(255, 99, 132, 0.2)',
                'rgba(84, 83, 82, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(176, 14, 165, 0.2)',
                'rgba(73, 21, 195, 0.2)',
                'rgba(214, 201, 11, 0.2)'
            ],
            borderColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(84, 83, 82, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(176, 14, 165, 1)',
                'rgba(73, 21, 195, 1)',
                'rgba(214, 201, 11, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

let myChart2 = document.getElementById('myChart2').getContext('2d');
let test3 = new Chart(myChart2, {
    type: 'line',
    data: {
        labels: yeary,
        datasets: [{
            label: 'Members Membership',
            data: yearx,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(84, 83, 82, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(176, 14, 165, 0.2)',
                'rgba(73, 21, 195, 0.2)',
                'rgba(214, 201, 11, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(84, 83, 82, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(176, 14, 165, 1)',
                'rgba(73, 21, 195, 1)',
                'rgba(214, 201, 11, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

let myChart4 = document.getElementById('myChart4').getContext('2d');
let test5 = new Chart(myChart4, {
    type: 'bar',
    data: {
        labels: AddressY,
        datasets: [{
            label: 'Number of Businesses in provinces',
            data: Addressx,
            backgroundColor: [
                 'rgba(255, 99, 132, 0.2)',
                'rgba(84, 83, 82, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(176, 14, 165, 0.2)',
                'rgba(73, 21, 195, 0.2)',
                'rgba(214, 201, 11, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(84, 83, 82, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(176, 14, 165, 1)',
                'rgba(73, 21, 195, 1)',
                'rgba(214, 201, 11, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


let myChart5 = document.getElementById('myChart5').getContext('2d');
let test4 = new Chart(myChart5, {
    type: 'polarArea',
    data: {
        labels: sectorY,
        datasets: [{
            label: 'Business Sectors',
            data: sectorX,
            backgroundColor: [
                 'rgba(255, 99, 132, 0.2)',
                'rgba(84, 83, 82, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(176, 14, 165, 0.2)',
                'rgba(73, 21, 195, 0.2)',
                'rgba(214, 201, 11, 0.2)'
            ],
            borderColor: [
                 'rgba(255, 99, 132, 1)',
                'rgba(84, 83, 82, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(176, 14, 165, 1)',
                'rgba(73, 21, 195, 1)',
                'rgba(214, 201, 11, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
}); 

