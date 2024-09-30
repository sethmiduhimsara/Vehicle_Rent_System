document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    const targetCounts = [100, 200, 300, 400]; // Change these to your desired final counts
    const duration = 3000; // Duration in milliseconds
  
    const steps = targetCounts.map((targetCount, index) => Math.ceil(targetCount / (duration / 100)));
  
    let currentCounts = new Array(counters.length).fill(0);
  
    const interval = setInterval(() => {
      for (let i = 0; i < counters.length; i++) {
        currentCounts[i] += steps[i];
        if (currentCounts[i] >= targetCounts[i]) {
          currentCounts[i] = targetCounts[i];
        }
        counters[i].textContent = currentCounts[i];
      }
  
      if (currentCounts.every((count, index) => count >= targetCounts[index])) {
        clearInterval(interval);
      }
    }, 100);


  });



  
