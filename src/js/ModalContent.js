class ModalContent {
  constructor() {
    this.content = document.createElement("div");
    this.content.classList.add("js-modal-content", "content");

    this.wrapper = document.createElement("article");
    this.wrapper.classList.add("content__wrapper");
  }

  addImage(src, alt) {
    const img = document.createElement("img");
    img.classList.add("content__img");
    img.setAttribute("src", src);
    img.setAttribute("alt", alt);
    this.content.appendChild(img);

    return this;
  }

  addTitle(title) {
    const header = document.createElement("h2");
    const text = document.createTextNode(title);
    header.classList.add("content__title");
    header.appendChild(text);
    this.wrapper.appendChild(header);

    return this;
  }

  addTags(tags) {
    const list = document.createElement("ul");
    list.classList.add("content__tags");
    
    for(const tag of tags) {
      const item = document.createElement("li");
      const text = document.createTextNode(tag);
      item.appendChild(text);
      list.appendChild(item);
    }

    this.wrapper.appendChild(list);

    return this;
  }

  addDescription(description) {
    const desc = document.createElement("p");
    const text = document.createTextNode(description);
    desc.classList.add("content__description");
    desc.appendChild(text);
    this.wrapper.appendChild(desc);
  
    return this;
  }

  addLink(href, anchor) {
    const link = document.createElement("a");
    const text = document.createTextNode(anchor);
    link.appendChild(text);
    link.classList.add("content__btn", "btn");
    link.setAttribute("href", href);
    link.setAttribute("target", "_blank");
    this.wrapper.appendChild(link);

    return this;
  }

  generate() {
    this.content.appendChild(this.wrapper);
    return this.content;
  }

  static generateGameContent(content) {
    return new ModalContent()
      .addImage(content.img.src, content.img.alt)
      .addTitle(content.name)
      .addTags(content.tags)
      .addDescription(content.description)
      .addLink(content.link.href, content.link.name)
      .generate();
  }

  static generateImageContent(content) {
    const modalContent = new ModalContent()
      .addImage(content.src, content.name);

    const generated = modalContent.generate();
    generated.removeChild(modalContent.wrapper);

    return generated;
  }
}