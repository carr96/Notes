// Nav Bar
{
  const subMenu = Array.from(document.querySelectorAll('.link'));
  let id;
  subMenu.forEach(el => {
    el.addEventListener('click', () => {
      id = el.textContent;
      id += '-hidden';
      document.getElementById(id).classList.toggle('open');
      document.getElementById(id).classList.toggle('hidden');
    });
  });
}
