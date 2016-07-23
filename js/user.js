//tooltip initialization

$(document).ready(function(){
  $('.tooltipped').tooltip({delay: 50});
  assign_all();
});

function assign_all(){
  for (var i = 0; i < 4; i++) {
    document.getElementsByClassName('icon-container')[i].addEventListener('click', sho);
  }
}

function hid_all(){
  for (var i = 0; i < 4; i++) {
      document.getElementsByClassName('part')[i].classList.remove('sho');
  }
}
function sho(){
  hid_all();
  document.getElementsByClassName('part')[this.dataset.mark].classList.add('sho');
}
