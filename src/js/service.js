async function getContent() {
  try {
    const data = await fetch("src/content.json");
    
    return data.json();
  } catch (ex) {
    console.error(ex);
  }
}