document.addEventListener('DOMContentLoaded', () => {
  const modal = document.querySelectorAll('.modal');
  M.Modal.init(modal);

  const select = document.querySelectorAll('select');
  M.FormSelect.init(select)
});
