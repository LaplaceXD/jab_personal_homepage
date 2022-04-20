class Toggle {
  constructor(selector) {
    this.toggle = document.querySelector(`${selector}[data-toggle]`);
    this.modal = document.querySelector(`[data-modal="${this.toggle.dataset.toggle}"]`);
    
    this.toggleModal = this.toggleModal.bind(this);
  }

  get isActive() {
    return this.toggle.classList.contains("active");
  }

  get isModalActive() {
    return this.modal.classList.contains("active");
  }

  toggleModal() {
    if(this.isModalActive) {
      this.modal.classList.remove("active");
      this.toggle.classList.remove("active");
    } else {
      this.modal.classList.add("active");
      this.toggle.classList.add("active");
    }
  }
}
