
const messageInput = document.getElementById('message');
const colorSelect = document.getElementById('color');
const boldCheckbox = document.getElementById('bold');
const italicCheckbox = document.getElementById('italic');
const underlineCheckbox = document.getElementById('underline');
const restoreButton = document.querySelector('.btn-success');
const alertBox = document.querySelector('.alert-success');


function updateTextStyle() {
    let style = '';
    if (boldCheckbox.checked) style += 'font-weight: bold; ';
    if (italicCheckbox.checked) style += 'font-style: italic; ';
    if (underlineCheckbox.checked) style += 'text-decoration: underline; ';
    alertBox.style = style;
}

function updateTextContentAndColor() {
    alertBox.textContent = messageInput.value;
    alertBox.style.color = colorSelect.value;
}

function restoreDefault() {
    messageInput.value = '';
    colorSelect.value = 'Black';
    boldCheckbox.checked = false;
    italicCheckbox.checked = false;
    underlineCheckbox.checked = false;
    alertBox.textContent = 'This text will be changed immediately when typing new text.';
    alertBox.style = '';
}

messageInput.addEventListener('input', updateTextContentAndColor);
colorSelect.addEventListener('change', updateTextContentAndColor);
boldCheckbox.addEventListener('change', updateTextStyle);
italicCheckbox.addEventListener('change', updateTextStyle);
underlineCheckbox.addEventListener('change', updateTextStyle);
restoreButton.addEventListener('click', restoreDefault);