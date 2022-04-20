function loadNavigation() {
  const html = document.querySelector("html");
  const navToggle = new Toggle(".js-hamburger");
  navToggle.toggle.addEventListener("click", () => {
    navToggle.toggleModal();
    navToggle.isActive ? html.setAttribute("style", "overflow-y: hidden;") : html.removeAttribute("style");
  });
}

function loadRandomizer(data) {
  const random = document.querySelector(".js-random");
  if(random) {
    random.addEventListener("click", async () => {

      const pages = Object.entries(data.pages).filter((page) => !page[1].hasOwnProperty("hidden"));
      const page = Math.floor(Math.random() * (pages.length - 1)) + 1;
      
      location.href = `${data.config.entry}?${data.config.prefix}=${pages[page][0]}`; 
    }); 
  }
}

function loadAnimations() {
  // header animations
  new AnimationObserver("slide-left")
    .animate(".js-hamburger");
  
  new AnimationObserver("slide-right")
    .animate(".logo");

  // index animations
  new AnimationObserver("fade-and-slide-in")
    .animate(".hero__title", ".hero__subtitle", ".hero__btn", ".hero__content")
    .animate(".snippets")
    .animate(".showcase");

  new AnimationObserver("active")
    .animate(".hero > .glowing-circle");

  // footer animations
  new AnimationObserver("fade-in")
    .animate("footer");
}

document.addEventListener("DOMContentLoaded", async () => {
  const data = await getContent();

  loadNavigation();
  loadRandomizer(data);
  loadAnimations();

  // Modal
  const modal = new Modal();
  const modalBtns = document.querySelectorAll(".js-modal-btn");
  modalBtns.forEach(btn => {
    const { modalType, modalId } = btn.dataset;
    
    let modalContent, content;
    switch(modalType) {
      case "game":
        content = data.pages.games.content.games.find((game) => game.name === modalId);
        modalContent = ModalContent.generateGameContent(content);
        break;
      case "gallery":
        content = data.pages.gallery.content.images.find((image) => image.name === modalId);
        modalContent = ModalContent.generateImageContent(content);
        break;
    }
    
    btn.addEventListener("click", function () {
      modal.render(modalContent).open();
    });
    
  });
  
});