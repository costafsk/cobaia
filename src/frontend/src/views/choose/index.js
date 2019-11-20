const setHeight = () => {
  const page = document.querySelector('.p-choose');

  page.style.height = `${window.innerHeight}px`;
}

document.body.onresize = () => {
  setHeight();
}

setHeight()
