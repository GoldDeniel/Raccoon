window.onload = function() {
  const allElements = document.querySelectorAll('*');
  allElements.forEach(element => {
      const computedStyle = window.getComputedStyle(element);
      if (computedStyle.backdropFilter !== 'none') {
          element.style.backdropFilter = 'none'; // Disable backdrop filter
      }
  });
};