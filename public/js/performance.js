function togglePerformanceMode() {
  // Toggle the performance mode class on the body
  const performanceModeEnabled = document.body.classList.toggle('performance-mode');

  // Get all elements on the page
  const allElements = document.querySelectorAll('*');

  // Loop through all elements to remove backdrop-filter
  allElements.forEach(element => {
    const computedStyle = window.getComputedStyle(element);
    if (computedStyle.backdropFilter !== 'none') {
      if (performanceModeEnabled) {
        element.style.backdropFilter = 'none'; // Disable backdrop filter
      } else {
        element.style.backdropFilter = ''; // Reset to default
      }
    }
  });

  // Handle animation separately if needed
  const blockElement = document.querySelector('.block');
  if (blockElement) {
    blockElement.style.animation = performanceModeEnabled ? 'none' : 'steam 20s linear infinite';
  }
}