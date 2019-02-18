// Nav Bar
{
  const headerTxt = document.getElementById('header-text').textContent;
  const subMenu = Array.from(document.querySelectorAll('.link'));
  let id;
  subMenu.forEach(el => {
    id = el.textContent;
    if(id === headerTxt){
      el.classList.add('active');
    } else{
      el.classList.remove('active');
    }
    el.addEventListener('click', () => {
      id = el.textContent;
      id += '-hidden';
      document.getElementById(id).classList.toggle('open');
      document.getElementById(id).classList.toggle('hidden');
    });
  });
}

//Limits until added ...
const noteLimit = 165;
const titleLimit = 20;

let strNote = Array.from(document.querySelectorAll('.saved-note'));
let strTitle = Array.from(document.querySelectorAll('.title'));

// functions to store the original text of title and note
let titleOriginal = [];
const titleOriginalFunc = t => {
  titleOriginal.push(t);
}

let noteOriginal = [];
const noteOriginalFunc = n => {
  noteOriginal.push(n);
}

// Seting Saved Note to a certain limit length
{
  const limitSaved = (note = '', title = '', noteLimit, titleLimit) => {
    if(note === ''){
      newTitle= title.substring(0, titleLimit);
      newTitle += '...';
      return newTitle;
    } else{
      newNote = note.substring(0, noteLimit);
      newNote += '...';
      return newNote;
    }
  }

  strNote.forEach(el => {
    let note = el.textContent;
    noteOriginalFunc(note);
    if(note.length > noteLimit){
      let newNote = limitSaved(note, undefined, noteLimit, titleLimit);
      el.textContent = newNote;
    }
  });

  strTitle.forEach(el => {
    let title = el.textContent;
    titleOriginalFunc(title);
    if(title.length > titleLimit){
      let newTitle = limitSaved(undefined, title, noteLimit, titleLimit);
      el.textContent = newTitle;
    }
  });
}

// Saved note listener
{
  const note = document.getElementById('note');
  const btn = document.getElementById('add-note');
  const title = document.getElementById('add-title');
  const noteNum = document.getElementById('note-num');

  let titleText = document.getElementById('add-title').value;
  let btnText = document.getElementById('add-note').textContent;
  let noteText = document.getElementById('note').textContent;
  let textarea = document.getElementById('note').name;
  let formAction = document.getElementById('note-form').action;

  strTitle.forEach(el => {
      el.addEventListener("click",() => {
        // Change class of the selected box
        strTitle.forEach(title=>{
          title.classList.remove('selected-note');
          title.classList.add('non-selected-note');
        });
        el.classList.remove('non-selected-note');
        el.classList.add('selected-note');

        if(el.getAttribute('id') !== 'setNote'){
          // Change textarea name to update and form to update
          textarea = document.getElementById('note').name = 'update';
          const url = id =>{
            formAction = formAction.replace('add_note', 'update_note');
            let formArr = formAction.split('/');
            if(formArr.length === 8){
              formArr.pop();
              formAction = formArr.join('/');
              formAction += `/${id}`;
              document.getElementById('note-form').action = formAction;
            } else{
              formAction = formArr.join('/');
              formAction += `/${id}`;
              document.getElementById('note-form').action = formAction;
            }
          }

          // Set the innerHTML of the title to the title selected
          var x;
          titleText = el.textContent;
          for (x = 0; x < titleOriginal.length; x++) {
            var checkTitle = titleOriginal[x].substring(0, titleLimit);
            checkTitle += '...';
            if(checkTitle === titleText){
              title.value = titleOriginal[x];
              noteNum.textContent = titleOriginal[x];
            } else if(titleOriginal[x].substring(0, titleLimit) === titleText){
              title.value = titleOriginal[x];
              noteNum.textContent = titleOriginal[x];
            }
          }

          // Set the innerHTML of the note to the note selected
          var i;
          noteText = el.parentElement.childNodes[3].textContent;
          noteID = el.parentElement.childNodes[1].textContent;
          for (i = 0; i < noteOriginal.length; i++) {
            var checkNote = noteOriginal[i].substring(0, noteLimit);
            checkNote += '...';
            if(checkNote === noteText){
              note.innerHTML = noteOriginal[i];
              url(noteID);
            } else if(noteOriginal[i].substring(0, noteLimit) === noteText){
              note.innerHTML = noteOriginal[i];
              url(noteID);
            }
          }
          // Change button to say update
          btnText = 'Save';
          btn.innerHTML = btnText;
        } else{
          document.querySelector('.note-id-hide').textContent = '';
          textarea = document.getElementById('note').name = 'note';
          noteNum.textContent = 'New Note';
          note.innerHTML = '';
          title.value = '';
          btn.innerHTML = 'Add';
          document.getElementById('note-form').action = formAction.replace("update_note", "add_note");
          let urlArr = document.getElementById('note-form').action.split("/");
          urlArr.pop();
          urlArr = urlArr.join('/');
        }
      });
  });
}

// Delete Confirmation
{
  const deleteBox = Array.from(document.querySelectorAll('.delete-a'));
  deleteBox.forEach(el => {
    el.addEventListener('click', confirmation)
  });

  function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.target.offsetParent.children[0].href;
    swal({
      title: "Are you sure?",
      text: "Once deleted, your note will be gone forever!",
      icon: "warning",
      buttons: [true, 'Delete'],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = urlToRedirect;
      } else {
        swal({
          text:"Everynote deserves a second chance! Your note is still good",
        })
      }
    });
  }
}

/*****
  Mobile JavaScript
*****/

const screenWidth = window.innerWidth;
const getscreenWidth = (screenWidth) =>{
    return screenWidth;
}

  // Links
{
  if(getscreenWidth(screenWidth) > 900){

  } else{
    const investmentLink = document.getElementById('Investments');
    const investmentLinkDesktop = document.getElementById('Investments-hidden');

    investmentLink.addEventListener('click', () => {
      investmentLinkDesktop.style.display='none';
      investmentLink.href="http://localhost/organizer/dashboards/investment_general";
    });

    const developingLink = document.getElementById('Developing');
    const developingLinkDesktop = document.getElementById('Developing-hidden');

    developingLink.addEventListener('click', () => {
      developingLinkDesktop.style.display='none';
      developingLink.href="http://localhost/organizer/dashboards/developing_general";
    });
  }
}

// Btns
const noteBtn = document.getElementById('new-note-button');
const savedNote = Array.from(document.querySelectorAll('.saved-note-container'));
let newNote = document.getElementById("main");
let noteSearch = document.getElementById('note-search-container');
let header = document.getElementById('mobile-header');

// New Note Button/Update
{
  noteBtn.addEventListener('click' ,() =>{
      newNote.style.display = "block";
      noteSearch.style.display = 'none';
      header.style.display = 'none';
      if(getscreenWidth(screenWidth) > 900){
        savedNote.forEach(el => {
          el.style.display = "block";
        });
      } else{
        savedNote.forEach(el => {
          el.style.display = "none";
          noteSearch.style.display = 'none';
          header.style.display = 'none';
        });
      }
      noteBtn.style.display = "none";
  });

  savedNote.forEach(el => {
    el.addEventListener('click', () => {
      newNote.style.display = "block";
      noteBtn.style.display = "none";
      if(getscreenWidth(screenWidth) > 900){
        el.style.display = "block";
      } else{
        savedNote.forEach(non =>{
          non.style.display = "none";
          noteSearch.style.display = 'none';
          header.style.display = 'none';
        })
      }
    });
  });
}
