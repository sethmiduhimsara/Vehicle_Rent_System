document.addEventListener('DOMContentLoaded', function() {
    const accordionButtons = document.querySelectorAll('.accordion-button');
  
    accordionButtons.forEach(button => {
      button.addEventListener('click', function() {
        const accordionItem = this.parentNode;
        const isActive = accordionItem.classList.contains('active');
  
        // Close all accordion items
        accordionButtons.forEach(button => {
          button.parentNode.classList.remove('active');
        });
  
        // Toggle active state of clicked accordion item
        if (!isActive) {
          accordionItem.classList.add('active');
        }
      });
    });
  });
  