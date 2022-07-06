// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('');
    // alert('OPLETTEN: Als de item gechecked is, dan kan helaas geen meer wijzigen voeren!');
  }
}, false);

