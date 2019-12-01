document.addEventListener('DOMContentLoaded', () => {
  M.Modal.init(document.querySelectorAll('.modal'));
  M.FormSelect.init(document.querySelectorAll('select'));
  M.Sidenav.init(document.querySelectorAll('.sidenav'));
  const checkbox = document.querySelector('.p-checkbox');

  checkbox.addEventListener('change', (e) => {

    for (const input of document.querySelectorAll('.p-input-edit')) {
      input.disabled = !checkbox.checked;
      document.querySelector('.p-pass').setAttribute('type', !checkbox.checked ? 'password':'text');
      document.querySelector('.btn-salvar').style.display = !checkbox.checked ? 'none':'block';
      document.querySelector('.btn-cancelar').style.display = !checkbox.checked ? 'none' : 'block';
    }
  })

});
