class AnimationObserver extends IntersectionObserver {
  constructor(animation, options = { animateOnce: true }) {
    const { animateOnce, observerOptions } = options;
    
    super(entries => {
      entries.forEach(entry => {
        if(entry.isIntersecting) {
          entry.target.classList.add(animation);
          if (animateOnce) {
            const duration = parseFloat(window.getComputedStyle(entry.target).animationDuration);
            
            setTimeout(() => {
              entry.target.classList.remove(animation);
              this.unobserve(entry.target);
            }, duration * 1000);
          }
        }
      });
    }, observerOptions)
  }

  animate(...selectors) {
    selectors.forEach(selector => {
      const nodes = Array.from(document.querySelectorAll(selector));
      nodes.forEach(node => { this.observe(node); });
    });
    
    return this;
  }
}