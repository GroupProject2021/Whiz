const captcha = document.querySelector(".captcha");
const reloadBtn = document.querySelector(".reload-btn");
const inputField = document.querySelector(".captcha-input");
const checkBtn = document.querySelector(".check-btn");
const statusTxt = document.querySelector(".status-txt");
const captchaWrapper = document.querySelector(".captcha-wrapper");
const captchaMatchedMsg = document.querySelector(".captcha-matched-alert");

// storing all captcha characters in arrray;
let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                     'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
                     'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                     '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

function getCaptcha() {
    for(let i = 0; i < 6; i++) {
        let randomChar = allCharacters[Math.floor(Math.random() * allCharacters.length)];
        captcha.innerHTML += ' '+randomChar;

    }
};

function refreshCaptcha() {
    statusTxt.innerText = "";
    inputField.value = "";
    captcha.innerText = "";
    getCaptcha();
}

// function showCaptchaMatchedMsg() {
//     captchaMatchedMsg.style.visibility = "visible";
//     captchaMatchedMsg.style.height = "54px";
// }

// function hideCaptchaMatchedMsg() {
//     captchaMatchedMsg.style.visibility = "hidden";
//     captchaMatchedMsg.style.height = 0;
// }

function showCaptchaMatchedMsg() {
    captchaMatchedMsg.classList.remove("hide");
    captchaMatchedMsg.classList.add("show");
    captchaMatchedMsg.classList.add("showCaptcha");
}

function hideCaptchaSection() {
    captchaWrapper.classList.add("hide");
}

// showCaptchaMatchedMsg();

refreshCaptcha();

reloadBtn.addEventListener("click", () => {
    captcha.innerHTML = "";
    getCaptcha();
});

checkBtn.addEventListener("click", (e) => {
    e.preventDefault();

    let inputVal = inputField.value.split('').join(' ');

    if(inputVal == captcha.innerText) {
        // statusTxt.style.color = "#4db2ec";
        // statusTxt.innerText = "You are not a robot";
        inputField.value = "true";

        hideCaptchaSection();

        showCaptchaMatchedMsg();
    }
    else {
        statusTxt.style.color = "#ff0000";
        statusTxt.innerText = "Captcha not matched, Please try again";

        setTimeout(() => {
            refreshCaptcha();
        }, 2000);
    }
});
