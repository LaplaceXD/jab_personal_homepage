class Modal {
  constructor() {
    this.wrapper = document.querySelector(".js-modal-wrapper")
    this.modal = this.wrapper.querySelector(".js-modal")

    this.open = this.open.bind(this);
    this.close = this.close.bind(this);

    this.modal.querySelector(".js-close").addEventListener("click", this.close);
  }

  get isVisible() {
    return this.wrapper.classList.contains("visible");
  }

  get hasContent() {
    return Boolean(this.content);
  }

  get content() {
    return Array.from(this.modal.children).find((child) => child.classList.contains("js-modal-content")) 
  }

  render(content) {
    if(!this.hasContent) {
      this.modal.appendChild(content);
      return this;
    }
  }

  clear() {
    if(this.hasContent) {
      this.modal.removeChild(this.content);
      return this;
    }
  }

  open() {
    if(!this.isVisible) {
      this.wrapper.classList.add("visible");
      setTimeout(() => {
        this.modal.style.transitionDelay = "0.25s";
        
        this.wrapper.classList.add("active");
        this.modal.classList.add("active");

        document.querySelector("html").setAttribute("style", "overflow-y: hidden;");
        setTimeout(() => {
          this.modal.style.transitionDelay = "";
        }, 750)
      }, 1);
    }
  }
  
  close() {
    if(this.isVisible) {
      this.wrapper.style.transitionDelay = "0.5s";

      this.modal.classList.remove("active");      
      this.wrapper.classList.remove("active");
      
      setTimeout(() => {
        this.wrapper.classList.remove("visible");
        document.querySelector("html").removeAttribute("style");
        this.clear();
        this.wrapper.style.transitionDelay = "";
      }, 750);
    }
  }
}