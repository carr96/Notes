
const selections = Array.from(document.querySelectorAll('.selection'));
const loginBtn = document.getElementById('login-selection');
let login;

selections.forEach(el => {
  el.addEventListener('click', () => {
    selections.forEach(selection => {
      selection.classList.remove('active');
      selection.classList.remove('non-active');
    });
    el.classList.add('active');
  });
});


const clearRender = () =>{
  return document.querySelector('#form-wrapper').innerHTML='';
}

login = `
  <form class="form" id="login" action="http://localhost/organizer/pages/login" method="POST">
    <h2> Login </h2>
    <label for="username"> Username </label>
    <input id="first-input" class="input-text" type="text" name="username">

    <label for="password"> Password </label>
    <input class="input-text" type="password" name="password">

    <button type="submit" id="btn"> Login </button>
  </form>
`;
loginBtn.addEventListener('click' ,() => {
  login = `
    <form class="form" id="login" action="http://localhost/organizer/pages/login" method="POST">
      <h2> Login </h2>
      <label for="username"> Username </label>
      <input id="first-input" class="input-text" type="text" name="username">

      <label for="password"> Password </label>
      <input class="input-text" type="password" name="password">

      <button type="submit" id="btn"> Login </button>
    </form>
  `;
});

const renderLogin = () => {
  return document.querySelector('#form-wrapper').insertAdjacentHTML('beforeend', login);
}

const signup = `
  <form class="form" id="signup" action="http://localhost/organizer/pages/create" method="POST">
    <h2> Signup </h2>
    <label for="username"> Username </label>
    <input id="first-input" class="input-text" type="text" name="username">

    <label for="password"> Password </label>
    <input class="input-text" type="password" name="password">
    <button type="submit" id="btn"> Signup </button>
  </form>
`;

window.addEventListener('load', function () {
renderLogin();
}, false);


document.querySelector('#login-selection').addEventListener('click', () =>{
  clearRender();
  renderLogin();
});

const insertHTML = html => {
  return document.querySelector('#form-wrapper').insertAdjacentHTML('beforeend', html);
}

document.querySelector('#signup-selection').addEventListener('click', () =>{
  clearRender();
  insertHTML(signup);
});

document.querySelector('#guest-selection').addEventListener('click', () =>{
  clearRender();
  const guest = `
  <div class="form">
    <div id="guest-list">
      <h3> Test out some of the notes </h3>
      <p> <i class="fas fa-chart-line features-icons"></i>Investment Notes</p>
      <p> <i class='fas fa-code features-icons'></i>Developing Notes </p>
      <p> <i class="fas fa-paint-brush features-icons"></i>Front-End Notes </p>
      <p><i class="far fa-file-code features-icons"></i>Back-End Notes</p>
      <a id="guest-btn" href="http://localhost/organizer/pages/guest">Continue As Guest</a>
    </div>
  </div>
  `;
  insertHTML(guest);
});

// Check to see what kind of error and what to view

  // Get the textContent of username_err id
  const usernameErrType = document.querySelector('#username_err').textContent;
  const passwordErrType = document.querySelector('#password_err').textContent;
  if(usernameErrType.includes('signup') || passwordErrType.includes('signup')){
    insertHTML(signup);
    const signupBtn = document.getElementById('signup-selection');
    signupBtn.classList.remove('non-active');
    loginBtn.classList.add('non-active');
    signupBtn.classList.add('active');
    loginBtn.classList.remove('active');
    login = '';
  }
