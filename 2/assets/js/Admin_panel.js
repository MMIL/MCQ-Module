 //bar
       var ctxB = document.getElementById("barChart").getContext('2d');
       var myBarChart = new Chart(ctxB, {
          type: 'bar',
          data: {
             labels: ["Pink", "Blue", "Yellow", "Green", "Purple", "Orange"],
             datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 6, 8],
                backgroundColor: [
                  'rgba(233, 30, 99, 0.7)',
                  'rgba(0, 150, 136, 0.7)',
                  'rgba(255, 206, 86, 0.7)',
                  'rgba(75, 192, 192, 0.7)',
                  'rgba(153, 102, 255, 0.7)',
                  'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                  'rgba(233, 30, 99, 1)',
                  'rgba(0, 150, 136, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
             }]
           },
           optionss: {
             scales: {
               yAxes: [{
                  ticks: {
                    beginAtZero:true
                }
              }]
           }
         }
      });
    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Teal", "Pink", "Purple", "Green","Yellow"],
        datasets: [
            {
                data: [300, 50, 100, 40, 120],
                backgroundColor: ["#1de9b6", "#f48fb1", "#ba68c8", "#9ccc65", "#ffb74d"],
                hoverBackgroundColor: ["#64ffda", "#f8bbd0", "#ce93d8", "#aed581", "#ffcc80"]
            }
        ]
      },
      options: {
        responsive: true
      }    
    });
            
            